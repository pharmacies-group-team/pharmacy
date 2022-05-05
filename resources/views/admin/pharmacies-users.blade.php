@extends('layouts/dashboard/dashboard-master')
@section('content')


  <main class="users">
    @include('includes.alerts')

    <div class="container">
      {{-- title --}}
      <section class="section-header">
        <h2 class="text-large">لوحة تحكم <strong>الصيدليات</strong></h2>
      </section>

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
              @foreach ($users as $pharmacy)
                <tr>
                  <td>
                    {{ $pharmacy->name }}

                  </td>
                  <td>{{ $pharmacy->email }}</td>

                  <td>
                    <span class="badge badge-primary">صيدلية</span>
                  </td>

                  <td>
                    @if ($pharmacy->is_active)
                      <div class="badge badge-success">
                        مفعل
                      </div>
                    @else
                      <div class="badge badge-danger">
                        معطل
                      </div>
                    @endif
                  </td>

                  <td>
                    <form method="post" action='{{ route('admin.pharmacies.toggle', ['id' => $pharmacy->id]) }}'>
                      @csrf
                      <button type="submit" class="btn {{ $pharmacy->is_active ? 'btn-danger' : 'btn-primary' }}">
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
  </main>

@stop
