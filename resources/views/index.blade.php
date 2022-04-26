@extends('layouts.web.master')

@section('title') Home @stop

@php use App\Enum\PharmacyEnum; $count = 0 @endphp

@section('content')

  <!-- Start Services Section -->
  <section>
    <div class="container-xl">
      <div class="row">
        <div class="col-lg-10 col-md-12 m-auto">
          <article class="card bg-primary-darker rounded-3 service p-3" style="min-height: 230px;">
            <div class="d-flex flex-md-row flex-column">
              @foreach ($services->slice(0, 3) as $service)
                @php($count++)
                @if ($count === 2)
                  <div class="col-md-4 col-12 position-relative">
                    <article
                      class="rounded-3 d-flex bg-secondary-light position-absolute flex-column justify-content-center align-items-center text-primary-dark p-3"
                      style="bottom: 13px; min-height: 230px;">
                      <i class="bi bi-arrow-repeat fs-1"></i>
                      <h5>{{ $service->name }}</h5>
                      <p class="fw-light mt-2 text-center">{{ $service->desc }}</p>
                    </article>
                  </div>
                @else
                  <div class="col-md-4 col-12">
                    <article
                      class="d-flex flex-column justify-content-center align-items-center text-secondary-lighter p-3">
                      <i class="bi bi-bicycle fs-1"></i>
                      <h5>{{ $service->name }}</h5>
                      <p class="fw-light mt-2 text-center">{{ $service->desc }}</p>
                    </article>
                  </div>
                @endif
              @endforeach
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>
  <!-- End Services Section -->

  <!-- Start Pharmacies Section -->
  <section>
    <header class="d-flex flex-column justify-content-center align-items-center mt-5 mb-2 pt-5">
      <h1 class="text-primary-darker fw-bold fs-1">الصيدليات</h1>
    </header>
    <div class="container-lg owl-2-style mt-2">
      <a href="{{ route('pharmacies') }}" class="d-block text-start d-flex justify-content-lg-end text-primary-base align-items-center mb-4 gap-2">
        <span>عرض جميع الصيدليات</span>
        <i class="bi bi-arrow-left mt-1"></i>
      </a>
      <div class="owl-carousel owl-2">
        @if (isset($pharmacies))
          @foreach ($pharmacies as $pharmacy)
            <article class="card bg-secondary-light rounded-3 card--hover shadow" style="min-height: 272px;height: 272px;">
              <div class="d-flex flex-column justify-content-center align-items-center p-4" style="min-height: 220px;height: 220px;">
                <img src="@if(isset($pharmacy->logo))
                            {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH.$pharmacy->logo) }}
                          @else
                            {{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT) }}
                          @endif" width="50%" class="rounded-circle img-fluid" alt="">
                <a href="{{ route('pharmacy.profile', $pharmacy->id) }}" class="fs-5 fw-bold text-primary-dark mt-4">
                  {{ $pharmacy->name }}
                </a>
                <p class="text-dark-100">
                  @if (isset($pharmacy->neighborhood->name))
                    <span class="text-dark-50">
                        {{ $pharmacy->neighborhood->name }} /
                    </span>
                    <span>{{ $pharmacy->neighborhood->directorate->name }}</span>
                  @endif
                </p>
              </div>
              <a class="btn bg-secondary-dark rounded-botton-3 fw-bold text-dark-50 p-3" href="">أطلب دوائك</a>
            </article>
          @endforeach
        @endif
      </div>
    </div>
  </section>
  <!-- End Pharmacies Section -->

  <!-- Start Register Pharmacy -->
  <section class="mt-5 py-5" style="background-image: url({{ asset('images/map.svg') }})">
    <div class="container">
      <div class="row">
        <div class="col-xl-6 col-lg-7 col-md-8 col-12 m-lg-0 m-md-auto">
          <div class="card p-md-5 card-blur p-3">
            <h1 class="text-primary-base fw-bold">هل أنت صاحب صيدلية؟</h1>
            <p class="fs-lg-5 text-primary-darker mt-2">انضم لشفاء الآن واجعل صيدليتك أونلاين! واحصل على مبيعات أكثر من
              خلال الانضمام لتطبيق شفاء عبر تسجيلك لهذا النموذج.</p>
            <a href="{{ route('register.pharmacy') }}" class="btn btn-primary w-75 mt-3">أنضم إلينا كصيدلية</a>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- End Register Pharmacy -->

@stop
