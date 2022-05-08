<div class="contact-us">
  {{-- title --}}
  <div class="contact-us-header">
    <h2 class="text-base">معلومات الإتصال</h2>

    {{-- <div class="icon"> --}}
    {{-- <svg width="20" height="20" viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"> --}}
    {{-- <path --}}
    {{-- d="M10 2.5C14.125 2.5 17.5 5.875 17.5 10C17.5 14.125 14.125 17.5 10 17.5C5.875 17.5 2.5 14.125 2.5 10C2.5 5.875 5.875 2.5 10 2.5ZM10 1.25C5.1875 1.25 1.25 5.1875 1.25 10C1.25 14.8125 5.1875 18.75 10 18.75C14.8125 18.75 18.75 14.8125 18.75 10C18.75 5.1875 14.8125 1.25 10 1.25Z" --}}
    {{-- fill="url(#paint0_linear_264_3433)" /> --}}
    {{-- <path d="M15 9.375H10.625V5H9.375V9.375H5V10.625H9.375V15H10.625V10.625H15V9.375Z" --}}
    {{-- fill="url(#paint1_linear_264_3433)" /> --}}
    {{-- <defs> --}}
    {{-- <linearGradient id="paint0_linear_264_3433" x1="12.6786" y1="11.9643" x2="10" y2="18.75" --}}
    {{-- gradientUnits="userSpaceOnUse"> --}}
    {{-- <stop stop-color="#5D93FF" /> --}}
    {{-- <stop offset="1" stop-color="#877EFF" /> --}}
    {{-- </linearGradient> --}}
    {{-- <linearGradient id="paint1_linear_264_3433" x1="11.5306" y1="11.1224" x2="10" y2="15" --}}
    {{-- gradientUnits="userSpaceOnUse"> --}}
    {{-- <stop stop-color="#5D93FF" /> --}}
    {{-- <stop offset="1" stop-color="#877EFF" /> --}}
    {{-- </linearGradient> --}}
    {{-- </defs> --}}
    {{-- </svg> --}}

    {{-- </div> --}}
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
            <x-icon icon='edit' />

            {{-- remove icon --}}
            <x-icon icon="remove" />
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
