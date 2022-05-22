@extends('layouts.admin.master')
@section('content')

  @php use App\Enum\PharmacyEnum; @endphp

  <main class="users">
    <livewire:admin.users-management />
  </main>

@stop
