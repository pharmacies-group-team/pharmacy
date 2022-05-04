@extends('layouts/dashboard/dashboard-master')
@section('content')

  <main class="content">
    @include('includes.alerts')

    <div class="container-fluid p-0">
      <h1 class="h3 mb-3">لوحة تحكم <strong>الزبائن</strong></h1>

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

                  {{-- action --}}
                  <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                    style="width: 94px" aria-label="Age: activate to sort column ascending">

                  </th>
                </tr>
              </thead>
              <tbody>
                @if ($users)
                  @foreach ($users as $client)
                    <tr class="odd">
                      <input type="hidden" name="id" value="{{ $client->id }}" />

                      <td class="dtr-control sorting_1" tabindex="0">
                        {{ $client->name }}
                      </td>
                      <td>{{ $client->email }}</td>
                      <td>
                        <h4>
                          <span class="badge bg-primary">الزبائن</span>
                        </h4>
                      </td>

                      {{-- status --}}
                      <td>
                        @if ($client->is_active)
                          <div class="badge badge-info-light">
                            مفعل
                          </div>
                        @else
                          <div class="badge badge-danger-light">
                            معطل
                          </div>
                        @endif
                      </td>

                      {{-- action --}}
                      <td>
                        <form method="post" action='{{ route('admin.clients.toggle', ['id' => $client->id]) }}'>
                          @csrf
                          <button type="submit" class="btn {{ $client->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

                            @if ($client->is_active)
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
          <button onclick="window.print();" class="btn btn primary">Print
          </button>
        </div>
      </div>

    </div>
  </main>

@stop
