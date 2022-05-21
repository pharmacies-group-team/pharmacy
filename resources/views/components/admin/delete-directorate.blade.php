@if (isset($directorate))
  <x-modal title="حذف المديرية" open="deleteModal">
    <form method="post" action="{{ route('admin.directorates.destroy', $directorate->id) }}" x-ref='deleteForm' class="t-delete-ads">
      @csrf
      @method('DELETE')

      <p class="text-danger">
        هل انت متاكد من حذف المديرية ؟
      </p>

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
