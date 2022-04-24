@extends('layouts.web.master')

@section('title') Pharmacies @stop

@section('content')

  <section class="position-sticky" style="z-index: 999999999; top: 10%">
    <div class="container-lg">
      <div class="row">
        <div class="col-12">
          <div class="card row card-blur p-3">
            <div class="col-12 input-group position-relative flex-nowrap" style="z-index: 999">
              <select class="ui search selection dropdown" id="search-select">
                <option> ss</option>
              </select>
            </div>
          </div>
        </div>
        <div class="col-12 mt-3">
          <div class="row">
            @if (isset($pharmacies))
              @foreach ($pharmacies as $pharmacy)
                <div class="col-lg-3">
                  <section class="card bg-secondary-light rounded-3 card--hover shadow">
                    <div class="d-flex flex-column justify-content-center align-items-center p-4">
                      <img src="images/1.png" width="50%" class="rounded-circle img-fluid" alt="pharmacy image">

                      <h3 class="fw-bold text-primary-dark mt-4">{{ $pharmacy->name }}</h3>

                      <p class="text-dark-100">
                        <span class="text-dark-50">
                          {{ $pharmacy->neighborhood->directorate->city->name }}
                        </span>
                        /
                        <span>{{ $pharmacy->neighborhood->name }}</span>
                      </p>
                    </div>

                    <a class="btn bg-secondary-dark rounded-button-3 fw-bold text-dark-50 p-3"
                      href="{{ route('pharmacies') }}">
                      أطلب دوائك
                    </a>
                  </section>

                  <section class="card bg-secondary-light rounded-3 card--hover shadow">


                  </section>
                </div>
              @endforeach
            @endif
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-lg mt-4">
      <div class="row">
        @if (isset($pharmacies))
          @foreach ($pharmacies as $pharmacy)
            <div class="col-lg-3 col-md-6 col-12 mb-4">
              <article class="card bg-secondary-light rounded-3 card--hover shadow"
                style="min-height: 272px;height: 272px;">
                <div class="d-flex flex-column justify-content-center align-items-center p-4"
                  style="min-height: 220px;height: 220px;">
                  <img src="images/1.png" width="50%" class="rounded-circle img-fluid" alt="">
                  <a href="{{ route('pharmacy', $pharmacy->id) }}"
                    class="fs-5 fw-bold text-primary-dark mt-4">{{ $pharmacy->name }}</a>
                  <p class="text-dark-100">
                    <span class="text-dark-50">
                      @if (isset($pharmacy->neighborhood->name))
                        {{ $pharmacy->neighborhood->name }} /
                    </span>
                    <span>{{ $pharmacy->neighborhood->directorate->name }}</span>
          @endif
          </p>
      </div>
      <a class="btn bg-secondary-dark rounded-botton-3 fw-bold text-dark-50 p-3" href="">أطلب دوائك</a>
      </article>
    </div>
    @endforeach
    @endif
    </div>
    </div>
    </div>
  </section>

@stop
