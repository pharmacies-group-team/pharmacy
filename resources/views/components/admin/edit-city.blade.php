@if (isset($city))
  {{-- update city modal --}}
  <x-modal title="تعديل المدينة" open="editModal">
    <form action="{{ route('admin.cities.update', $city->id) }}" method="POST"
          x-ref='editForm' class="t-edit-ads">
      @method('PUT')
      @csrf

      {{-- name --}}
      <div class="form-group">
        <label for="ad-name-label">أسم
          المدينة</label>
        <input id="ad-name-label" name="name" value="{{ $city->name }}" type="text"
               class="form-control @error('name') is-invalid @enderror" placeholder="أسم المدينة" />
        @error('name')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <x-slot:footer>
        <button class="btn" @click="$refs.editForm.submit()">حفظ
        </button>
      </x-slot:footer>
    </form>
  </x-modal>
@else
  {{-- this only for dev team 🤣 --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS
    <strong>image `optional`</strong>
    <strong>name</strong>
    PARAM
    FOR x-image COMPONENT
  </div>
@endif
