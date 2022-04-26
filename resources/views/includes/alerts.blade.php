{{-- alerts --}}
<div>
  {{-- success --}}
  @if (session('status'))
    <div class="alert alert-success px-4 py-2">
      <div class="container">
        {{ session('status') }}
      </div>
    </div>
  @endif

  {{-- errors --}}
  @if ($errors->any())
    <div class="alert alert-danger">
      <div class="container">
        <ul>
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    </div>
  @endif
</div>
