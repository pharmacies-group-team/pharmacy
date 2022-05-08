@php
use App\Enum\UserEnum;
@endphp

<div class='pharmacy-profile'>
  <div class="section-header">
    <h2 class="text-large">@lang('heading.profile')</h2>
  </div>

  <div class="pharmacy-info">
    <div class="profile-form">
      {{-- form --}}
      <form action="">
        {{-- name --}}
        <div class="form-group">

          <label class="text-base"> @lang('form.name') </label>

          <input type="text" value="{{ $name }}" class="form-control" name="name"
            placeholder="@lang('form.name') ">
        </div>

        {{-- email --}}
        <div class="form-group">
          <label class="text-base">@lang('form.email')</label>

          <input type="text" class="form-control" value="{{ $email }}" name="email"
            placeholder="@lang('form.email')">
        </div>

        <button type="submit" class="btn btn-full">@lang('form.update')</button>
      </form>
    </div>

    {{-- avatar --}}
    @if (isset($avatar))
      <div class="upload-image" x-data="{ uploadImageModal: false }">
        <img src="{{ asset(UserEnum::USER_AVATAR_PATH . $avatar) }}" alt="profile avatar" class="avatar">

        <button class="update-btn" @click="uploadImageModal = true">
          <x-icon icon='camera' />
        </button>

        {{-- modal --}}
        <x-modal title='upload image' open="uploadImageModal">
          <div x-data="imageViewer" class="image-file-upload">

            <div class="file-upload" @click="$refs.inputFileOrder.click()">
              {{-- add image input --}}
              <template x-if="!imageUrl">
                <div>
                  <x-icon icon='add-image' />

                  <p class="title">@lang('form.add-image') </p>
                </div>
              </template>

              {{-- image viewer --}}
              <template x-if="imageUrl">
                <div class="viewer-image">
                  <img :src="imageUrl" width="100%">
                </div>
              </template>
            </div>

            @error('image')
              <span class="text-danger" role="alert">
                {{ $message }}
              </span>
            @enderror

            {{-- form --}}
            <form action="{{ route('setting.update.avatar') }}" method="POST" enctype="multipart/form-data">
              @csrf

              {{-- file --}}
              <input type="file" name="avatar" x-ref="inputFileOrder" @change="fileChosen">

              <button type="submit" class="btn btn-full">
                @lang('form.update-image')
              </button>
            </form>
          </div>
        </x-modal>
      </div>
    @endif
  </div>
</div>
