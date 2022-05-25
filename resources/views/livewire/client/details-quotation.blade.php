{{-- TODO --}}
@php use App\Enum\QuotationEnum @endphp

<div x-data="{ addModal: false, payModal: false, cancelModal: false }">
  <x-alert type="message" />

  <div class="section-header t-card">
    <h2 class="text-large">عرض السعر</h2>

    <p>
      تاريخ الإنشاء
      {{ $quotation->created_at->format('Y-m-d') }}
    </p>
  </div>


  {{-- table --}}
  <div class="table-wrapper">
    <table class="table">
      <thead>
        <tr>
          {{-- name --}}
          <th> اسم المنتج</th>

          {{-- type --}}
          <th>الوحده</th>

          {{-- quantity --}}
          <th>الكمية</th>

          {{-- price --}}
          <th>سعر المنتج</th>

          {{-- total --}}
          <th>المجموع</th>

          {{-- actions --}}
          <th></th>
        </tr>
      </thead>

      <tbody>
        @if (isset($quotationDetails))
          @foreach ($quotationDetails as $details)
            <tr>
              <td> {{ $details->product_name }} </td>
              <td>
                <div>
                  @if ($details->product_unit = QuotationEnum::TYPE_BOTTLE)
                    عبوه
                  @elseif($details->product_unit = QuotationEnum::TYPE_CARTONS)
                    كرتون
                  @elseif($details->product_unit = QuotationEnum::TYPE_RIBBON)
                    شريط
                  @endif
                </div>
              </td>

              <td> {{ $details->quantity }} </td>

              {{-- price --}}
              <td> {{ $details->price }} {{ $details->currency }} </td>

              {{-- total --}}
              <td> {{ $details->price * $details->quantity }} {{ $details->currency }}</td>

              {{-- action --}}
              @if ($active === 0)
                <td x-data="{ deleteModal: false }">
                  <button @click="deleteModal = true">
                    <x-icon icon='remove' />
                  </button>

                  <x-client.delete-quotation-item :id="$details->id" :name="$details->product_name" />
                </td>
              @endif
            </tr>
          @endforeach
        @endif

        <tr>
          <td>
            الأجمالي
          </td>
          <td colspan="5"> {{ $quotation->total }} {{ $quotation->currency }}</td>
        </tr>
      </tbody>
    </table>
  </div>

  @if ($active === 0)
    <div class="t-address t-card">
      <h3>حدد المستلم</h3>
      <div>
        <select wire:model="addressID" class="form-control" style="width: 240px;">
          <option>...</option>
          @foreach ($addresses as $address)
            <option value="{{ $address->id }}">{{ $address->name }}</option>
          @endforeach
        </select>
      </div>

      <button class="form-control" @click="addModal = true">
        +
        إضافة عنوان جديد
      </button>
    </div>

    <div class="t-card" style="display: flex; gap: 10px; justify-content: end">
      <button @click="payModal = true" class="btn">دفع الفاتورة</button>
      <button @click="cancelModal = true" class="btn btn-danger">@lang('action.cancel-order')</button>
    </div>
  @endif
  <div>
    {{-- Add Address Mofal --}}
    <x-modal title="إضافة عنوان جديد" open="addModal">
      <form>
        {{-- Name --}}
        <div class="form-group">
          <label for="ad-name-label">الاسم</label>
          <input wire:model="name" id="ad-name-label" type="text" class="form-control" placeholder="الاسم " />
          @error('name')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        {{-- phone --}}
        <div class="form-group">
          <label for="ad-name-label">رقم الهاتف </label>
          <input wire:model="phone" id="ad-name-label" type="text" class="form-control" placeholder="رقم الهاتف " />
          @error('phone')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        {{-- type_address --}}
        <div class="form-group">
          <label>نوع العنوان</label>

          <select wire:model="type_address" class="form-control">
            <option>نوع العنوان</option>
            <option value="{{ \App\Enum\UserEnum::TYPE_ADDRESS_HOME }}">
              منزل
            </option>
            <option value="{{ \App\Enum\UserEnum::TYPE_ADDRESS_WORK }}">
              عمل
            </option>
          </select>

          @error('type_address')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        {{-- desc --}}
        <div class="form-group">
          <textarea wire:model="desc" rows="3" class="form-control" placeholder="وصف الموقع"
            style="margin-top: 10px "></textarea>
          @error('desc')
            <span class="error">{{ $message }}</span>
          @enderror
        </div>

        <x-slot:footer>
          <button class="btn" @click="addModal = false" wire:click.prevent="store()">حفظ</button>
        </x-slot:footer>
      </form>
    </x-modal>

    {{-- payment modal --}}
    <x-modal title="تأكيد عملية الدفع" open="payModal">
      <form style="display: flex; justify-content: center; align-items: center; height: 112px">
        <h1 style="font-size: 20px">
          هل تريد متابعة عملية الدفع ؟
        </h1>
        <x-slot:footer>
          <button class="btn" @click="payModal = false" wire:click="pay">متابعة الدفع</button>
        </x-slot:footer>
      </form>
    </x-modal>

    {{-- Cancel modal --}}
    <x-modal title="إلغاء الطلب" open="cancelModal">
      <form style="display: flex; justify-content: center; align-items: center; height: 112px">
        <h1 style="font-size: 20px">
          هل انت متاكد من إلغاء الطلب ؟
        </h1>
        <x-slot:footer>
          <button class="btn btn-danger" wire:click="cancelOrder()" @click="cancelModal = false">نعم</button>
        </x-slot:footer>
      </form>
    </x-modal>
  </div>
</div>
