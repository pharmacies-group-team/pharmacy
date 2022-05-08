@if (isset($image) && isset($name) && isset($uploadTo))
  <div class="upload-image" x-data="{ uploadImageModal: false }">
    <img src="{{ $image }}" alt="profile avatar" class="avatar">

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

        @error($name)
          <span class="text-danger">
            {{ $message }}
          </span>
        @enderror

        {{-- form --}}
        <form action="{{ $uploadTo }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{-- file --}}
          <input type="file" name="{{ $name }}" x-ref="inputFileOrder" @change="fileChosen">

          <button type="submit" class="btn btn-full">
            @lang('form.update-image')
          </button>
        </form>
      </div>
    </x-modal>
  </div>
@else
  {{-- this only for dev team 🤣 --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS
    <strong>image</strong>
    <strong>name</strong>
    <strong>uploadTo</strong>
    PARAM
    FOR x-image COMPONENT
  </div>
@endif

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
