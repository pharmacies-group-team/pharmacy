@if (isset($type))
  <div
    x-data='{animationClasses: `animate__bounce animate__animated animate__repeat-2`, hidden:() => setTimeout(() => $refs.alertErrorMessage.parentNode.removeChild($refs.alertErrorMessage), 5000)}'>
    {{-- alert message --}}
    @if ($type === 'message' && session()->has('message'))
      <div class="alert-box" :class="animationClasses" x-init=" hidden()" x-ref="alertErrorMessage">
        {{ session('message') }}
      </div>


      {{-- status alert --}}
    @elseif ($type === 'status' && session()->has('status'))
      <div class="alert-box" :class="animationClasses" x-init=" hidden()" x-ref="alertErrorMessage">
        {{ session('status') }}
      </div>


      {{-- success alert --}}
    @elseif ($type === 'success' && session()->has('success'))
      <div class="alert-box" :class="animationClasses" x-init=" hidden()" x-ref="alertErrorMessage">
        {{ session('success') }}
      </div>


      {{-- any errors --}}
    @elseif($type === 'any' && $errors->any())
      <div class="alert-box" :class="animationClasses" x-init="hidden()" x-ref="alertErrorMessage">
        يُرجى التأكد من إدخال البيانات الصحيحة
      </div>
    @endif
  </div>
@else
  {{-- this only for dev team 🤣 --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS type PARAM
    FOR x-alert COMPONENT
  </div>
@endif
