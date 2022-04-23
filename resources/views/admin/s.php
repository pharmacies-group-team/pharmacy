@extends('layouts/dashboard/dashboard-mastre')
@section('content')
<main class="content">
    <div class="container-fluid p-0">
        {{-- start modal --}}
        <button type="button" class="btn btn-primary float-start mt-n1" data-bs-toggle="modal"
            data-bs-target="#sizedModalMd">
            <i class="fas fa-plus"></i> اضافة جديد
        </button>
        <div class="modal fade" id="sizedModalMd" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="modal-dialog modal-md" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">اضافة جديد</h5>
                        <button type="button" class="btn-close float-left" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body m-3">
                        <form method="post" class="needs-validation" novalidate>
                            @csrf

                            <div class="mb-3">
                                <label class="form-label" for="ad-name-label">أسم الأعلان</label>
                                <input id="ad-name-label" name="name" value="{{ old('title') }}" type="text"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="أسم الاعلان" />
                                @error('title') <span id="exampleInputEmail1-error"
                                    class="error invalid-feedback">{{ $message }}</span> @enderror

                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div>
                </div>
            </div>
        </div>
        {{-- end modal --}}

        <div class="mb-3">
            <h1 class="h3 d-inline align-middle">وسائل التواصل الأجتماعي</h1>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="card-actions float-start">
                            <div class="dropdown position-relative">
                                <a href="#" data-bs-toggle="dropdown" data-bs-display="static">
                                    <i class="align-middle" data-feather="more-horizontal"></i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-start">
                                    <a class="dropdown-item" href="#">تعديل</a>
                                    <a class="dropdown-item" href="#">حذف</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div id="tasks-backlog" style="min-height:50px;">
                            <div class="card mb-3 bg-light cursor-grab border">
                                <div class="card-body p-3">

                                    <p>
                                        dfdgfgfdgfdgfd</p>





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