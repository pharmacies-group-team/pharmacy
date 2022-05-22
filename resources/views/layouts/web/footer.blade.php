<footer class="t-footer">
  <div class="t-social">
    <a href="{{ $social->facebook }}">
      <img src="{{ asset('images/fac.svg') }}" class="img-fluid" alt="Facebook">
    </a>

    <a href="{{ $social->whatsapp }}">
      <img src="{{ asset('images/wh.svg') }}" class="img-fluid" alt="Whatsapp">
    </a>

    <a href="{{ $social->twitter }}">
      <img src="{{ asset('images/tw.svg') }}" class="img-fluid" alt="twitter">
    </a>

    <a href="{{ $social->instagram }}">
      <img src="{{ asset('images/inst.svg') }}" class="img-fluid" alt="Instagram">
    </a>
  </div>

  <div class="t-links">
    <a href="{{ route('about-us') }}" class="text-secondary-base mb-2">
      <i class="bi bi-x-diamond-fill text-secondary-darker m-2"></i>
      <span>@lang('heading.about-us')</span>
    </a>

    <a href="{{ route('contact-us') }}" class="text-secondary-base mb-2">
      <i class="bi bi-x-diamond-fill text-secondary-darker m-2"></i>
      <span>@lang('heading.contact-us')</span>
    </a>

    <a href="{{ route('privacy') }}" class="text-secondary-base mb-2">
      <i class="bi bi-x-diamond-fill text-secondary-darker m-2"></i>
      <span>@lang('heading.privacy')</span>
    </a>
  </div>
</footer>


{{-- {"id":1,
"facebook":"",
"whatsapp":"",
"twitter":""
,"instagram":""
,"user_id":1,"deleted_at":null,"created_at":"2022-05-22T07:45:16.000000Z","updated_at":"2022-05-22T07:45:16.000000Z"} --}}
