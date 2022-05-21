<?php

namespace App\Console\Commands;

use App\Enum\PerodicOrderEnum;
use App\Models\Order;
use App\Models\PerodicOrder;
use App\Services\NotificationService;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class PerodicOrdersCron extends Command
{
  /**
   * The name and signature of the console command.
   *
   * @var string
   */
  protected $signature = 'perodic_order:cron';

  /**
   * The console command description.
   *
   * @var string
   */
  protected $description = 'Command description';

  /**
   * Create a new command instance.
   *
   * @return void
   */
  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Execute the console command.
   *
   * @return mixed
   */
  public function handle()
  {
    $perodic_orders = PerodicOrder::all();
    foreach ($perodic_orders as $perodic_order) {

      if ($perodic_order->is_active and $perodic_order->next_order_date == Carbon::now()->format('Y-m-d')) {
        $previousOrder = Order::select()->where('id', $perodic_order['order_id'])->first();
        $order = Order::create(
          [
            'user_id'     => $previousOrder->user_id,
            'image'       => $previousOrder->image,
            'pharmacy_id' => $previousOrder->pharmacy_id,
            'order'       => $previousOrder->order,
          ]
        );

        // send and save notification in DB
        NotificationService::newOrder($order);

        if ($perodic_order->perodic_date_type === PerodicOrderEnum::WEEKLY) {
          $nextDate = Carbon::parse($perodic_order['next_order_date'])->copy()->addWeek()->format('Y-m-d');
          $perodicOrder = PerodicOrder::where('id', $perodic_order->id)->update(['next_order_date' => $nextDate]);
        } elseif ($perodic_order->perodic_date_type === PerodicOrderEnum::MONTHLY) {
          $nextDate = Carbon::parse($perodic_order['next_order_date'])->copy()->addMonth()->format('Y-m-d');
          $perodicOrder = PerodicOrder::where('id', $perodic_order->id)->update(['next_order_date' => $nextDate]);
        }
      }
    }
    Log::info("Cron is working fine!");
  }
}
