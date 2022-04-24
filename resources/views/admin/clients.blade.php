@extends('layouts/dashboard/dashboard-mastre')
@section('content')
    
    <main class="content">
      <div class="container-fluid p-0">
        <h1 class="h3 mb-3">لوحة تحكم <strong>الزبائن</strong></h1>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body">
                <div
                  id="datatables-fixed-header_wrapper"
                  class="dataTables_wrapper dt-bootstrap5 no-footer"
                >
                  <div class="row">
                    <div class="col-sm-12">
                      <table
                        id="datatables-multi"
                        class="table table-striped dataTable no-footer dtr-inline"
                        style="width: 100%"
                        aria-describedby="datatables-multi_info"
                      >
                        <thead>
                          <tr>
                            <th
                              class="sorting sorting_desc"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 147px"
                              aria-label="Name: activate to sort column ascending"
                              aria-sort="descending"
                            >
                              الاسم
                            </th>
                            <th
                              class="sorting"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 225px"
                              aria-label="Position: activate to sort column ascending"
                            >
                              الايميل
                            </th>
                            <th
                              class="sorting"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 55px"
                              aria-label="Office: activate to sort column ascending"
                            >
                              الصلاحية
                            </th>
                            <th
                              class="sorting"
                              tabindex="0"
                              aria-controls="datatables-multi"
                              rowspan="1"
                              colspan="1"
                              style="width: 94px"
                              aria-label="Age: activate to sort column ascending"
                            >
                              حذف
                            </th>
                          </tr>
                        </thead>
                        <tbody>
                          @if ($users)
                              
                          
                            @foreach ($users as $client)
                            <tr class="odd">
                                <input type="hidden" name="id" value="{{ $client->id}}" />

                                <td class="dtr-control sorting_1" tabindex="0">
                                  {{$client->name}}
                                </td>
                                <td>{{$client->email}}</td>
                                <td>
                                  <h4>
                                    <span class="badge bg-primary">الزبائن</span>
                                  </h4>
                                </td>
                                <td>
                                  <span>
                                    <button class="btn btn-danger btn-sm">
                                      حذف
                                    </button>
                                  </span>
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
      </div>
    </main>

@stop
