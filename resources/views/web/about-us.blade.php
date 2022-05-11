@extends('layouts.web.master')

@section('title') About US @stop

@section('content')

  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="{{ asset('img/about/mid2.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/about/drivly.jpg') }}" class="d-block w-100" alt="...">
      </div>
      <div class="carousel-item">
        <img src="{{ asset('img/about/home1.jpg') }}" class="d-block w-100" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
     <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
<header class="masthead carousel-caption">
  <div class="container">
      <div class="masthead-subheading">مرحبن بك !</div>
      <div class="masthead-heading text-uppercase"> صحتكم تهمنا  </div>
      <a class="btn btn-primary btn-xl text-uppercase" href="#services">تعرف اكثر</a>
  </div>
</header>
        <div class="container my-5">
          <h1 class="text-primary-darker fw-bold fs-3" >عن منصة صيدليه اون لين</h1>
          <p class="text-primary-dark mt-4">
            هدفنا تسهيل عملية شراء الدواء كما نسعى الى توفير الأدوية النادرة لطالبيها
              و تعريف الصيدلية الأدوية التي يجب توفيرها
            وتوفير أدوية بشكل دوري لأصحاب الأمراض  المزمنة
          </p>
        </div>
        <!-- Services-->
        <section class="page-section my-5" id="services">
        <div class="container ">
            <div class="text-center my-5">
                <h2 class="section-heading text-uppercase text-primary-darker fw-bold fs-3">خدماتناء</h2>
                <h3 class="section-subheading text-muted text-primary-dark mt-4">تمثل خدمتنا في ايصال الدواء</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        {{-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i> --}}
                        <x-icon icon='location' />
                    </span>
                    <h4 class="my-3 text-primary-dark mt-4">معرفه</h4>
                    <p class="text-muted">نقوم بمعرفة احتي جاتك من الصحية</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        {{-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i> --}}
                        <x-icon icon='location' />
                    </span>
                    <h4 class="my-3">توفير</h4>
                    <p class="text-muted">بعد معرفة إحتياجاتك نقوم تبوفيره لك</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        {{-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-lock fa-stack-1x fa-inverse"></i> --}}
                        <x-icon icon='location' />
                    </span>
                    <h4 class="my-3">إيصال</h4>
                    <p class="text-muted">نقوم بتوفير العناء وأيصالها الى المنزل</p>
                </div>
            </div>
        </div>
    </section>

@endsection
