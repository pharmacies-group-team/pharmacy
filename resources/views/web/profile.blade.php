@extends('layouts.web.master')

@section('title') profile @stop

@php use App\Enum\PharmacyEnum;  @endphp

@section('content')

  <section class="profile__bg"
    style="background-image: url(@if (isset($pharmacy->logo)) {{ asset(\App\Enum\PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo) }}) @else {{ asset(\App\Enum\PharmacyEnum::PHARMACY_LOGO_DEFAULT) }}) @endif">
    <div class="container-fluid d-flex justify-content-start align-items-end position-relative" style="height: inherit;">
      <div class="profile__avatar d-flex justify-content-end align-items-start gap-4">
        <figure class="position-relative">
          <img class="rounded-3"
            src="@if (isset($pharmacy->logo)) {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo) }}
                    @else{{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT) }} @endif"
            alt="">

          @if (Auth::id() === $pharmacy->user->id)
            <a data-bs-toggle="modal" data-bs-target="#editImg"
              class="btn bg-primary-lighter position-absolute start-0 bottom-0" style="padding: 5px 10px;"><i
                class="bi bi-pencil-square"></i></a>
          @endif

        </figure>
        <div class="pt-4">
          <h4 class="text-dark-100">{{ $pharmacy->name }}</h4>
          <p>
            <i class="bi bi-geo-alt-fill text-primary-base"></i>
            @if (isset($pharmacy->neighborhood->directorate->city))
              <span>{{ $pharmacy->neighborhood->directorate->city->name }} - </span>
            @endif
            @if (isset($pharmacy->neighborhood->directorate))
              <span>{{ $pharmacy->neighborhood->directorate->name }} - </span>
            @endif
            @if (isset($pharmacy->neighborhood))
              <span>{{ $pharmacy->neighborhood->name }} </span>
            @endif
          </p>
        </div>
      </div>
      <a href="" class="btn btn-primary__linear position-absolute" style="bottom: 30px; left: 30px">أطلب دوائك</a>
    </div>
  </section>

  <section class="mt-5">
    <div class="container-lg p-lg-0 px-5">
      <div class="row">
        <div class="col-lg-7 col-md-6 col-12">
          <div class="p-5">
            <h1 class="text-primary-dark fw-bold fs-2">عن صيدلية <span
                class="text-primary-base">{{ $pharmacy->name }}</span></h1>
            <p class="fs-6 text-primary-darker mt-3">
              @if (isset($pharmacy->about))
                {{ $pharmacy->about }}
              @endif
            </p>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-12 card card-blur position-relative p-4">
          <img src="{{ asset('images/contact.png') }}" class="position-absolute" width="15%"
            style="top: 20px; left: 20px; filter: opacity(0.1);" alt="">
          <h1 class="fs-5 text-primary-dark fw-bold mb-4">تواصل معنا</h1>
          <div class="d-flex flex-column">
            @if (isset($pharmacy->email))
              <a href="" class="text-primary-darker mb-2">
                <i class="bi bi-envelope m-2"></i>
                <span>{{ $pharmacy->email }}</span>
              </a>
            @endif
            @if (isset($pharmacy->contacts))
              @foreach ($pharmacy->contacts as $contact)
                <a href="" class="text-primary-darker mb-2">
                  <i class="bi bi-telephone m-2"></i>
                  <span>{{ $contact->phone }}</span>
                </a>
              @endforeach
            @endif
          </div>

          @if (isset($pharmacy->social))
            <div class="d-flex mt-3">
              @if (isset($pharmacy->social->whatsapp))
                <a href="{{ $pharmacy->social->whatsapp }}" class="text-primary-darker mb-2">
                  <i class="bi bi-whatsapp m-2"></i>
                </a>
              @endif

              @if (isset($pharmacy->social->website))
                <a href="{{ $pharmacy->social->website }}" class="text-primary-darker mb-2">
                  <i class="bi bi-globe m-2"></i>
                </a>
              @endif

              @if (isset($pharmacy->social->facebook))
                <a href="{{ $pharmacy->social->facebook }}" class="text-primary-darker mb-2">
                  <i class="bi bi-facebook m-2"></i>
                </a>
              @endif

              @if (isset($pharmacy->social->twitter))
                <a href="{{ $pharmacy->social->twitter }}" class="text-primary-darker mb-2">
                  <i class="bi bi-twitter m-2"></i>
                </a>
              @endif
            </div>
          @endif
        </div>
      </div>
    </div>
  </section>
@stop
