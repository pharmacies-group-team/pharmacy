@extends('layouts/dashboard/dashboard-mastre')
@section('content')
  
<main class="content">
    <div class="container-fluid p-0">
      <div class="mb-3">
        <h1 class="h3 d-inline align-middle">نشر الأعلان</h1>
      </div>

      <div class="row">
        <div class="col-md-12">
          <div class="card mb-4">
            <div class="card-header"></div>
            <div class="card-body">
              <div class="row">
                <div class="col-xs-12 col-md-8">
                  <div class="mb-3">
                    <label class="form-label" for="notyf-message"
                      >أسم الأعلان</label
                    >
                    <input
                      id="notyf-message"
                      name="notyf-message"
                      type="text"
                      class="form-control"
                      placeholder="أسم الاعلان"
                    />
                  </div>

                  <div class="mb-3">
                    <label class="form-label">تاريخ الأعلان</label>
                    <input
                      type="text"
                      class="form-control flatpickr-range flatpickr-input"
                      placeholder="حد التاريخ.."
                      readonly="readonly"
                    />
                  </div>

                  <div class="mb-3">
                    <label class="form-label">رابط الموقع</label>
                    <input
                      type="email"
                      class="form-control"
                      data-inputmask="'alias': 'email'"
                      placeholder="ادخل رابط الموقع"
                      inputmode="email"
                    />
                  </div>
                </div>
                <div
                  class="col-xs-12 col-md-4 -content-center d-flex align-items-center justify-content-center"
                >
                  <div class="text-center">
                    <img
                      alt="Charles Hall"
                      src="img/photos/unsplash-1.jpg"
                      class="img-responsive img-fluid mt-2"
                    />
                    <div class="mt-2">
                      <span class="btn btn-primary"
                        ><i data-feather="upload"></i> تحميل</span
                      >
                    </div>
                    
                   
                  </div>
               
                </div>
              </div>

              <button class="btn btn-primary" id="notyf-show">
                عرض الأعلان
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@stop
