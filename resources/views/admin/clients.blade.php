@extends('layouts/dashboard/dashboard-master')
@section('content')

  <main class="users container">
    <x-alert type="status" />

    <div class="section-header">
      <h1 class="text-large">لوحة تحكم <strong>الزبائن</strong></h1>
    </div>

    <div class="table-wrapper">
      <table class="table">
        <thead>
          <tr>
            {{-- name --}}
            <th> الاسم</th>

            {{-- email --}}
            <th>الايميل</th>

            {{-- roles --}}
            <th>الصلاحية</th>

            {{-- statue --}}
            <th>الحالة</th>

            {{-- actions --}}
            <th></th>
          </tr>
        </thead>

        <tbody>
          @if ($users)
            @foreach ($users as $client)
              <tr>
                <td>{{ $client->name }} </td>

                <td>{{ $client->email }}</td>
                <td> <span class="badge bg-primary">الزبائن</span></td>

                {{-- status --}}
                <td>
                  @if ($client->is_active)
                    <div class="badge badge-info">
                      مفعل
                    </div>
                  @else
                    <div class="badge badge-danger">
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
  </main>
@stop
