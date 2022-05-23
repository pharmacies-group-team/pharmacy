@if (isset($ad))
  <x-modal title="حذف الاعلان" open="deleteModal">
    <form method="post" action="{{ route('admin.ads.destroy', $ad->id) }}" x-ref='deleteForm' class="t-delete-ads">
      @csrf
      @method('DELETE')

      <p class="text-danger">
        هل انت متاكد من حذف الاعلان ؟
      </p>

      <div>
        <img src="{{ asset('uploads/ads/' . $ad->image) }}" alt="ad image" width="200px" height="200px">

        <div x-text="ad.title"></div>
      </div>

      <x-slot:footer>
        <button class="btn btn-danger" @click="$refs.deleteForm.submit()">حذف
        </button>
      </x-slot:footer>
    </form>
  </x-modal>
@else
  {{-- this only for dev team --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS
    <strong>ad</strong>
    PARAM
    FOR x-image COMPONENT
  </div>
@endif
