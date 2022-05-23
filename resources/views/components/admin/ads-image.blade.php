@if (isset($name))
  <div class="image-file-upload">
    <div x-data="imageViewer" class="image-file-upload">

      <div class="file-upload" @click="$refs.inputFileOrder.click()" x-init="imageUrl = '{{ isset($image) ? asset('uploads/ads/' . $image) : '' }}'">

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

      {{-- file --}}
      <input type="file" name="{{ $name }}" x-ref="inputFileOrder" @change="fileChosen">
    </div>
  </div>
@else
  {{-- this only for dev team 🤣 --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS
    <strong>image `optional`</strong>
    <strong>name</strong>
    PARAM
    FOR x-image COMPONENT
  </div>
@endif
