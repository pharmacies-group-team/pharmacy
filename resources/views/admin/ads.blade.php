@extends('layouts/dashboard/dashboard-mastre')
@section('content')

  <main class="content">
    <div class="container-fluid p-0">
      <div class="d-flex justify-content-between my-2">
        <h1 class="h3">نشر الأعلان</h1>

        <button type="button" class="btn btn-primary mt-n1 block" data-bs-toggle="modal" data-bs-target="#add">
          <i class="fas fa-plus"></i>
          اضافه اعلان
        </button>
      </div>

      <div class="card">
        <div class="card-body">
          <div id="datatables-fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
            <div class="row">
              <div class="col-sm-12" x-data=" { id: null, ad: {} }">
                <table id="datatables-multi" class="table-striped dataTable no-footer dtr-inline table"
                  style="width: 100%" aria-describedby="datatables-multi_info">
                  <thead>
                    <tr>
                      <th class="sorting sorting_desc" tabindex="0" aria-controls="datatables-multi" rowspan="1"
                        colspan="1" style="width: 147px" aria-label="Name: activate to sort column ascending"
                        aria-sort="descending">
                        الصورة
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                        style="width: 225px" aria-label="Position: activate to sort column ascending">
                        العنوان
                      </th>
                      <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                        style="width: 55px" aria-label="Office: activate to sort column ascending">
                        الرابط
                      </th>
                      {{-- <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                              rowspan="1" colspan="1" style="width: 55px"
                              aria-label="Office: activate to sort column ascending">
                              المكان
                          </th> --}}
                      <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                        style="width: 94px" aria-label="Age: activate to sort column ascending">
                        حذف
                      </th>
                    </tr>
                  </thead>
                  <tbody>
                    {{-- {{ dd($ads) }} --}}
                    @foreach ($ads as $ad)
                      <tr class="odd">
                        {{-- {{ dd($ad) }} --}}
                        <td>
                          <img :src="'{{ url('img/ads') }}/{{ $ad->icon }}'" {{-- alt="{{ $ad->image }}" src="{{ $ad->image }}" --}} name="image"
                            class="img-responsive img-fluid" />
                          <input type="hidden" name="image" value="{{ $ad->id }}" />
                        </td>

                        <td class="dtr-control sorting_1" tabindex="0">
                          {{ $ad->title }}

                        </td>
                        <td>{{ $ad->link }}</td>

                        <td>
                          <button type="button" @click="id = {{ $ad->id }}; ad = {{ $ad }}"
                            class="btn btn-success float-end m-1" data-bs-toggle="modal" data-bs-target="#update">
                            تعديل
                          </button>

                          <button type="button" @click="id = {{ $ad->id }};ad = {{ $ad }}"
                            class="btn btn-danger float-end m-1" data-bs-toggle="modal" data-bs-target="#delete">
                            حذف
                          </button>
                        </td>
                      </tr>
                    @endforeach

                  </tbody>
                </table>
                {{-- update ads modal --}}
                <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"> تعديل اعلان </h5>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body m-3">
                        <div class="row">
                          <div class="col-md-12">

                            <div class="row">
                              <div class="col-xs-12">
                                <form method="post" class="needs-validation" novalidate>
                                  @csrf
                                  @method('PUT')

                                  <input type="hidden" name="id" :value="id" />


                                  <div class="mb-3">
                                    <label class="form-label" for="ad-name-label">أسم
                                      الأعلان</label>
                                    <input id="ad-name-label" name="title" :value="ad.title" type="text"
                                      class="form-control @error('title') is-invalid @enderror"
                                      placeholder="أسم الاعلان" />
                                    @error('title')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label">تاريخ
                                      بدا الاعلان</label>
                                    <input type="text"
                                      class="form-control flatpickr-datetime flatpickr-input active @error('start_at') is-invalid @enderror"
                                      placeholder="حدد تاريخ البدأ" readonly="readonly" name="start_at"
                                      :value="ad.start_at">
                                    @error('start_at')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label">
                                      تاريخ نهاية الاعلان
                                    </label>

                                    <input type="text"
                                      class="form-control flatpickr-datetime flatpickr-input active @error('end_at') is-invalid @enderror"
                                      placeholder="حدد تاريخ الانتهاء" readonly="readonly" name="end_at"
                                      :value="ads.end_at">
                                    @error('end_at')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                  </div>


                                  <div class="mb-3">
                                    <label class="form-label">را'بط
                                      الموقع</label>
                                    <input type="text" name="link" :value="ad.link"
                                      class="form-control @error('link') is-invalid @enderror"
                                      placeholder="ادخل رابط الموقع" />
                                    @error('link')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">حفظ
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- update  ads model --}}

                {{-- add ads modal --}}
                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"> اضافة اعلان </h5>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body m-3">
                        <div class="row">
                          <div class="col-md-12">

                            <div class="row">
                              <div class="col-xs-12">
                                <form method="post" class="needs-validation" novalidate>
                                  @csrf
                                  <input type="hidden" name="id" :value="id" />

                                  <div class="mb-3">
                                    <label class="form-label" for="ad-name-label">أسم
                                      الأعلان</label>
                                    <input id="ad-name-label" name="title" :value="ad.title" type="text"
                                      class="form-control @error('title') is-invalid @enderror"
                                      placeholder="أسم الاعلان" />
                                    @error('title')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                  </div>
                                  <div class="mb-3">
                                    <label class="form-label">تاريخ
                                      بدا الاعلان</label>
                                    <input type="text"
                                      class="form-control flatpickr-datetime flatpickr-input active @error('start_at') is-invalid @enderror"
                                      placeholder="حدد تاريخ البدأ" readonly="readonly" name="start_at"
                                      :value="ad.start_at">
                                    @error('start_at')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label">تاريخ
                                      نهاية الاعلان</label>
                                    <input type="text"
                                      class="form-control flatpickr-datetime flatpickr-input active @error('end_at') is-invalid @enderror"
                                      placeholder="حدد تاريخ الانتهاء" readonly="readonly" name="end_at"
                                      :value="ads.end_at">
                                    @error('end_at')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror
                                  </div>

                                  <div class="mb-3">
                                    <label class="form-label">را'بط
                                      الموقع</label>
                                    <input type="text" name="link" :value="ad.link"
                                      class="form-control @error('link') is-invalid @enderror"
                                      placeholder="ادخل رابط الموقع" />
                                    @error('link')
                                      <span id="exampleInputEmail1-error"
                                        class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

                                  </div>
                                  <div class="modal-footer">
                                    <button type="button" class="btn btn-primary">حفظ
                                    </button>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- add  ads model --}}

                {{-- delete ad modal --}}
                <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title"> حذف الاعلان </h5>
                        <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                          aria-label="Close"></button>
                      </div>
                      <div class="modal-body m-3">
                        <form method="post" class="needs-validation" novalidate> @csrf
                          <input type="text" name="id" :value="id" />

                          {{-- <input type="hidden" name="id" :value="id" /> --}}
                          <div class="modal-footer">
                            <button type="button" class="btn btn-primary">حفظ
                            </button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
                {{-- delete ad model --}}
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>

@stop
