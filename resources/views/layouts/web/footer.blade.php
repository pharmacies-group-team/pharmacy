<footer class="bg-linear mt-5 p-5">
  <div class="container-lg">
    <div class="row">
      <article class="col-lg-4 col-md-4 col-12 mt-md-0 mt-4">
        <div class="d-flex flex-column">
          <a href="#">

            <h1 class="text-secondary-lighter fs-3 fw-bold">PHARMACY
              <span class="fs-6 fw-normal text-secondary-base">online</span>
            </h1>
          </a>

          <p class="text-secondary-light mt-2">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص
          </p>

          <div class="row mt-4 gap-2">
            <a href="#" class="col-2">
              <img src="{{ asset('images/fac.svg') }}" class="img-fluid" alt="Facebook">
            </a>
            <a href="#" class="col-2">
              <img src="{{ asset('images/wh.svg') }}" class="img-fluid" alt="Whatsapp">
            </a>
            <a href="#" class="col-2">
              <img src="{{ asset('images/tw.svg') }}" class="img-fluid" alt="twitter">
            </a>
            <a href="#" class="col-2">
              <img src="{{ asset('images/inst.svg') }}" class="img-fluid" alt="Instagram">
            </a>
          </div>
        </div>
      </article>

      <article class="col-lg-3 col-md-4 col-12 mt-md-0 mt-4">
        <h5 class="text-secondary-light mb-3">روابط سريعة</h5>
        <div class="d-flex flex-column">
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
      </article>
    </div>
  </div>
</footer>
