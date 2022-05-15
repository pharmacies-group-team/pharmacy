@extends('layouts/admin/master')
@section('content')

  @php use App\Enum\PharmacyEnum; @endphp

  <main class="users">
    <x-alert type="status" />

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

              {{-- city --}}
              <th> المدينة</th>

              {{-- de --}}
              <th> المديرية</th>

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
                    <a href="{{ route('show.pharmacy.profile', $pharmacy->id) }}" style="color: #3869BA">
                      {{ $pharmacy->name }}
                    </a>
                  </td>

                  <td>
                    @if (isset($pharmacy->neighborhood->directorate->city->name))
                      {{ $pharmacy->neighborhood->directorate->city->name }}
                    @else
                      -
                    @endif
                  </td>

                  <td>
                    @if (isset($pharmacy->neighborhood->directorate->name))
                      {{ $pharmacy->neighborhood->directorate->name }}
                    @else
                      -
                    @endif
                  </td>

                  <td>{{ $pharmacy->user->email }}</td>

                  <td>
                    <span class="badge badge-primary">صيدلية</span>
                  </td>

                  <td>
                    @if ($pharmacy->user->is_active)
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
                    <form method="post" action='{{ route('admin.pharmacies.toggle', ['id' => $pharmacy->user->id]) }}'>
                      @csrf
                      <button type="submit" class="btn {{ $pharmacy->user->is_active ? 'btn-danger' : 'btn-primary' }}">
                        @if ($pharmacy->user->is_active)
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
