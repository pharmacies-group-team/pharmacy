@if (isset($neighborhood))
  {{-- update city modal --}}
  <x-modal title="تعديل الحي" open="editModal">
    <form action="{{ route('admin.neighborhoods.update', $neighborhood->id) }}" method="POST"
          x-ref='editForm' class="t-edit-ads">
      @method('PUT')
      @csrf

      {{-- name --}}
      <div class="form-group">
        <label for="ad-name-label">أسم
          الحي</label>
        <input id="ad-name-label" name="name" value="{{ $neighborhood->name }}" type="text"
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
            <option @if ($neighborhood->directorate_id === $directorate->id) selected @endif value="{{ $directorate->id }}">{{ $directorate->name }}</option>
          @endforeach
        </select>
        @error('directorate_id')
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
