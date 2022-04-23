@extends('layouts/dashboard/dashboard-mastre')
@section('content')
    
    <main class="content">

          {{-- about us --}}
          <div class="container-fluid p-0">
            <h1 class="h3 mb-3">من نحن</h1>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div
                      id="datatables-fixed-header_wrapper"
                      class="dataTables_wrapper dt-bootstrap5 no-footer"
                    >
                      <div class="row">
                        <div class="col-sm-12">
                          <table
                           
                            class="table "
                            style="width: 100%"
                          >
                            <thead>
                              <tr>
                                <th
                                  class="sorting sorting_desc"
                                  tabindex="0"
                                  aria-controls="datatables-multi"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 30%"
                                  aria-label="Name: activate to sort column ascending"
                                  aria-sort="descending"
                                >
                                  العنوان
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="datatables-multi"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 50%"
                                  aria-label="Position: activate to sort column ascending"
                                >
                                  المحتوى
                                </th>
                                
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="datatables-multi"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 20%"
                                  aria-label="Age: activate to sort column ascending"
                                >
                                  التعديل والاضافة
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">
                                    العنوان
                                </td>
                                <td>pharmacy</td>
                               
                                <td>
                                    <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                    data-bs-target="#phone">
                                    <i class="fas fa-plus"></i> اضافه وتعديل
                                </button>
                                </td>
                              </tr>
                              <tr class="even">
                                <td class="dtr-control sorting_1" tabindex="0">
                                    العنوان الفرعي
                                </td>
                                <td>sub title</td>
                                
                                <td>
                                    <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                    data-bs-target="#email">
                                    <i class="fas fa-plus"></i> اضافه وتعديل
                                </button>
                                </td>
                              </tr>

                              <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">
                                    العنوان
                                </td>
                                <td>pharmacy</td>
                               
                                <td>
                                    <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                    data-bs-target="#phone">
                                    <i class="fas fa-plus"></i> اضافه وتعديل
                                </button>
                                </td>
                              </tr>
                              
                             
    
                             
                            </tbody>
                          </table>
    
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        

      

        {{-- contact us --}}
        <div class="container-fluid p-0">
            <h1 class="h3 mb-3">تواصل معنا</h1>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div
                      id="datatables-fixed-header_wrapper"
                      class="dataTables_wrapper dt-bootstrap5 no-footer"
                    >
                      <div class="row">
                        <div class="col-sm-12">
                          <table
                           
                            class="table "
                            style="width: 100%"
                          >
                            <thead>
                              <tr>
                                <th
                                  class="sorting sorting_desc"
                                  tabindex="0"
                                  aria-controls="datatables-multi"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 30%"
                                  aria-label="Name: activate to sort column ascending"
                                  aria-sort="descending"
                                >
                                  العنوان
                                </th>
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="datatables-multi"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 50%"
                                  aria-label="Position: activate to sort column ascending"
                                >
                                  المحتوى
                                </th>
                                
                                <th
                                  class="sorting"
                                  tabindex="0"
                                  aria-controls="datatables-multi"
                                  rowspan="1"
                                  colspan="1"
                                  style="width: 20%"
                                  aria-label="Age: activate to sort column ascending"
                                >
                                  التعديل والاضافة
                                </th>
                              </tr>
                            </thead>
                            <tbody>
                              <tr class="odd">
                                <td class="dtr-control sorting_1" tabindex="0">
                                    رقم التلفون
                                </td>
                                <td>777777777</td>
                               
                                <td>
                                    <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                    data-bs-target="#phone">
                                    <i class="fas fa-plus"></i> اضافه وتعديل
                                </button>
                                </td>
                              </tr>
                              <tr class="even">
                                <td class="dtr-control sorting_1" tabindex="0">
                                    الايميل
                                </td>
                                <td>myemail.gmail.com</td>
                                
                                <td>
                                    <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                    data-bs-target="#email">
                                    <i class="fas fa-plus"></i> اضافه وتعديل
                                </button>
                                </td>
                              </tr>
                              
                             
    
                             
                            </tbody>
                          </table>
    
                         
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        

        {{-- social media managment --}}
      <div class="container-fluid p-0">
        <h1 class="h3 mb-3">وسائل التواصل الأجتماعي </h1>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div
                  id="datatables-fixed-header_wrapper"
                  class="dataTables_wrapper dt-bootstrap5 no-footer"
                >
                  <div class="row">
                    <div class="col-sm-12">
                      <table
                       
                        class="table "
                        style="width: 100%"
                      >
                        <thead>
                          <tr>
                            <th
                              class="sorting sorting_desc"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 30%"
                              aria-label="Name: activate to sort column ascending"
                              aria-sort="descending"
                            >
                              اسم الموقع
                            </th>
                            <th
                              class="sorting"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 50%"
                              aria-label="Position: activate to sort column ascending"
                            >
                              الرابط
                            </th>
                            
                            <th
                              class="sorting"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 20%"
                              aria-label="Age: activate to sort column ascending"
                            >
                              التعديل والاضافة
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">
                                Facebook
                            </td>
                            <td>facebook.com</td>
                           
                            <td>
                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                data-bs-target="#facebook">
                                <i class="fas fa-plus"></i> اضافه وتعديل
                            </button>
                            </td>
                          </tr>
                          <tr class="even">
                            <td class="dtr-control sorting_1" tabindex="0">
                                whatsapp
                            </td>
                            <td>whatsapp.com</td>
                            
                            <td>
                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                data-bs-target="#whatsapp">
                                <i class="fas fa-plus"></i> اضافه وتعديل
                            </button>
                            </td>
                          </tr>
                          <tr class="odd">
                            <td class="dtr-control sorting_1" tabindex="0">
                                twitter
                            </td>
                            <td>twitter.com</td>
                            
                            <td>
                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                data-bs-target="#twitter">
                                <i class="fas fa-plus"></i> اضافه وتعديل
                            </button>
                            </td>
                          </tr>
                          <tr class="even ">
                            <td class="dtr-control sorting_1" tabindex="0">
                                instagram
                            </td>
                            <td>instagram.com</td>
                           
                            <td>
                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal"
                                data-bs-target="#instagram">
                                <i class="fas fa-plus"></i> اضافه وتعديل
                            </button>
                            </td>
                          </tr>
                         

                         
                        </tbody>
                      </table>

                     
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>


      {{-- models --}}

       {{-- start facebook modal --}}
        
       <div class="modal fade" id="facebook" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">الفيسبوك</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رابط الفيسبوك</label>
                            <input id="ad-name-label" name="facebook" value="{{ old('facebook') }}" type="url"
                                class="form-control @error('facebook') is-invalid @enderror"
                                placeholder="ادخل رابط الفيسبوك" />
                            @error('title') <span id="exampleInputEmail1-error"
                                class="error invalid-feedback">{{ $message }}</span> @enderror

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">حفظ </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </div>
    </div>
    {{-- end facebook modal --}}

     {{-- start instagram modal --}}

     <div class="modal fade" id="instagram" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">الانستقرام</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رابط الانستقرام</label>
                            <input id="ad-name-label" name="instagram" value="{{ old('instagram') }}" type="url"
                                class="form-control @error('instagram') is-invalid @enderror"
                                placeholder="ادخل رابط الانستقرام" />
                            @error('instagram') <span id="exampleInputEmail1-error"
                                class="error invalid-feedback">{{ $message }}</span> @enderror

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">حفظ </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </div>
    </div>
    {{-- end instagram modal --}}

     {{-- start twitteer modal --}}

     <div class="modal fade" id="twitter" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">التويتر</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رابط التويتر</label>
                            <input id="ad-name-label" name="twitter" value="{{ old('twitter') }}" type="url"
                                class="form-control @error('twitter') is-invalid @enderror"
                                placeholder="ادخل رابط التويتر" />
                            @error('twitter') <span id="exampleInputEmail1-error"
                                class="error invalid-feedback">{{ $message }}</span> @enderror

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">حفظ </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </div>
    </div>
    {{-- end twitter modal --}}

     {{-- start whatsapp modal --}}

     <div class="modal fade" id="whatsapp" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">الواتس اب</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رابط الواتس اب</label>
                            <input id="ad-name-label" name="whatsapp" value="{{ old('whatsapp') }}" type="url"
                                class="form-control @error('whatsapp') is-invalid @enderror"
                                placeholder="ادخل رابط الواتس اب" />
                            @error('whatsapp') <span id="exampleInputEmail1-error"
                                class="error invalid-feedback">{{ $message }}</span> @enderror

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">حفظ </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </div>
    </div>
    {{-- end whatsapp modal --}}


    {{-- start email modal --}}

    <div class="modal fade" id="email" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">الايميل</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رابط الايميل</label>
                            <input id="ad-name-label" name="email" value="{{ old('email') }}" type="url"
                                class="form-control @error('email') is-invalid @enderror"
                                placeholder="ادخل رابط الايميل" />
                            @error('email') <span id="exampleInputEmail1-error"
                                class="error invalid-feedback">{{ $message }}</span> @enderror

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">حفظ </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </div>
    </div>
    {{-- end email modal --}}



    {{-- start phone modal --}}

    <div class="modal fade" id="phone" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">رقم الهاتف</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رقم الهاتف</label>
                            <input id="ad-name-label" name="phone" value="{{ old('phone') }}" type="url"
                                class="form-control @error('phone') is-invalid @enderror"
                                placeholder="ادخل الهاتف " />
                            @error('phone') <span id="exampleInputEmail1-error"
                                class="error invalid-feedback">{{ $message }}</span> @enderror

                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary">حفظ </button>
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                </div>
            </div>
        </div>
    </div>
    {{-- end phone modal --}}
    </main>

@stop
