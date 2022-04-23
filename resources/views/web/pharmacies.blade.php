@extends('layouts.web.master')

@section('title') Pharmacies @stop

@section('content')

  <section class="position-sticky" style="z-index: 999999999; top: 10%">
    <div class="container-lg">
      <div class="row">
        <div class="col-12">
          <div class="card card-blur p-3 d-flex flex-row justify-content-start ">
            <div class="input-group flex-nowrap position-relative" style="z-index: 999">
              <select class="ui search selection dropdown search-select" id="search-select">
                <option> المدينة</option>
              </select>
            </div>
            <div class="input-group flex-nowrap position-relative" style="z-index: 999">
              <select class="ui search selection dropdown search-select" id="search-select">
                <option> المديرية</option>
              </select>
            </div>
            <div class="input-group flex-nowrap position-relative" style="z-index: 999">
              <select class="ui search selection dropdown search-select" id="search-select">
                <option> الحي</option>
              </select>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section>
    <div class="container-lg mt-2">
      <div class="row">
        <div class="col-lg-3 col-md-6 col-12 mb-4">
          <article class="card shadow bg-secondary-light rounded-3 card--hover">
            <div class="d-flex p-4 flex-column justify-content-center align-items-center">
              <img src="images/1.png" width="50%" class="rounded-circle img-fluid" alt="">
              <h1 class="fs-5 fw-bold text-primary-dark mt-4">اسم الصيدلية</h1>
              <p class="text-dark-100">
                <span class="text-dark-50">اسم المدينه /</span>
                <span>اسم المديرية</span>
              </p>
            </div>
            <a class="btn bg-secondary-dark rounded-botton-3 p-3 fw-bold text-dark-50" href="">أطلب دوائك</a>
          </article>
        </div>
      </div>
      </div>
    </div>
  </section>

@stop
