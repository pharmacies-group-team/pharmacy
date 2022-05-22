<div class="contact-us"  x-data="{ editModal: false, deleteModal: false }">
  {{-- title --}}
  <div class="contact-us-header">
    <h2 class="text-base">معلومات الإتصال</h2>
  </div>

  {{-- list --}}
  <ul class="list">
    @foreach ($contacts as $contact)
      {{-- item --}}
      <li class="item">
        {{-- phone --}}
        <div class="item__column">
          <x-icon icon='phone' />

          <span>{{ $contact->phone }}</span>
          {{-- TODO Update and Delete (when modal it's ready) --}}
          <div style="display:flex; gap: 18px">
            <button @click="editModal = true">
              <x-icon icon='edit' />
            </button>
            <x-pharmacy.edit-contact :contact='$contact' />


            {{-- remove ads --}}
            <button @click="deleteModal = true">
              <x-icon icon='remove' />
            </button>
            <x-pharmacy.delete-contact :contact="$contact" />
          </div>
        </div>
      </li>
    @endforeach
  </ul>

  <form class="form">
    <x-alert type="message" />

    {{-- name --}}
    <div class="form-group">
      <input wire:model="phone" type="text" class="form-control" placeholder="رقم الهاتف">
      @error('phone')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>


    <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
  </form>

</div>
