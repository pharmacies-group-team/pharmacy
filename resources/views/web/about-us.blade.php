@extends('layouts.web.master')

@section('title') About US @stop

@section('content')
  {{-- <!-- Navigation--> --}}


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
        <!-- Services-->
        <section class="page-section" id="services">
        <div class="container">
            <div class="text-center">
                <h2 class="section-heading text-uppercase">خدماتناء</h2>
                <h3 class="section-subheading text-muted">تمثل خدمتنا في ايصال الدواء</h3>
            </div>
            <div class="row text-center">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        {{-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></i> --}}
                        <x-icon icon='location' />
                    </span>
                    <h4 class="my-3">معرفه</h4>
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
                <!-- About-->
                <section class="page-section" id="about">
                    <div class="container">
                        <div class="text-center">
                            <h2 class="section-heading text-uppercase">About</h2>
                            <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                        </div>
                        <ul class="timeline">
                            <li>
                                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/1.jpg" alt="..." /></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>2009-2011</h4>
                                        <h4 class="subheading">Our Humble Beginnings</h4>
                                    </div>
                                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/2.jpg" alt="..." /></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>March 2011</h4>
                                        <h4 class="subheading">An Agency is Born</h4>
                                    </div>
                                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                                </div>
                            </li>
                            <li>
                                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/3.jpg" alt="..." /></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>December 2015</h4>
                                        <h4 class="subheading">Transition to Full Service</h4>
                                    </div>
                                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image"><img class="rounded-circle img-fluid" src="assets/img/about/4.jpg" alt="..." /></div>
                                <div class="timeline-panel">
                                    <div class="timeline-heading">
                                        <h4>July 2020</h4>
                                        <h4 class="subheading">Phase Two Expansion</h4>
                                    </div>
                                    <div class="timeline-body"><p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt ut voluptatum eius sapiente, totam reiciendis temporibus qui quibusdam, recusandae sit vero unde, sed, incidunt et ea quo dolore laudantium consectetur!</p></div>
                                </div>
                            </li>
                            <li class="timeline-inverted">
                                <div class="timeline-image">
                                    <h4>
                                        Be Part
                                        <br />
                                        Of Our
                                        <br />
                                        Story!
                                    </h4>
                                </div>
                            </li>
                        </ul>
                    </div>
                </section>
@endsection
