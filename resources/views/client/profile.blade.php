@extends('layouts/client/master')
@section('content')

  <div class="container px-5">
{{--    @include('includes.alerts')--}}
  </div>

  <main class="pharmacy-profile">

    <div class="section-header">
      <h1 class="text-large">بروفايل</h1>
    </div>

    <div class="pharmacy-info">

      <div class="profile-form">
        {{-- form --}}
        <form action="">
          {{-- name --}}
          <div class="form-group">
            <label class="text-base">اسم </label>

            <input type="text" class="form-control" name="name" placeholder="اسم ">
          </div>

          {{-- email --}}
          <div class="form-group">
            <label class="text-base">الايميل </label>

            <input type="text" class="form-control" name="email">
          </div>


          <button type="submit" class="btn btn-full">حفظ</button>
        </form>
      </div>

      {{-- avatar --}}
      <div class="upload-image" x-data="{ uploadImageModal: false }">
        {{-- TODO change the src later --}}
        <img src="{{ asset('img/avatars/avatar.jpg') }}" alt="profile avatar" class="avatar">

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

                  <p class="title">أضف صورة </p>
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
              <input type="file" accept="image/*" name="avatar" x-ref="inputFileOrder" @change="fileChosen">

              <button type="submit" class="btn btn-full">
                تحديث الصورة
              </button>
            </form>
          </div>
        </x-modal>
      </div>
    </div>

    <hr class="divided">

    @livewire('security')
  </main>

@stop



@section('alpine-script')

  <script>
    function imageViewer() {
      return {
        imageUrl: '',

        fileChosen(event) {
          this.fileToDataUrl(event, src => this.imageUrl = src)
        },

        fileToDataUrl(event, callback) {
          if (!event.target.files.length) return

          let file = event.target.files[0],
            reader = new FileReader()

          reader.readAsDataURL(file)
          reader.onload = e => callback(e.target.result)
        },
      }
    }
  </script>
@endsection
