@extends('layouts/client/master')
@section('content')

  <div class="container px-5">
    @include('includes.alerts')
  </div>

  <main class="pharmacy-profile">

    <div class="section-header">
      <h1 class="text-large">Index</h1>
    </div>

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
