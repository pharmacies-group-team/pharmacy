@if (isset($ad))
  {{-- update ad modal --}}
  <x-modal title="تعديل اعلان" open="editModal">
    <form action="{{ route('admin.ads.update', $ad->id) }}" method="POST" enctype="multipart/form-data"
      x-ref='editForm' class="t-edit-ads">
      @method('PUT')
      @csrf

      {{-- title --}}
      <div class="form-group">
        <label for="ad-name-label">أسم
          الأعلان</label>
        <input id="ad-name-label" name="title" value="{{ $ad->title }}" type="text"
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
          name="start_at" value="{{ $ad->start_at }}">
        @error('start_at')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      {{-- end_at --}}
      <div class="form-group">
        <label>تاريخ
          نهاية الاعلان</label>
        <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="حدد تاريخ الانتهاء"
          name="end_at" value="{{ $ad->end_at }}">
        @error('end_at')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      {{-- link --}}
      <div class="form-group">
        <label>را'بط
          الموقع</label>
        <input type="text" name="link" value="{{ $ad->link }}"
          class="form-control @error('link') is-invalid @enderror" placeholder="ادخل رابط الموقع" />
        @error('link')
          <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      {{-- ad_position --}}
      <div class="form-group">
        <label>مكان الاعلان</label>

        <select name="ad_position" value="{{ $ad->ad_position }}"
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
      <x-admin.ads-image name='image' :image="$ad->image" />

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
