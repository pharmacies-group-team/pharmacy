<?php

namespace App\Http\Livewire\Client;

use App\Enum\OrderEnum;
use App\Enum\PaymentEnum;
use App\Enum\RoleEnum;
use App\Models\Invoice;
use App\Models\Quotation;
use App\Models\QuotationDetails;
use App\Models\{User, Address};
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Livewire\Component;

class DetailsQuotation extends Component
{
    public $quotationDetails, $quotation, $quotationID;
    public $quantity, $addressID, $addresses;
    public $name, $phone, $type_address, $desc;

    public $active = 0;

    public function render()
    {
      $this->quotationDetails = QuotationDetails::where('quotation_id', $this->quotationID)->get();
      $this->quotation        = Quotation::find($this->quotationID);

      $this->addresses        = Auth::user()->addresses()->get();

      $invoice      = Invoice::where('order_id' , $this->quotation->order->id)->select('is_active')->first();
      $this->active = $invoice == '' ? 0 : $invoice->is_active;

      return view('livewire.client.details-quotation');
    }

    public function updated($propertyName)
    {
      $this->validateOnly($propertyName, Address::roles(), Address::messages());
    }

    //********* Delete From Quotation Details *********//
    public function delete($id)
    {
      $quotationDetails = QuotationDetails::find($id);
      $this->quotation->update(['total' => abs($quotationDetails->total - $this->quotation->total)]);
      $quotationDetails->delete();
      session()->flash('message', 'تم حذف المنتح من عرض المنتج.');
    }

    //********* Payment *********//
    public function pay()
    {
      if ($this->quotationDetails->count() === 0)
        session()->flash('message', 'عذراً ولكن لا يوجد منتجات لإكمال عملية الدفع.');

      elseif($this->addressID == '')
        session()->flash('message', 'من فضلك قم بتحديد موقع التوصيل.');

      else {
        $amount = $this->quotation->total;

        if (Auth::user()->balance >= $amount)
          $this->paymentFromWallet($amount);

        else return $this->paymentFromAPI();
      }
    }

    //********* Payment from the wallet *********//
    public function paymentFromWallet($amount)
    {
      $invoice = $this->createInvoice();
      $this->processWallet($amount, $invoice);

      $invoice->update(['is_active' => 1]);
      $this->quotation->order->update(['status' => OrderEnum::PAID_ORDER]);

      return redirect()->route('client.success')
        ->with('message', 'تمت عملية الدفع بنجاح، طلبك قيد التجهيز..');
    }

    //********* Payment from the API *********//
    public function paymentFromAPI()
    {
      $response = Http::withHeaders(
        [
          'content-Type' => 'application/x-www-form-urlencoded',
          'private-key'  => PaymentEnum::PRIVATE_KEY,
          'public-key'   => PaymentEnum::PUBLIC_KEY,
        ])
        ->post(PaymentEnum::WASL_API, $this->data());

      if ($response->status() == '200') {
        $this->createInvoice($response);
        return redirect($response['invoice']['next_url']);
      }
    }

    //********* Process Payment from the wallet *********//
    public function processWallet($amount, $invoice)
    {
      $pharmacy = User::find($this->quotation->order->pharmacy_id);
      $admin    = User::role(RoleEnum::SUPER_ADMIN)->first();

      $adminRatio = ( PaymentEnum::RATIO / 100 ) * $amount;
      $residual   = $amount - $adminRatio;

      Auth::user()->withdraw($amount,
      [
        'invoice_id' => $invoice->id,
        'depositor'  => Auth::id(),
        'recipient'  => $pharmacy->id,
        'state'      => ' تحويل من حساب ( '.Auth::user()->name.') إلى حساب ( . ' . $pharmacy->name . '('
      ]);

      $admin->deposit($adminRatio,
      [
        'invoice_id' => $invoice->id,
        'depositor'  => Auth::id(),
        'recipient'  => $admin->id,
        'state'      => ' إيداع إلى حساب ( '.$admin->name.') من حساب ( . ' . Auth::user()->name . '('
      ]);

      $pharmacy->deposit($residual,
      [
        'invoice_id' => $invoice->id,
        'user_id'    => Auth::id(),
        'pharmacy'   => $this->quotation->order->pharmacy_id,
        'state'      => ' إيداع إلى حساب ( '.$pharmacy->name.') من حساب ( . ' . Auth::user()->name . '('
      ]);
    }

    //********* The data sent for API payment *********//
    public function data()
    {
      $products = QuotationDetails::where('quotation_id', $this->quotationID)
        ->select('id', 'product_name', 'quantity', 'price As unit_amount')->get();

      return
        [
          'order_reference' => (string) $this->quotation->order->id,
          'products'        => $products,
          'currency'        => 'YER',
          'total_amount'    => (string) $this->quotation->total,
          'success_url'     => 'http://127.0.0.1:8000/client/success',
          'cancel_url'      => 'http://127.0.0.1:8000/client/cancel',
          'metadata'        => $this->quotation->order->user
        ];
    }

    //********* Create Invoice *********//
    public function createInvoice($response = null)
    {
      return Invoice::updateOrCreate(['order_id'   => $this->quotation->order->id],
        [
          'total'      => $this->quotation->total,
          'invoice_id' => $response != null ? $response['invoice']['invoice_referance'] : '',
          'address_id' => $this->addressID
        ]);
    }

    //********* Create Address *********//
    public function store()
    {
      Address::create(
        [
          'name'         => $this->name,
          'phone'        => $this->phone,
          'desc'         => $this->desc,
          'type_address' => $this->type_address,
          'user_id'      => Auth::id()
        ]
      );

      $this->resetInputFields();
      session()->flash('message', 'تم إضافة عنوان جديد.');
    }

    public function resetInputFields()
    {
      $this->name         = '';
      $this->phone        = '';
      $this->type_address = '';
      $this->desc         = '';
    }
}
