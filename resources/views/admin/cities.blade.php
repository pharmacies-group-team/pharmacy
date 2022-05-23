@extends('layouts.admin.master')
@section('content')

  <x-alert type="status" />

  <main class="ads" x-data="{ id: null, city: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div>
      <section class="section-header t-card">
        <h2 class="text-large">إدارة طرق الدفع</h2>
        <button class="btn" @click="addModal = true; city = {{ json_encode(old()) }} ?? {}">اضافة
          مدينة</button>
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

    </div>
  </main>

@stop
