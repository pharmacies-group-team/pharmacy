@extends('layouts/dashboard/dashboard-master')
@section('content')

  <x-alert type="status" />

  <main class="ads" x-data="{ id: null, payment: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div class="container">
      <section class="section-header">
        <h2 class="text-large">إدارة طرق الدفع</h2>
        <button class="btn" @click="addModal = true; payment = {{ json_encode(old()) }} ?? {}">اضافه طريقة
          دفع</button>
      </section>

      <div class="table-wrapper">
        {{-- table --}}
        <table class="table">
          <thead>
            <tr>
              <th class="sorting sorting_desc" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 147px" aria-label="Name: activate to sort column ascending" aria-sort="descending">
                الصورة
              </th>
              <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 225px" aria-label="Position: activate to sort column ascending">
                اسم طريقة الدفع
              </th>
              <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 55px" aria-label="Office: activate to sort column ascending">
                اسم البنك
              </th>

              <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 94px" aria-label="Age: activate to sort column ascending">
                حذف
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($payments as $payment)
              <tr>
                <td>
                  <img src="{{ asset(\App\Enum\PaymentEnum::IMAGE_PATH . $payment->image) }}" style="margin: auto" />
                  <input type="hidden" name="image" value="{{ $payment->id }}" />
                </td>

                <td class="dtr-control sorting_1" tabindex="0">
                  {{ $payment->name }}

                </td>
                <td>{{ $payment->bank_name }}</td>

                <td class="table-action">
                  <button @click=" id = {{ $payment->id }}; payment = {{ $payment }}; editModal = true">
                    <x-icon icon='edit' />
                  </button>

                  <button @click="id = {{ $payment->id }};payment = {{ $payment }}; deleteModal = true">
                    <x-icon icon='remove' />
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

    {{-- modals --}}
    <div>
      {{-- add ads modal --}}
      <x-modal title="اضافة طريقة دفع إلكترونية" open="addModal">
        <form action="{{ route('admin.payments.store') }}" method="post" enctype="multipart/form-data" x-ref="addForm">
          @csrf

          {{-- add titles --}}
          <div class="form-group">
            <label for="ad-name-label">الاسم</label>
            <input id="ad-name-label" name="name" :value="payment.name" type="text"
              class="form-control @error('name') is-invalid @enderror" placeholder="أسم طريقة الدفع" />
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- link --}}
          <div class="form-group">
            <label>اسم البنك</label>
            <input type="text" name="bank_name" :value="payment.bank_name"
              class="form-control @error('bank_name') is-invalid @enderror" placeholder="اسم البنك اللإلكتروني" />
            @error('bank_name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- image --}}
          <div class="form-group">
            <label>صوره طريقة الدفع</label>
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
      <x-modal title="تعديل طريقة الدفع" open="editModal">
        <form :action="'{{ url('/admin/payments') }}/' + payment.id" method="post" enctype="multipart/form-data"
          x-ref='editForm'>
          @method('PUT')
          {{-- name --}}
          @csrf
          <div class="form-group">
            <label for="ad-name-label">أسم طريقة الدفع</label>
            <input id="ad-name-label" name="name" :value="payment.name" type="text"
              class="form-control @error('name') is-invalid @enderror" placeholder="أسم طريقة الدفع" />
            @error('name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- bank name --}}
          <div class="form-group">
            <label>اسم البنك الإلكتروني</label>
            <input type="text" name="bank_name" :value="payment.bank_name"
              class="form-control @error('bank_name') is-invalid @enderror" placeholder="اسم البنك الإلكتروني" />
            @error('bank_name')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- image --}}
          <div class="form-group">
            <label>صورة طريقة الدفع</label>
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
      <x-modal title="حذف طريقة الدفع" open="deleteModal">
        <form method="post" :action="'/admin/payments/' + id" x-ref='deleteForm' style="text-align: center">
          @csrf
          @method('DELETE')

          <p class="text-danger">
            هل انت متاكد من الحذف ؟
          </p>

          <div>
{{--            <img :src="'{{ \App\Enum\PaymentEnum::IMAGE_PATH }}'--}}
{{--            payment.image" width="200" height="150"--}}
{{--              alt="payment image" style="display: block; margin: 1rem auto;">--}}
            <div x-text="payment.name"></div>
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
