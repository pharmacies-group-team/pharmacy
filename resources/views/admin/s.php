@extends('layouts/dashboard/dashboard-mastre')
@section('content')

<main class="content">

    {{-- about us --}}
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">من نحن</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">من نحن</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{$homeData->aboutUs->id}}" />

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="mainTitle">العنوان الرئيسية</label>
                                    <input type="text" class="form-control @error(" {{ $homeData->aboutUs->title}}") is-invalid @enderror" id="mainTitle" name="title" placeholder="ادخل العنوان الرئيسي" value="{{ $homeData->aboutUs->title}}" />
                                    @error("{{ $homeData->aboutUs->title}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror
                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputLastName">العنوان الفرعي</label>
                                    <input type="text" class="form-control @error(" {{ $homeData->aboutUs->sub_title}}") is-invalid @enderror" id="inputLastName" name='sub_title' placeholder="ادخل العنوان الفرعي" value="{{$homeData->aboutUs->sub_title}}" />
                                    @error("{{ $homeData->aboutUs->sub_title}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="inputUsername">من نحن</label>
                                <textarea rows="2" class="form-control @error(" {{ $homeData->aboutUs->about}}") is-invalid @enderror" id="inputBio" name='about' placeholder="اخبرنا من انتم" spellcheck="false" value="{{$homeData->aboutUs->about}}"></textarea>
                                @error("{{ $homeData->aboutUs->about}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                            </div>
                            <button type="submit" class="btn btn-primary">
                                احفظ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- contact us --}}
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">تواصل معنا</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">تواصل معنا</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{$homeData->contactUs->id}}" />

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="mainTitle">العنوان الرئيسية</label>
                                    <input class="form-control @error(" {{ $homeData->contactUs->phone}}") is-invalid @enderror" name="title" value="{{ $homeData->contactUs->phone}}" type="tel" id="mainTitle" placeholder="ادخل رقم التلفون " />
                                    @error("{{ $homeData->contactUs->phone}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                                </div>
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputLastName">الايميل</label>
                                    <input type="email" name="email" class="form-control @error(" {{ $homeData->contactUs->email}}") is-invalid @enderror" value="{{ $homeData->contactUs->email}}" id="inputLastName" placeholder="ادخل الايميل" />
                                    @error("{{ $homeData->contactUs->email}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                احفظ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- social media managment --}}
    <div class="container-fluid p-0">
        <div class="mb-3">
            <h1 class="h3 d-inline align-middle"> وسائل التواصل الأجتماعي</h1>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title mb-0">وسائل التواصل الأجتماعي</h5>
                    </div>
                    <div class="card-body">
                        <form method="post" class="needs-validation" novalidate>
                            @csrf
                            <input type="hidden" name="id" value="{{$homeData->social->id}}" />

                            <div class="row">
                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="mainTitle">حساب الفيسبوك</label>
                                    <input class="form-control @error(" {{ $homeData->social->facebook}}") is-invalid @enderror" name="facebook" placeholder="رقم التلفون" value="{{ $homeData->social->facebook}}" type="url" id="mainTitle" placeholder="ادخل حساب الفيسبوك " />
                                    @error("{{ $homeData->social->facebook}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputLastName">حساب التويتر</label>
                                    <input type="url" name="twitter" class="form-control @error(" {{ $homeData->social->twitter}}") is-invalid @enderror" value="{{ $homeData->social->twitter}}" id="inputLastName" placeholder="ادخل حساب التويتر" />
                                    @error("{{ $homeData->social->twitter}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                                </div>

                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="mainTitle">حساب الواتس اب</label>
                                    <input class="form-control @error(" {{ $homeData->social->whatsapp}}") is-invalid @enderror" name="whatsapp" value="{{ $homeData->social->whatsapp}}" type="url" id="mainTitle" placeholder="ادخل حساب الواتس اب " />
                                    @error("{{ $homeData->social->whatsapp}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror
                                </div>


                                <div class="mb-3 col-md-6">
                                    <label class="form-label" for="inputLastName">حساب الانسقرام</label>
                                    <input type="url" name="instagram" class="form-control @error(" {{ $homeData->social->instagram}}") is-invalid @enderror" value="{{ $homeData->social->instagram}}" id="inputLastName" placeholder="ادخل حساب الانستقرام" />
                                    @error("{{ $homeData->social->instagram}}") <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                احفظ
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    {{-- services --}}









    {{-- models --}}


    {{-- start instagram modal --}}

    <div class="modal fade" id="instagram" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-md" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">الانستقرام</h5>
                    <button type="button" class="btn-close float-end" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body m-3">
                    <form method="post" class="needs-validation" novalidate>
                        @csrf

                        <div class="mb-3">
                            <label class="form-label" for="ad-name-label">رابط الانستقرام</label>
                            <input id="ad-name-label" name="instagram" value="{{ old('instagram') }}" type="url" class="form-control @error('instagram') is-invalid @enderror" placeholder="ادخل رابط الانستقرام" />
                            @error('instagram') <span id="exampleInputEmail1-error" class="error invalid-feedback">{{ $message }}</span> @enderror

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




</main>

@stop
























{{-- about us --}}
<div class="container-fluid p-0">
    <h1 class="h3 mb-3">من نحن</h1>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div id="datatables-fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table class="table " style="width: 100%">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1" style="width: 30%" aria-label="Name: activate to sort column ascending" aria-sort="descending">
                                                العنوان
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1" style="width: 50%" aria-label="Position: activate to sort column ascending">
                                                المحتوى
                                            </th>

                                            <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1" style="width: 20%" aria-label="Age: activate to sort column ascending">
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
                                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal" data-bs-target="#phone">
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
                                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal" data-bs-target="#email">
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
                                                <button type="button" class="btn btn-primary float-end mt-n1" data-bs-toggle="modal" data-bs-target="#phone">
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