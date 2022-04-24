@extends('layouts/dashboard/dashboard-mastre')
@section('content')

    <main class="content">

        <div class="container-fluid p-0">
            <div class="mb-3">
                <h1 class="h3 d-inline align-middle">نشر الأعلان</h1>
            </div>

            {{-- <div class="row">
                <div class="col-md-12">
                    <div class="card mb-4">
                        <div class="card-header"></div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-xs-12 col-md-8">
                                    @if (isset($ads))
                                        @@foreach ($ads as $ad)


                                            <form method="post" class="needs-validation" novalidate>
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $ads->id }}" />


                                                <div class="mb-3">
                                                    <label class="form-label" for="ad-name-label">أسم الأعلان</label>
                                                    <input id="ad-name-label" name="title"
                                                        value="{{ 'old($ads->title)' }}" type="text"
                                                        class="form-control @error("{{ 'old($ads->title)' }}") is-invalid @enderror"
                                                        placeholder="أسم الاعلان" />
                                                    @error("{{ 'old($ads->title)' }}")
                                                        <span id="exampleInputEmail1-error"
                                                            class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">تاريخ بدا الاعلان</label>
                                                    <input type="text"
                                                        class="form-control flatpickr-datetime flatpickr-input active @error("{{ 'old($ads->start_at)' }}") is-invalid @enderror"
                                                        placeholder="حدد تاريخ البدأ" readonly="readonly" name="start_at"
                                                        value="{{ 'old($ads->start_at)' }}">
                                                    @error("{{ 'old($ads->start_at)' }}")
                                                        <span id="exampleInputEmail1-error"
                                                            class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror

                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label">تاريخ نهاية الاعلان</label>
                                                    <input type="text"
                                                        class="form-control flatpickr-datetime flatpickr-input active @error("{{ 'old($ads->end_at)' }}") is-invalid @enderror"
                                                        placeholder="حدد تاريخ الانتهاء" readonly="readonly" name="end_at"
                                                        value="{{ 'old($ads->end_at)' }}">
                                                    @error("{{ 'old($ads->end_at)' }}")
                                                        <span id="exampleInputEmail1-error"
                                                            class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror

                                                </div>



                                                <div class="mb-3">
                                                    <label class="form-label">را'بط الموقع</label>
                                                    <input type="text" name="link" value="{{ 'old($ads->link)' }}"
                                                        class="form-control @error("{{ 'old($ads->link)' }}") is-invalid @enderror"
                                                        placeholder="ادخل رابط الموقع" />
                                                    @error("{{ 'old($ads->link)' }}")
                                                        <span id="exampleInputEmail1-error"
                                                            class="error invalid-feedback">{{ $message }}</span>
                                                    @enderror

                                                </div>

                                </div>
                                <div
                                    class="col-xs-12 col-md-4 -content-center d-flex align-items-center justify-content-center">
                                    <div class="text-center">

                                    



                                        <div class="mt-2">
                                            <span class="btn btn-primary"><i data-feather="upload"></i> تحميل</span>
                                        </div>


                                    </div>
                                    @error("{{ 'old($ads->image)' }}")
                                        <span id="exampleInputEmail1-error"
                                            class="error invalid-feedback">"{{ 'old($ads->image)' }}"</span>
                                    @enderror


                                </div>
                            </div>

                            <button class="btn btn-primary" id="notyf-show" type="submit">
                                عرض الأعلان
                            </button>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div> --}}

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="datatables-fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <table id="datatables-multi"
                                            class="table table-striped dataTable no-footer dtr-inline" style="width: 100%"
                                            aria-describedby="datatables-multi_info">
                                            <thead>
                                                <tr>
                                                    <th class="sorting sorting_desc" tabindex="0"
                                                        aria-controls="datatables-multi" rowspan="1" colspan="1"
                                                        style="width: 147px"
                                                        aria-label="Name: activate to sort column ascending"
                                                        aria-sort="descending">
                                                        الصورة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 225px"
                                                        aria-label="Position: activate to sort column ascending">
                                                        العنوان
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 55px"
                                                        aria-label="Office: activate to sort column ascending">
                                                        الرابط
                                                    </th>
                                                    {{-- <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 55px"
                                                        aria-label="Office: activate to sort column ascending">
                                                        المكان
                                                    </th> --}}
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 94px"
                                                        aria-label="Age: activate to sort column ascending">
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
                                                            <img alt="{{ $ad->image }}" src="{{ $ad->image }}"
                                                                name="image" class="img-responsive img-fluid " />

                                                            <input type="hidden" name="image" value="{{ $ad->id }}" />

                                                        </td>


                                                        <td class="dtr-control sorting_1" tabindex="0">
                                                            {{ $ad->title }}

                                                        </td>
                                                        <td>{{ $ad->link }}</td>


                                                        <td>
                                                            <span>
                                                                <a href="{{ route('admin.ads.destroy', $ad->id) }}"
                                                                    class="btn btn-danger btn-sm">
                                                                    حذف
                                                                </a>
                                                            </span>
                                                        </td>
                                                    </tr>
                                                @endforeach


                                            </tbody>
                                        </table>
                                        {{-- delete service modal --}}
                                        <div class="modal fade" id="delete" tabindex="-1" role="dialog"
                                            aria-hidden="true">
                                            <div class="modal-dialog modal-md" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title"> حذف الخدمة </h5>
                                                        <button type="button" class="btn-close float-end"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body m-3">
                                                        <form method="post" class="needs-validation" novalidate> @csrf
                                                            <input type="hidden" name="id" :value="id" />

                                                            <div class="row">
                                                                <div class="mb-3 col-md-6">

                                                                </div>

                                                            </div>


                                                            <button type="submit" class="btn btn-primary">
                                                                حذف
                                                            </button>
                                                        </form>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-primary">حفظ
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">اغلاق</button>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- delete service model --}}



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

@stop
