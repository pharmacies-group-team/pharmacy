@extends('pharmacy.layouts.master_view');
@section('content');
<main class="bd-content order-1 py-5" id="content">
    <div class="container">

        {{-- @foreach ($pharmace as $p) --}}
  <div class="row">
      <div class="col-sm-6 col-md-4 col-xl-3 mb-3">

      </div>
      <div class="col-lg-4">
        <svg class="bd-placeholder-img rounded-circle" width="140" height="140" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: 140x140" preserveAspectRatio="xMidYMid slice" focusable="false">
            <title>Placeholder</title><rect width="100%" height="100%" fill="#777"></rect>
            <text x="50%" y="50%" fill="#777" dy=".3em">140x140</text></svg>

        {{-- <h2>{{ $p->pharmace_name }}</h2> --}}
        {{-- <p>{{ $p->pharmace_description }}</p> --}}
        <p><a class="btn btn-secondary" href="#">View details »</a></p>
      </div>


    </div>

    </div>
    {{-- @endforeach --}}
  </main>
  @endsection
