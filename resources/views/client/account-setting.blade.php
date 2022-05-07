@extends('layouts.client.master')

@php use \App\Enum\UserEnum;  @endphp

@section('content')


  @include('includes.alerts')

  <main class="pharmacy-profile">
    <div class="pharmacy-info">

      {{-- form --}}
      <livewire:account />

      {{-- avatar --}}
      <div class="upload-image" x-data="{ uploadImageModal: false }">

        <img src="@if(isset($user->avatar))
        {{ asset(UserEnum::USER_AVATAR_PATH.$user->avatar) }}
        @else
        {{ asset(UserEnum::USER_AVATAR_DEFAULT) }}
        @endif"
             alt="profile avatar" class="avatar">

        <button class="update-btn" @click="uploadImageModal = !uploadImageModal">
          <div class="icon">
            <svg width="28" height="22" viewBox="0 0 28 22" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M26.25 18C26.25 18.4641 26.0656 18.9092 25.7374 19.2374C25.4092 19.5656 24.9641 19.75 24.5 19.75H3.5C3.03587 19.75 2.59075 19.5656 2.26256 19.2374C1.93437 18.9092 1.75 18.4641 1.75 18V7.5C1.75 7.03587 1.93437 6.59075 2.26256 6.26256C2.59075 5.93437 3.03587 5.75 3.5 5.75H5.551C6.94267 5.74924 8.27709 5.19596 9.261 4.21175L10.7135 2.76275C11.0408 2.43539 11.4844 2.25103 11.9473 2.25H16.0492C16.5133 2.2501 16.9584 2.43454 17.2865 2.76275L18.7355 4.21175C19.2231 4.6995 19.802 5.0864 20.4392 5.35034C21.0764 5.61428 21.7593 5.75008 22.449 5.75H24.5C24.9641 5.75 25.4092 5.93437 25.7374 6.26256C26.0656 6.59075 26.25 7.03587 26.25 7.5V18ZM3.5 4C2.57174 4 1.6815 4.36875 1.02513 5.02513C0.368749 5.6815 0 6.57174 0 7.5L0 18C0 18.9283 0.368749 19.8185 1.02513 20.4749C1.6815 21.1313 2.57174 21.5 3.5 21.5H24.5C25.4283 21.5 26.3185 21.1313 26.9749 20.4749C27.6313 19.8185 28 18.9283 28 18V7.5C28 6.57174 27.6313 5.6815 26.9749 5.02513C26.3185 4.36875 25.4283 4 24.5 4H22.449C21.5208 3.9998 20.6307 3.63092 19.9745 2.9745L18.5255 1.5255C17.8693 0.869077 16.9792 0.500198 16.051 0.5H11.949C11.0208 0.500198 10.1307 0.869077 9.4745 1.5255L8.0255 2.9745C7.36928 3.63092 6.47918 3.9998 5.551 4H3.5Z"
                fill="#3869BA" />
              <path
                d="M14 16.25C12.8397 16.25 11.7269 15.7891 10.9064 14.9686C10.0859 14.1481 9.625 13.0353 9.625 11.875C9.625 10.7147 10.0859 9.60188 10.9064 8.78141C11.7269 7.96094 12.8397 7.5 14 7.5C15.1603 7.5 16.2731 7.96094 17.0936 8.78141C17.9141 9.60188 18.375 10.7147 18.375 11.875C18.375 13.0353 17.9141 14.1481 17.0936 14.9686C16.2731 15.7891 15.1603 16.25 14 16.25ZM14 18C15.6245 18 17.1824 17.3547 18.331 16.206C19.4797 15.0574 20.125 13.4995 20.125 11.875C20.125 10.2505 19.4797 8.69263 18.331 7.54397C17.1824 6.39531 15.6245 5.75 14 5.75C12.3755 5.75 10.8176 6.39531 9.66897 7.54397C8.52031 8.69263 7.875 10.2505 7.875 11.875C7.875 13.4995 8.52031 15.0574 9.66897 16.206C10.8176 17.3547 12.3755 18 14 18ZM5.25 8.375C5.25 8.60706 5.15781 8.82962 4.99372 8.99372C4.82962 9.15781 4.60706 9.25 4.375 9.25C4.14294 9.25 3.92038 9.15781 3.75628 8.99372C3.59219 8.82962 3.5 8.60706 3.5 8.375C3.5 8.14294 3.59219 7.92038 3.75628 7.75628C3.92038 7.59219 4.14294 7.5 4.375 7.5C4.60706 7.5 4.82962 7.59219 4.99372 7.75628C5.15781 7.92038 5.25 8.14294 5.25 8.375Z"
                fill="#3869BA" />
            </svg>
          </div>
        </button>

        {{-- modal --}}
        <x-modal title='upload image' open="uploadImageModal">

          <form action="{{ route('setting.update.avatar') }}" method="post" enctype="multipart/form-data"
                class="row g-3 needs-validation" novalidate>
            @csrf
            <div class="col-12">
              <div class="input-group mb-3">
                <input name="avatar" type="file" class="form-control @error('avatar') is-invalid @enderror"
                       id="inputGroupFile02">
              </div>
              @error('avatar')
              <span class="text-danger" role="alert">
                {{ $message }}
              </span>
              @enderror
            </div>
            <div class="modal-footer">
              <button type="submit" class="btn btn-primary px-5">حفظ</button>
            </div>
          </form>
        </x-modal>

      </div>
    </div>

    <hr class="divided">

    {{-- security --}}
    <livewire:security />

  </main>

@stop
