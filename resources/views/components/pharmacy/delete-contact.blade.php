@if (isset($contact))
  <x-modal title="حذف " open="deleteModal">
    <form  class="t-delete-ads">

      <p class="text-danger">
        هل انت متاكد من حذف رقم الهاتف ؟
      </p>

      <x-slot:footer>
        <button class="btn btn-danger"  wire:click.prevent="delete('{{ $contact->id }}')" @click="deleteModal: false">حذف
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
