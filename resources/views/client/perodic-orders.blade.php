@extends('layouts/client/master')
@php
use App\Enum\PerodicOrderEnum;
@endphp
@section('content')
    {{-- {{ $perodic_orders }} --}}
    <x-alert type="status" />

    <main class="container">
        <section class="section-header">
            <h2 class="text-large"> الطلبات الدورية</h2>
        </section>

        <div class="table-wrapper">
            <table class="table">
                <thead>
                    <tr>
                        {{-- order id --}}
                        <th> رقم الطلب</th>

                        {{-- perodic order --}}
                        <th>نوع الطلب الدوري </th>

                        {{-- start_date --}}
                        <th>تاريخ اول طلب</th>


                        {{-- next date for order --}}
                        <th>تاريخ الطلب القادم</th>

                        {{-- active/not active --}}
                        <th>تشغيل/ايقاف </th>


                    </tr>
                </thead>

                <tbody>
                    @if (isset($perodic_orders))
                        @foreach ($perodic_orders as $perodic_order)
                            <tr>
                                {{-- id --}}
                                <td>{{ $perodic_order->order_id }} </td>

                                {{-- perodic_date_type --}}
                                <td>
                                    {{-- {{ $perodic_order->perodic_date_type }} --}}
                                    @if ($perodic_order->perodic_date_type === PerodicOrderEnum::WEEKLY)
                                        <p>
                                            اسبوعي
                                        </p>
                                    @elseif($perodic_order->perodic_date_type === PerodicOrderEnum::MONTHLY)
                                        <p>شهري</p>
                                    @endif
                                </td>

                                {{-- start_date --}}
                                <td>
                                    {{ $perodic_order->start_date }}

                                </td>

                                {{-- next_order_date --}}

                                <td>{{ $perodic_order->next_order_date }} </td>


                                {{-- active and not active --}}
                                <td>

                                    <form method="post"
                                        action='{{ route('client.togglePerodicOrder', ['id' => $perodic_order->id]) }}'>
                                        @csrf
                                        <button type="submit"
                                            class="btn {{ $perodic_order->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

                                            @if ($perodic_order->is_active)
                                                تعطيل
                                            @else
                                                تفعيل
                                            @endif
                                        </button>
                                    </form>



                                </td>



                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </main>
@stop
