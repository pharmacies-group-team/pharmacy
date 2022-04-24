@extends('layouts/dashboard/dashboard-mastre')
@section('content')

    <main class="content">
        {{-- {{ dd($homeData['services']) }} --}}
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
                            <form method="post" action="{{ route('admin.updateAboutUs') }}" class="needs-validation"
                                novalidate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $aboutUs->id }}" />

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="mainTitle">العنوان الرئيسية</label>
                                        <input type="text" class="form-control @error('title') is-invalid @enderror"
                                            id="mainTitle" name="title" placeholder="ادخل العنوان الرئيسي"
                                            value="{{ $aboutUs->title }}" />
                                        @error('title')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">العنوان الفرعي</label>
                                        <input type="text" class="form-control @error('sub_title') is-invalid @enderror"
                                            id="inputLastName" name='sub_title' placeholder="ادخل العنوان الفرعي"
                                            value="{{ $aboutUs->sub_title }}" />
                                        @error('sub_title')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label" for="inputUsername">من نحن</label>
                                    <textarea rows="2" class="form-control @error('about') is-invalid @enderror" id="inputBio" name='about'
                                        placeholder="اخبرنا من انتم" spellcheck="false"
                                        value="{{ $aboutUs->about }}"></textarea>
                                    @error('about')
                                        <span id="exampleInputEmail1-error"
                                            class="error invalid-feedback">{{ $message }}</span>
                                    @enderror

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
                            <form method="post" action="{{ route('admin.updateContactUs') }}" class="needs-validation"
                                novalidate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $contactUs->id }}" />

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label @error('phone') is-invalid @enderror"
                                            for="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        mainTitle">
                                            رقم
                                            التلفون</label>
                                        <input class="form-control" name="phone" value="{{ $contactUs->phone }}"
                                            type="tel" id="mainTitle" placeholder="ادخل رقم التلفون " />
                                        @error('phone')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror


                                    </div>
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">الايميل</label>
                                        <input type="email" name="email"
                                            class="form-control @error('email') is-invalid @enderror"
                                            for="
                                                                                                                                                                                                                                                                                                                                                                                                                                                                    mainTitle"
                                            value=" {{ $contactUs->email }}" id="inputLastName"
                                            placeholder="ادخل الايميل" />

                                        @error('email')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror


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
                            <form method="post" action="{{ route('admin.updateSocial') }}" class="needs-validation"
                                novalidate>
                                @csrf
                                @method('put')
                                <input type="hidden" name="id" value="{{ $social->id }}" />

                                <div class="row">
                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="mainTitle">حساب الفيسبوك</label>
                                        <input class="form-control @error('facebook') is-invalid @enderror" name="facebook"
                                            placeholder="رقم التلفون" value="{{ $social->facebook }}" type="url"
                                            id="mainTitle" placeholder="ادخل حساب الفيسبوك " />
                                        @error('facebook')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">حساب التويتر</label>
                                        <input type="url" name="twitter"
                                            class="form-control @error('twitter') is-invalid @enderror"
                                            value="{{ $social->twitter }}" id="inputLastName"
                                            placeholder="ادخل حساب التويتر" />
                                        @error('twitter')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>

                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="mainTitle">حساب الواتس اب</label>
                                        <input class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
                                            value="{{ $social->whatsapp }}" type="url" id="mainTitle"
                                            placeholder="ادخل حساب الواتس اب " />
                                        @error('whatsapp')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror
                                    </div>


                                    <div class="mb-3 col-md-6">
                                        <label class="form-label" for="inputLastName">حساب الانستقرام</label>
                                        <input type="url" name="instagram"
                                            class="form-control @error('instagram') is-invalid @enderror"
                                            value="{{ $social->instagram }}" id="inputLastName"
                                            placeholder="ادخل حساب الانستقرام" />
                                        @error('instagram')
                                            <span id="exampleInputEmail1-error"
                                                class="error invalid-feedback">{{ $message }}</span>
                                        @enderror

                                    </div>
                                </div>

                                <button type="submit" class="btn btn-primary">
                                    احفظ
                                </button>
                            </form>
                        </div>
                        {{-- @endif --}}

                    </div>
                </div>
            </div>
        </div>


        {{-- services --}}

        <div class="container-fluid p-0" x-data="{ id: null, service: {} }">
            <h1 class="h3 mb-3">خدماتنا </h1>
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
                                                    <th class="sorting sorting_desc" tabindex="0"
                                                        aria-controls="datatables-multi" rowspan="1" colspan="1"
                                                        style="width: 10%"
                                                        aria-label="Name: activate to sort column ascending"
                                                        aria-sort="descending">
                                                        الايقونة
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 10%"
                                                        aria-label="Position: activate to sort column ascending">
                                                        الاسم
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 50%"
                                                        aria-label="Age: activate to sort column ascending">
                                                        الوصف
                                                    </th>

                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 30%"
                                                        aria-label="Age: activate to sort column ascending">
                                                        التعديل والحذف
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($services)
                                                    @foreach ($services as $service)
                                                        <tr class="odd">
                                                            <input type="hidden" name="id" value="{{ $service->id }}" />

                                                            <td>
                                                                <img :src="'{{ url('img/services') }}/{{ $service->icon }}'"
                                                                    name=" image"
                                                                    class="img-responsive img-fluid mt-2 @error('icon') is-invalid @enderror" />
                                                                @error('icon')
                                                                    <span id="exampleInputEmail1-error"
                                                                        class="error invalid-feedback">{{ $message }}</span>
                                                                @enderror
                                                            </td>

                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $service->name }}
                                                            </td>
                                                            <td>{{ $service->desc }}</td>

                                                            <td>
                                                                <button type="button"
                                                                    @click="id = {{ $service->id }}; service = {{ $service }}"
                                                                    class="btn btn-success float-end  m-1"
                                                                    data-bs-toggle="modal" data-bs-target="#modify">
                                                                    تعديل
                                                                </button>
                                                                {{-- <a href="{{ route('admin.site.destroy', $service->id) }}"
                                                                    class="btn btn-danger btn-sm">
                                                                    حذف
                                                                </a> --}}

                                                                <button type="button"
                                                                    @click="id = {{ $service->id }};service = {{ $service }}"
                                                                    class="btn btn-danger float-end  m-1"
                                                                    data-bs-toggle="modal" data-bs-target="#delete">
                                                                    حذف
                                                                </button>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>



                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- update service modal --}}
            <div class="modal fade" id="modify" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> تعديل الخدمات </h5>
                            <button type="button" class="btn-close float-end" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body m-3">
                            <form method="post" class="needs-validation" novalidate
                                :action="'{{ url('admin/site/services') }}/'+id">
                                @method('PUT')

                                @csrf
                                <input type="hidden" name="id" :value="id" />

                                <div class="row">
                                    <div class="col-9">
                                        <div class="mb-3 ">
                                            <label class="form-label" for="mainTitle">اسم الخدمة</label>
                                            <input type="text" class="form-control" id="mainTitle" name="name"
                                                placeholder="ادخل اسم الخدمة" :value="service.name" />
                                        </div>
                                        <div class="mb-3 ">
                                            <label class="form-label" for="inputUsername">الوصف</label>
                                            <textarea rows="2" class="form-control" name='desc' placeholder="ادخل الوصف" spellcheck="false"
                                                :value="service.desc"></textarea>
                                        </div>
                                    </div>

                                    <div class="col-3 d-flex align-items-center justify-center">
                                        <div>
                                            <img :src="'{{ url('img/services') }}/'+service.icon" name=" image"
                                                class="img-responsive img-fluid mt-2 @error('icon') is-invalid @enderror" />
                                            {{-- <div class="custom-file">
                                                <input type="image" class="custom-file-input" id="customFile" value="">
                                                <label class="custom-file-label" for="customFile">تحميل</label>
                                            </div> --}}
                                            <div class="mt-2">

                                                <span class="btn btn-primary"><i data-feather="upload"></i> تحميل</span>
                                            </div>
                                            @error('icon')
                                                <span id="exampleInputEmail1-error"
                                                    class="error invalid-feedback">{{ $message }}</span>
                                            @enderror

                                        </div>


                                    </div>


                                </div>


                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">حفظ
                                    </button>
                                    <button class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>

                                </div>

                            </form>
                        </div>

                    </div>
                </div>
            </div>
            {{-- update service model --}}



            {{-- delete service modal --}}
            <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title"> حذف الخدمة </h5>
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
            {{-- delete service model --}}



        </div>


    </main>

@stop
