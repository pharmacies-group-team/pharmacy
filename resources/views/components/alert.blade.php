@if (isset($type))
  {{-- alert message --}}
  @if ($type === 'message' && session()->has('message'))
    <div class="alert-box" x-init="setTimeout(() => $refs.alertErrorMessage.parentNode.removeChild($refs.alertErrorMessage), 3000)" x-ref="alertErrorMessage">
      {{ session('message') }}
    </div>


    {{-- status alert --}}
  @elseif ($type === 'status' && session()->has('status'))
    <div class="alert-box" x-init="setTimeout(() => $refs.alertErrorMessage.parentNode.removeChild($refs.alertErrorMessage), 3000)" x-ref="alertErrorMessage">
      {{ session('status') }}
    </div>


    {{-- success alert --}}
  @elseif ($type === 'success' && session()->has('success'))
    <div class="alert-box" x-init="setTimeout(() => $refs.alertErrorMessage.parentNode.removeChild($refs.alertErrorMessage), 3000)" x-ref="alertErrorMessage">
      {{ session('success') }}
    </div>


    {{-- any errors --}}
    {{-- @elseif($errors->any())
    <div class="alert-box" x-init="setTimeout(() => $refs.alertErrorMessage.parentNode.removeChild($refs.alertErrorMessage), 3000)" x-ref="alertErrorMessage">
      يُرجى التأكد من إدخال البيانات الصحيحة
    </div> --}}
  @endif
@else
  {{-- this only for dev team 🤣 --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS type PARAM
    FOR x-alert COMPONENT
  </div>
@endif
