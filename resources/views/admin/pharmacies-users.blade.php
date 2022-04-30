@extends('layouts/dashboard/dashboard-master')
@section('content')


  <main>

    @include('includes.alerts')

    {{-- content --}}
    <div class="content">
      <div class="container-fluid p-0">
        <div class="d-flex justify-content-between my-2">
          <h1 class="h3">لوحة تحكم <strong>الصيدليات</strong></h1>

          {{-- add new item ?? TODO --}}
          {{-- <button type="button" class="btn btn-primary mt-n1 block" data-bs-toggle="modal" data-bs-target="#modify">
          <i class="fas fa-plus"></i>اضافه صيدلية
        </button> --}}
        </div>

        <div class="card overflow-x-scroll">
          <div class="card-body">
            <div id="datatables-fixed-header_wrapper" class="dataTables_wrapper dt-bootstrap5 no-footer">
              <table id="datatables-multi" class="table-striped dataTable no-footer dtr-inline table" style="width: 100%"
                aria-describedby="datatables-multi_info">
                <thead>
                  <tr>
                    <th class="sorting sorting_desc" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                      style="width: 147px" aria-label="Name: activate to sort column ascending" aria-sort="descending">
                      الاسم
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                      style="width: 225px" aria-label="Position: activate to sort column ascending">
                      الايميل
                    </th>
                    <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                      style="width: 55px" aria-label="Office: activate to sort column ascending">
                      الصلاحية
                    </th>

                    {{-- statue --}}
                    <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                      style="width: 55px" aria-label="Office: activate to sort column ascending">
                      الحالة
                    </th>

                    <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                      style="width: 94px" aria-label="Age: activate to sort column ascending">

                    </th>
                  </tr>
                </thead>
                <tbody>
                  @if ($users)
                    @foreach ($users as $pharmacy)
                      <tr class="odd">
                        {{-- <input type="hidden" name="id" value="{{ $pharmacy->id }}" /> --}}

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
                          @if ($pharmacy->is_active)
                            <div class="badge badge-info-light">
                              مفعل
                            </div>
                          @else
                            <div class="badge badge-danger-light">
                              معطل
                            </div>
                          @endif
                        </td>

                        <td>
                          <form method="post" action='{{ route('admin.pharmacies.toggle', ['id' => $pharmacy->id]) }}'>
                            @csrf
                            <button type="submit"
                              class="btn {{ $pharmacy->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

                              @if ($pharmacy->is_active)
                                تعطيل
                              @else
                                تفعيل
                              @endif
                            </button>
                          </form>
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
  </main>

@stop
