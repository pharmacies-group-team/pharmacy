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
                  <form method="post" class="needs-validation" novalidate>
                    @csrf

                    <div class="mb-3">
                      <label class="form-label" for="ad-name-label">أسم الأعلان</label>
                      <input id="ad-name-label" name="title" value="{{ old('title') }}" type="text"
                                        class="form-control @error('title') is-invalid @enderror"
                                        placeholder="أسم الاعلان" />
                      @error('title') <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span> @enderror

                  </div>

                  <div class="mb-3">
                    <label class="form-label">تاريخ بدا الاعلان</label>
                    <input type="text" class="form-control flatpickr-datetime flatpickr-input active @error('start_at') is-invalid @enderror"  placeholder="حدد تاريخ البدأ" readonly="readonly" name="start_at" value="{{ old('start_at') }}" >
                    @error('start_at') <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                  </div>

                  <div class="mb-3">
                    <label class="form-label">تاريخ نهاية الاعلان</label>
                    <input type="text" class="form-control flatpickr-datetime flatpickr-input active @error('end_at') is-invalid @enderror"  placeholder="حدد تاريخ الانتهاء" readonly="readonly" name="end_at" value="{{ old('end_at') }}" >
                    @error('end_at') <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                  </div>

                  

                  <div class="mb-3">
                    <label class="form-label">رابط الموقع</label>
                    <input type="text" name="link" value="{{ old('link') }}"
                                    class="form-control @error('start_at') is-invalid @enderror"
                                    placeholder="ادخل رابط الموقع" />
                    @error('link') <span id="exampleInputEmail1-error"
                                    class="error invalid-feedback">{{ $message }}</span> @enderror

                  </div>
                  <input type="hidden" name="id" value="{{ old('id') }}" />

                </div>
                <div
                  class="col-xs-12 col-md-4 -content-center d-flex align-items-center justify-content-center"
                >
                  <div class="text-center">
                    <img
                      alt="Charles Hall"
                      src="{{ old('link') }}"
                      name="image"
                      class="img-responsive img-fluid mt-2 @error('start_at') is-invalid @enderror"
                    />
                    <div class="mt-2">
                      <span class="btn btn-primary"
                        ><i data-feather="upload"></i> تحميل</span
                      >
                    </div>
                    
                   
                  </div>
                  @error('image') <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

               
                </div>
              </div>

              <button class="btn btn-primary" id="notyf-show" type="submit">
                عرض الأعلان
              </button>
            </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@stop
