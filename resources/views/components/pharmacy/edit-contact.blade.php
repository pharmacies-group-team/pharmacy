@if (isset($contact))
  {{-- update city modal --}}
  <x-modal title="تعديل رقم الهاتف" open="editModal">
    <form class="t-edit-ads">
      {{-- name --}}
      <div class="form-group">
        <label for="ad-name-label">رقم الهاتف</label>
        <input id="ad-name-label" wire:model="contact" type="text"
               class="form-control @error('phone') is-invalid @enderror" placeholder="رقم الهاتف" />
        @error('phone')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
      </div>

      <x-slot:footer>
        <button class="btn" wire:click.prevent="update('{{ $contact->id }}')" @click="editModal: false">حفظ
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
