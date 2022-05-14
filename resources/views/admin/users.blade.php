@extends('layouts/admin/master')
@section('content')

  @php use App\Enum\PharmacyEnum; @endphp

  <main class="users">
    <x-alert type="status" />

    <div class="container">
      {{-- title --}}
      <section class="section-header">
        <h2 class="text-large">المستخدمين</h2>
      </section>

      <div class="table-wrapper">
        <table class="table">
          <thead>
          <tr>
            {{-- name --}}
            <th> الاسم</th>

            {{-- email --}}
            <th>الايميل</th>

            {{-- email --}}
            <th>رقم الهاتف</th>

            {{-- roles --}}
            <th>الصلاحية</th>

            {{-- statue --}}
            <th>حالة الحساب</th>

            {{-- actions --}}
            <th></th>
          </tr>
          </thead>

          <tbody>
          @if ($users)
            @foreach ($users as $user)
              <tr>
                <td><a href="{{ route('admin.users.profile', $user->id) }}">{{ $user->name }}</a> </td>

                <td>{{ $user->email }}</td>
                <td>{{ $user->phone }}</td>
                <td> <span class="badge bg-primary">
                    @if($user->hasRole(\App\Enum\RoleEnum::PHARMACY)) صيدلي
                    @elseif($user->hasRole(\App\Enum\RoleEnum::CLIENT)) عميل
                    @elseif($user->hasRole(\App\Enum\RoleEnum::SUPER_ADMIN)) مدير النظام
                    @endif
                  </span></td>

                {{-- status --}}
                <td>
                  @if ($user->is_active)
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
                  <form method="post" action='{{ route('admin.clients.toggle', ['id' => $user->id]) }}'>
                    @csrf
                    <button type="submit" class="btn {{ $user->is_active ? 'btn-danger' : 'btn-primary' }} m-1">

                      @if ($user->is_active)
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
