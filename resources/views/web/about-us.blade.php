@extends('layouts.web.master')

@section('title') about us @endsection

@section('content')

  <main>
    <div class="container my-5">
      <h1 class="text-primary-darker fw-bold fs-3">عن منصة صيدليه اون لين</h1>
      <p class="text-primary-dark mt-4">
        هدفنا تسهيل عملية شراء الدواء كما نسعى الى توفير الأدوية النادرة لطالبيها
        و تعريف الصيدلية الأدوية التي يجب توفيرها
        وتوفير أدوية بشكل دوري لأصحاب الأمراض المزمنة
      </p>
    </div>
    <!-- Services-->
    <section class="page-section my-5" id="services">
      <div class="container">
        <div class="my-5 text-center">
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
            <h4 class="text-primary-dark my-3 mt-4">معرفه</h4>
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
  </main>

@stop
