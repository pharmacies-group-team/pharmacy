@extends('layouts/dashboard/dashboard-master')
@section('content')

    <div class="container px-5">
        @include('includes.alerts')
    </div>

    <main class="content" x-data=" { id: null, address: {{ json_encode(old()) }} ?? {} }">
        <div class="container-fluid p-0">
            <div class="d-flex justify-content-between my-2">

                <button type="button" class="btn btn-primary mt-n1 block" data-bs-toggle="modal" data-bs-target="#add">
                    <i class="fas fa-plus"></i>
                    اضافه اعلان
                </button>
            </div>

            <div class="card">
                <div class="card-body">
                    <div id="datatables-fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="datatables-multi" class="table-striped dataTable no-footer dtr-inline table"
                                    style="width: 100%" aria-describedby="datatables-multi_info">
                                    <thead>
                                        <tr>
                                            <th class="sorting sorting_desc" tabindex="0" aria-controls="datatables-multi"
                                                rowspan="1" colspan="1" style="width: 147px"
                                                aria-label="Name: activate to sort column ascending" aria-sort="descending">
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
                                        @foreach ($addresses as $address)
                                            <tr class="odd">
                                                <td>
                                                    {{-- <img :src="'{{ url('images/ads') }}/{{ $ad->image }}'"
                                                        class="img-responsive img-fluid" /> --}}
                                                    <input type="hidden" name="image" value="{{ $address->id }}" />
                                                </td>

                                                <td class="dtr-control sorting_1" tabindex="0">
                                                    {{ $address->desc }}

                                                </td>
                                                <td>{{ $address->lat }}</td>
                                                <td>{{ $address->lng }}</td>

                                                <td>{{ $address->neighborhood_id }}</td>

                                                <td>{{ $address->name }}</td>
                                                <td>{{ $address->phone }}</td>
                                                <td>{{ $address->address_type }}</td>

                                                <td>
                                                    <button type="button"
                                                        @click=" id = {{ $address->id }}; address = {{ $address }}"
                                                        class="btn btn-success float-end m-1" data-bs-toggle="modal"
                                                        data-bs-target="#update">
                                                        تعديل
                                                    </button>

                                                    <button type="button"
                                                        @click="id = {{ $address->id }};address = {{ $address }}"
                                                        class="btn btn-danger float-end m-1" data-bs-toggle="modal"
                                                        data-bs-target="#delete">
                                                        حذف
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>

                                {{-- add ads modal --}}
                                <div class="modal fade" id="add" tabindex="-1" role="dialog" aria-hidden="true">
                                    <div class="modal-dialog modal-md" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title"> اضافة اعلان </h5>
                                                <button type="button" class="btn-close"
                                                    data-bs-dismiss="modal"></button>
                                            </div>

                                            <div class="modal-body m-3">
                                                <form action="{{ route('clients.addresses.store') }}" method="post"
                                                    class="needs-validation" enctype="multipart/form-data" novalidate>
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            desc</label>
                                                        <input id="ad-name-label" name="desc" :value="address.desc"
                                                            type="text"
                                                            class="form-control @error('desc') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('desc')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            lat</label>
                                                        <input id="ad-name-label" name="lat" :value="address.lat"
                                                            type="number"
                                                            class="form-control @error('lat') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('lat')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            lng</label>
                                                        <input id="ad-name-label" name="lng" :value="address.lng"
                                                            type="number"
                                                            class="form-control @error('lat') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('lng')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>



                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            neighborhood_id</label>
                                                        <input id="ad-name-label" name="neighborhood_id"
                                                            :value="address.neighborhood_id" type="number"
                                                            class="form-control @error('neighborhood_id') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('neighborhood_id')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            name</label>
                                                        <input id="ad-name-label" name="name" :value="address.name"
                                                            type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('name')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            phone</label>
                                                        <input id="ad-name-label" name="phone" :value="address.phone"
                                                            type="number"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('phone')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">
                                                            address_type</label>
                                                        <input id="ad-name-label" name="address_type"
                                                            :value="address.address_type" type="text"
                                                            class="form-control @error('address_type') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('address_type')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>




                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">حفظ
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">اغلاق</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <form :action="'{{ url('dashboard/clients/addresses') }}/' + address.id"
                                                    method="post" class="needs-validation" enctype="multipart/form-data"
                                                    novalidate>
                                                    @method('PUT')
                                                    @csrf

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            desc</label>
                                                        <input id="ad-name-label" name="desc" :value="address.desc"
                                                            type="text"
                                                            class="form-control @error('desc') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('desc')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            lat</label>
                                                        <input id="ad-name-label" name="lat" :value="address.lat"
                                                            type="number"
                                                            class="form-control @error('lat') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('lat')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            lng</label>
                                                        <input id="ad-name-label" name="lng" :value="address.lng"
                                                            type="number"
                                                            class="form-control @error('lng') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('lng')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>



                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            neighborhood_id</label>
                                                        <input id="ad-name-label" name="neighborhood_id"
                                                            :value="address.neighborhood_id" type="number"
                                                            class="form-control @error('neighborhood_id') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('neighborhood_id')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            name</label>
                                                        <input id="ad-name-label" name="name" :value="address.name"
                                                            type="text"
                                                            class="form-control @error('name') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('name')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            phone</label>
                                                        <input id="ad-name-label" name="phone" :value="address.phone"
                                                            type="number"
                                                            class="form-control @error('phone') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('phone')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>

                                                    <div class="mb-3">
                                                        <label class="form-label" for="ad-name-label">أسم
                                                            address_type</label>
                                                        <input id="ad-name-label" name="address_type"
                                                            :value="address.address_type" type="text"
                                                            class="form-control @error('address_type') is-invalid @enderror"
                                                            placeholder="أسم الاعلان" />
                                                        @error('address_type')
                                                            <span id="exampleInputEmail1-error"
                                                                class="error invalid-feedback">{{ $message }}</span>
                                                        @enderror

                                                    </div>




                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-primary">حفظ
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">اغلاق</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>

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
                                                <form method="post" :action="'addresses/' + id" class="needs-validation"
                                                    novalidate> @csrf
                                                    @method('DELETE')


                                                    {{-- <input type="hidden" name="id" :value="id" /> --}}
                                                    <div class="modal-footer">
                                                        <button type="submit" class="btn btn-danger">حذف
                                                        </button>
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">اغلاق</button>
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
            </div>
        </div>
    </main>

@stop
