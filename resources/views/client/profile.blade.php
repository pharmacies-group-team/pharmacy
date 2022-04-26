@extends('layouts/dashboard/client-dashboard-master')
@section('content')
    {{-- {{ dd($users) }} --}}
    <div class="container px-5">
        @include('includes.alerts')
    </div>


    <main class="content reverse-direction" x-data="{ id: null, client: {} }">
        <div class="container-fluid p-0">



            <div class="row">
                <div class="col-md-3 col-xl-2">

                    <div class="card">


                        <div class="list-group list-group-flush" role="tablist">
                            <a class="list-group-item list-group-item-action " data-bs-toggle="list" href="#account"
                                role="tab">الصفحة الشخصية</a>
                            <a class="list-group-item list-group-item-action" data-bs-toggle="list" href="#password"
                                role="tab">الطلبات السابقة</a>






                        </div>
                    </div>
                </div>

                <div class="col-md-9 col-xl-10">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="account" role="tabpanel">

                            <div class="card">
                                <div class="card-header">

                                    <h5 class="card-title mb-0">المعلومات الشخصية</h5>
                                </div>
                                <div class="card-body" method="post" class="needs-validation" novalidate>
                                    <form class="px-3">
                                        @csrf
                                        @method('put')
                                        <div class="row ">
                                            <div class="col-md-8 ">
                                                <div class="mb-3">
                                                    <label class="form-label" for="inputUsername">الأسم</label>
                                                    <input type="text" class="form-control" id="inputUsername"
                                                        placeholder="الأسم">
                                                </div>

                                                <div class="mb-3">
                                                    <label class="form-label" for="inputEmail4">الايميل</label>
                                                    <input type="email" class="form-control" id="inputEmail4"
                                                        placeholder="الايميل">
                                                </div>

                                            </div>
                                            <div class="col-md-4 ">
                                                <div class="text-center">
                                                    <img alt="Charles Hall" src="img/avatars/avatar.jpg"
                                                        class="rounded-circle img-responsive mt-2" width="128" height="128">
                                                    <div class="mt-2">
                                                        <span class="btn btn-primary"><svg
                                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                                stroke-width="2" stroke-linecap="round"
                                                                stroke-linejoin="round" class="feather feather-upload">
                                                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"></path>
                                                                <polyline points="17 8 12 3 7 8"></polyline>
                                                                <line x1="12" y1="3" x2="12" y2="15"></line>
                                                            </svg> تحميل</span>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>

                                        <button type="submit" class="btn btn-primary">حفظ</button>
                                    </form>

                                </div>
                            </div>



                        </div>

                    </div>
                </div>
            </div>

        </div>
    </main>

@stop
