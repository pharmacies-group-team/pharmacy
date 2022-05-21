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
              رقم الحي
            </th>
            <th>
              اسم الحي
            </th>
            <th>
              المديرية
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
          @foreach ($neighborhoods as $neighborhood)
            <tr>
              <td>
                {{ $neighborhood->id }}

              </td>

              <td>{{ $neighborhood->name }}</td>

              <td>{{ $neighborhood->directorate->name }}</td>

              <td>{{ $neighborhood->directorate->city->name }}</td>

              <td>{{ $neighborhood->created_at->format('Y-m-d') }}</td>

              <td class="table-action" x-data="{ editModal: false, deleteModal: false }">
                {{-- edit --}}
                <button @click="editModal = true">
                  <x-icon icon='edit' />
                </button>
                <x-admin.edit-neighborhood :directorates='$directorates' :neighborhood="$neighborhood" />


                {{-- remove directorate --}}
                <button @click="deleteModal = true">
                  <x-icon icon='remove' />
                </button>
                <x-admin.delete-neighborhood :neighborhood="$neighborhood" />
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
      <x-modal title="اضافة حي" open="addModal">
        <form action="{{ route('admin.neighborhoods.store') }}" method="post" x-ref="addForm">
          @csrf

          {{-- directorate name --}}
          <div class="form-group">
            <label for="ad-name-label">الاسم</label>
            <input id="ad-name-label" name="name" :value="neighborhood.name" type="text"
                   class="form-control @error('name') is-invalid @enderror" placeholder="أسم الحي" />
            @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- directorate name --}}
          <div class="form-group">
            <label for="ad-name-label">المديرية</label>
            <select name="directorate_id" value="{{ old('directorate_id') }}"
                    class="form-control @error('directorate_id') is-invalid @enderror">
              <option selected disabled>حدد المديرية</option>
              @foreach($directorates as $directorate)
                <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
              @endforeach
            </select>
            @error('directorate_id')
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
