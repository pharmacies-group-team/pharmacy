@if (isset($directorate))
  {{-- update city modal --}}
  <x-modal title="تعديل المديرية" open="editModal">
    <form action="{{ route('admin.directorates.update', $directorate->id) }}" method="POST"
          x-ref='editForm' class="t-edit-ads">
      @method('PUT')
      @csrf

      {{-- name --}}
      <div class="form-group">
        <label for="ad-name-label">أسم
          المديرية</label>
        <input id="ad-name-label" name="name" value="{{ $directorate->name }}" type="text"
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
          @foreach($cities as $city)
            <option @if ($directorate->city_id === $city->id) selected @endif value="{{ $city->id }}">{{ $city->name }}</option>
          @endforeach
        </select>
        @error('city_id')
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
