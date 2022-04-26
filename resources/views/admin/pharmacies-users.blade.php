@extends('layouts/dashboard/dashboard-mastre')
@section('content')

    <main class="content" x-data="{ id: null, pharmacy: {} }">
        <div class="container-fluid p-0">
            <h1 class="h3 ">لوحة تحكم <strong>الصيدليات</strong></h1>



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
                                                        الاسم
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 225px"
                                                        aria-label="Position: activate to sort column ascending">
                                                        الايميل
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 55px"
                                                        aria-label="Office: activate to sort column ascending">
                                                        الصلاحية
                                                    </th>
                                                    <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                                                        rowspan="1" colspan="1" style="width: 94px"
                                                        aria-label="Age: activate to sort column ascending">
                                                        حذف
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if ($users)


                                                    @foreach ($users as $pharmacy)
                                                        <tr class="odd">
                                                            <input type="hidden" name="id" value="{{ $pharmacy->id }}" />

                                                            <td class="dtr-control sorting_1" tabindex="0">
                                                                {{ $pharmacy->name }}

                                                            </td>
                                                            <td>{{ $pharmacy->email }}</td>
                                                            <td>
                                                                <h4>
                                                                    <span class="badge bg-primary">صيدلية</span>
                                                                </h4>
                                                            </td>
                                                            <td>
                                                                <button type="button"
                                                                    @click="id = {{ $pharmacy->id }};pharmacy = {{ $pharmacy }}"
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

                                        {{-- delete pharmacy modal --}}
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
                                                            <input type="text" name="id" :value="id" />

                                                            {{-- <input type="hidden" name="id" :value="id" /> --}}


                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-primary">حفظ
                                                                </button>
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">اغلاق</button>

                                                            </div>

                                                        </form>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        {{-- delete pharmacy model --}}



                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{-- add  pharmacy modal --}}

            {{-- add  pharmacy model --}}
        </div>
    </main>

@stop
