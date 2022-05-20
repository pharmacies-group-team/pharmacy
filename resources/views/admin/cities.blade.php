@extends('layouts.admin.master')
@section('content')

  <x-alert type="status" />

  <main class="ads" x-data="{ id: null, city: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div class="container">
      <section class="section-header">
        <h2 class="text-large">إدارة طرق الدفع</h2>
        <button class="btn" @click="addModal = true; city = {{ json_encode(old()) }} ?? {}">اضافة مدينة</button>
      </section>

      <div class="table-wrapper">
        {{-- table --}}
        <table class="table">
          <thead>
          <tr>
            <th>
              رقم المدينة
            </th>
            <th>
              اسم المدينة
            </th>
            <th>
              تاريخ الإنشاء
            </th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach ($cities as $city)
            <tr>
              <td>
                {{ $city->id }}

              </td>

              <td>{{ $city->name }}</td>

              <td>{{ $city->created_at->format('Y-m-d') }}</td>

              <td class="table-action" x-data="{ editModal: false, deleteModal: false }">
                {{-- edit --}}
                <button @click="editModal = true">
                  <x-icon icon='edit' />
                </button>
                <x-admin.edit-city :city='$city' />


                {{-- remove ads --}}
                <button @click="deleteModal = true">
                  <x-icon icon='remove' />
                </button>
                <x-admin.delete-city :city="$city" />
              </td>


            </tr>
          @endforeach
          </tbody>
        </table>
      </div>

    </div>

    {{-- modals --}}
    <div>
      {{-- add city modal --}}
      <x-modal title="اضافة مدينة" open="addModal">
        <form action="{{ route('admin.cities.store') }}" method="post" enctype="multipart/form-data" x-ref="addForm">
          @csrf

          {{-- add name --}}
          <div class="form-group">
            <label for="ad-name-label">الاسم</label>
            <input id="ad-name-label" name="name" :value="city.name" type="text"
                   class="form-control @error('name') is-invalid @enderror" placeholder="أسم المدينة" />
            @error('name')
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
      <x-modal title="تعديل اسم المدينة" open="editModal">
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
            {{-- <img :src="'{{ \App\Enum\PaymentEnum::IMAGE_PATH }}' --}}
            {{-- payment.image" width="200" height="150" --}}
            {{-- alt="payment image" style="display: block; margin: 1rem auto;"> --}}
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
