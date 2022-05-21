@extends('layouts.admin.master')
@section('content')

  <x-alert type="status" />

  <main class="ads" x-data="{ id: null, directorate: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div class="container">
      <section class="section-header">
        <h2 class="text-large">إدارة طرق الدفع</h2>
        <button class="btn" @click="addModal = true; directorate = {{ json_encode(old()) }} ?? {}">اضافة مديرية</button>
      </section>

      <div class="table-wrapper">
        {{-- table --}}
        <table class="table">
          <thead>
          <tr>
            <th>
              رقم المديرية
            </th>
            <th>
              اسم المديرية
            </th>
            <th>
              المدينة
            </th>
            <th>
              تاريخ الإنشاء
            </th>
            <th></th>
          </tr>
          </thead>
          <tbody>
          @foreach ($directorates as $directorate)
            <tr>
              <td>
                {{ $directorate->id }}

              </td>

              <td>{{ $directorate->name }}</td>

              <td>{{ $directorate->city->name }}</td>

              <td>{{ $directorate->created_at->format('Y-m-d') }}</td>

              <td class="table-action" x-data="{ editModal: false, deleteModal: false }">
                {{-- edit --}}
                <button @click="editModal = true">
                  <x-icon icon='edit' />
                </button>
                <x-admin.edit-directorate :directorate='$directorate' :cities="$cities" />


                {{-- remove directorate --}}
                <button @click="deleteModal = true">
                  <x-icon icon='remove' />
                </button>
                <x-admin.delete-directorate :directorate="$directorate" />
              </td>


            </tr>
          @endforeach
          </tbody>
        </table>
      </div>

    </div>

    {{-- modals --}}
    <div>
      {{-- add directorate modal --}}
      <x-modal title="اضافة مديرية" open="addModal">
        <form action="{{ route('admin.directorates.store') }}" method="post" x-ref="addForm">
          @csrf

          {{-- directorate name --}}
          <div class="form-group">
            <label for="ad-name-label">الاسم</label>
            <input id="ad-name-label" name="name" :value="directorate.name" type="text"
                   class="form-control @error('name') is-invalid @enderror" placeholder="أسم المديرية" />
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- directorate name --}}
          <div class="form-group">
            <label for="ad-name-label">المدينة</label>
            <select name="city_id" value="{{ old('city_id') }}"
                    class="form-control @error('city_id') is-invalid @enderror">
              <option selected disabled>حدد المدينة</option>
              @foreach($cities as $city)
                <option value="{{ $city->id }}">{{ $city->name }}</option>
              @endforeach
            </select>
            @error('city_id')
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
