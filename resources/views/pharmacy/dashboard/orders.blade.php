
@extends('layouts/pharmacy/master')

@php use App\Enum\OrderEnum; @endphp

@section('content')


  @include('includes.alerts')
  <main class="dashboard-pharmacies-orders" x-data="{ id: null, ad: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div class="container">
      <section class="section-header">
        <h2 class="text-large">أدارة الطلبات</h2>
      </section>

      <div class="table-wrapper">
        <table class="table">
          <thead>
            <tr>
              {{-- order id --}}
              <th> رقم الطلب</th>

              {{-- status --}}
              <th>حالة الطلب</th>

              {{-- client name --}}
              <th> اسم العميل</th>

              {{-- email --}}
              <th>التاريخ</th>

              {{-- actions --}}
              <th></th>
            </tr>
          </thead>

          <tbody>
            @if (isset($orders))
              @foreach ($orders as $order)
                <tr>
                  {{-- id --}}
                  <td>{{ $order->id }} </td>

                  {{-- status --}}
                  <td>
                    @if ($order->status === OrderEnum::NEW_ORDER)
                      <div class="badge badge-info">
                        {{OrderEnum::NEW_ORDER}}
                      </div>
                    @elseif($order->status === OrderEnum::UNPAID_ORDER)
                      <div class="badge bg-light text-dark">
                        {{ OrderEnum::UNPAID_ORDER }}
                      </div>
                    @elseif($order->status === OrderEnum::PAID_ORDER)
                      <div class="badge bg-success">
                        {{ OrderEnum::PAID_ORDER }}
                      </div>
                    @elseif($order->status === OrderEnum::DELIVERY_ORDER)
                      <div class="badge badge-danger">
                        {{ OrderEnum::DELIVERY_ORDER }}
                      </div>
                    @elseif($order->status === OrderEnum::DELIVERED_ORDER)
                      <div class="badge badge-danger">
                        {{ OrderEnum::DELIVERED_ORDER }}
                      </div>
                    @elseif($order->status === OrderEnum::REFUSAL_ORDER)
                      <div class="badge badge-danger">
                        {{ OrderEnum::REFUSAL_ORDER }}
                      </div>
                    @endif
                  </td>

                  {{-- client --}}
                  <td>{{ $order->user->name }} </td>

                  {{-- client --}}
                  <td>{{ $order->created_at->format('Y-m-d') }} </td>

                  {{-- action --}}
                  <td>

                  </td>
                </tr>
              @endforeach
            @endif
          </tbody>
        </table>
      </div>

    </div>

    {{-- modals --}}
    <div>
      {{-- add ads modal --}}
      <x-modal title="اضافة اعلان" open="addModal">
        <form action="{{ route('admin.ads.store') }}" method="post" enctype="multipart/form-data" x-ref="addForm">
          @csrf

          {{-- add titles --}}
          <div class="form-group">
            <label for="ad-name-label">أسم
              الأعلان</label>
            <input id="ad-name-label" name="title" :value="ad.title" type="text"
              class="form-control @error('title') is-invalid @enderror" placeholder="أسم الاعلان" />
            @error('title')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- start_at --}}
          <div class="form-group">
            <label for="start-input-date">تاريخ
              بدا الاعلان</label>

            <input type="date" id="start-input-date" class="form-control @error('start_at') is-invalid @enderror"
              placeholder="حدد تاريخ البدأ" name="start_at" :value="ad.start_at">
            @error('start_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- end_at --}}
          <div class="form-group">
            <label>تاريخ
              نهاية الاعلان</label>
            <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="حدد تاريخ الانتهاء"
              name="end_at" :value="ad.end_at">
            @error('end_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- link --}}
          <div class="form-group">
            <label>را'بط
              الموقع</label>
            <input type="url" name="link" :value="ad.link" class="form-control @error('link') is-invalid @enderror"
              placeholder="ادخل رابط الموقع" />
            @error('link')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- ad_position --}}
          <div class="form-group">
            <label>مكان الاعلان</label>

            <select name="ad_position" :value="ad.ad_position"
              class="form-control @error('ad_position') is-invalid @enderror">
              <option value="ddddddddad">at top</option>
              <option value="sidebarad">on sidebar</option>
              <option value="inlinead">inline ad</option>
            </select>

            @error('ad_position')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- image --}}
          <div class="form-group">
            <label>صوره الاعلان</label>
            <input name="image" class="form-control @error('image') is-invalid @enderror" type="file">

            @error('image')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <x-slot:footer>
            <button type="submit" class="btn" @click="$refs.addForm.submit()">حفظ
            </button>
          </x-slot:footer>
        </form>
      </x-modal>

      {{-- update ad modal --}}
      <x-modal title="تعديل اعلان" open="editModal">
        <form :action="'{{ url('/admin/ads') }}/' + ad.id" method="post" enctype="multipart/form-data"
          x-ref='editForm'>
          @method('PUT')
          @csrf

          {{-- title --}}
          <div class="form-group">
            <label for="ad-name-label">أسم
              الأعلان</label>
            <input id="ad-name-label" name="title" :value="ad.title" type="text"
              class="form-control @error('title') is-invalid @enderror" placeholder="أسم الاعلان" />
            @error('title')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- start_at --}}
          <div class="form-group">
            <label>تاريخ
              بدا الاعلان</label>
            <input type="date" class="form-control @error('start_at') is-invalid @enderror" placeholder="حدد تاريخ البدأ"
              name="start_at" :value="ad.start_at">
            @error('start_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- end_at --}}
          <div class="form-group">
            <label>تاريخ
              نهاية الاعلان</label>
            <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="حدد تاريخ الانتهاء"
              name="end_at" :value="ad.end_at">
            @error('end_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- link --}}
          <div class="form-group">
            <label>را'بط
              الموقع</label>
            <input type="text" name="link" :value="ad.link" class="form-control @error('link') is-invalid @enderror"
              placeholder="ادخل رابط الموقع" />
            @error('link')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- ad_position --}}
          <div class="form-group">
            <label>مكان الاعلان</label>

            <select name="ad_position" :value="ad.ad_position"
              class="form-control @error('ad_position') is-invalid @enderror">
              <option value="hello">at top</option>
              <option value="facebook">on sidebar</option>
              <option value="twitter">inline ad</option>
            </select>

            @error('ad_position')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- image --}}
          <div class="form-group">
            <label>صوره الاعلان</label>
            <input name="image" class="form-control @error('image') is-invalid @enderror" type="file">

            @error('image')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <x-slot:footer>
            <button class="btn" @click="$refs.editForm.submit()">حفظ
            </button>
          </x-slot:footer>
        </form>
      </x-modal>

      {{-- delete ad modal --}}
      <x-modal title="حذف الاعلان" open="deleteModal">
        <form method="post" :action="'/admin/ads/' + id" x-ref='deleteForm' style="text-align: center">
          @csrf
          @method('DELETE')

          <p class="text-danger">
            هل انت متاكد من حذف الاعلان ؟
          </p>

          <div>
            <img :src="'{{ url('images/ads') }}/'
            ad.image" width="200" height="150" alt="ad image"
              style="display: block; margin: 1rem auto;">
            <div x-text="ad.title"></div>
          </div>

          <x-slot:footer>
            <button class="btn btn-danger" @click="$refs.deleteForm.submit()">حذف
            </button>
          </x-slot:footer>
        </form>
      </x-modal>
    </div>
  </main>

@stop

