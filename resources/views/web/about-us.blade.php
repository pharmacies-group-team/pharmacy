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
                        <x-icon icon='search' />
                    </span>
                    <h4 class="my-3">معرفه</h4>
                    <p class="text-muted">نقوم بمعرفة احتي جاتك من الصحية</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        {{-- <i class="fas fa-circle fa-stack-2x text-primary"></i>
                        <i class="fas fa-laptop fa-stack-1x fa-inverse"></i> --}}
                        <x-icon icon='payment' />
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
            <!-- Portfolio Grid-->
            <section class="page-section bg-light" id="portfolio">
              <div class="container">
                  <div class="text-center">
                      <h2 class="section-heading text-uppercase">Portfolio</h2>
                      <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                  </div>
                  <div class="row">
                      <div class="col-lg-4 col-sm-6 mb-4">
                          <!-- Portfolio item 1-->
                          <div class="portfolio-item">
                              <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal1">
                                  <div class="portfolio-hover">
                                      <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                  </div>
                                  <img class="img-fluid" src="{{ asset('img/about/home1.jpg') }}" alt="..." />
                              </a>
                              <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading">Threads</div>
                                  <div class="portfolio-caption-subheading text-muted">Illustration</div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-6 mb-4">
                          <!-- Portfolio item 2-->
                          <div class="portfolio-item">
                              <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal2">
                                  <div class="portfolio-hover">
                                      <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                  </div>
                                  <img class="img-fluid" src="{{ asset('img/about/home1.jpg') }}" alt="..." />
                              </a>
                              <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading">Explore</div>
                                  <div class="portfolio-caption-subheading text-muted">Graphic Design</div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-6 mb-4">
                          <!-- Portfolio item 3-->
                          <div class="portfolio-item">
                              <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal3">
                                  <div class="portfolio-hover">
                                      <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                  </div>
                                  < class="img-fluid" src="{{ asset('img/about/home1.jpg') }}" alt="..." />
                              </a>
                              <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading">Finish</div>
                                  <div class="portfolio-caption-subheading text-muted">Identity</div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-6 mb-4 mb-lg-0">
                          <!-- Portfolio item 4-->
                          <div class="portfolio-item">
                              <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal4">
                                  <div class="portfolio-hover">
                                      <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                  </div>
                                  <img class="img-fluid" src={{ asset('img/about/home1.jpg') }}" alt="..." />
                              </a>
                              <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading">Lines</div>
                                  <div class="portfolio-caption-subheading text-muted">Branding</div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-6 mb-4 mb-sm-0">
                          <!-- Portfolio item 5-->
                          <div class="portfolio-item">
                              <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal5">
                                  <div class="portfolio-hover">
                                      <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                  </div>
                                  <img class="img-fluid" src="{{ asset('img/about/home1.jpg') }}" alt="..." />
                              </a>
                              <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading">Southwest</div>
                                  <div class="portfolio-caption-subheading text-muted">Website Design</div>
                              </div>
                          </div>
                      </div>
                      <div class="col-lg-4 col-sm-6">
                          <!-- Portfolio item 6-->
                          <div class="portfolio-item">
                              <a class="portfolio-link" data-bs-toggle="modal" href="#portfolioModal6">
                                  <div class="portfolio-hover">
                                      <div class="portfolio-hover-content"><i class="fas fa-plus fa-3x"></i></div>
                                  </div>
                                  <img class="img-fluid" src="{{ asset('img/about/home1.jpg') }}" alt="..." />
                              </a>
                              <div class="portfolio-caption">
                                  <div class="portfolio-caption-heading">Window</div>
                                  <div class="portfolio-caption-subheading text-muted">Photography</div>
                              </div>
                          </div>
                      </div>
                  </div>
              </div>
          </section>
          <!-- About-->
@endsection
