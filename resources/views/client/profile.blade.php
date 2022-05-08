@extends('layouts/client/master')
@section('content')

  <div class="container px-5">
    <x-alert type="status" />
  </div>

  @if (isset($client))
    <main>
      <livewire:user.profile avatar="{{ $client->avatar }}" name="{{ $client->name }}"
        email="{{ $client->email }}" />

      <div class="container">
        <hr class="divided">

        <livewire:security />
      </div>
    </main>
  @endif

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
