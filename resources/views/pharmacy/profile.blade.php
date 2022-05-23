@extends('layouts.pharmacy.master')

@php use App\Enum\PharmacyEnum;  @endphp

@section('content')


  <x-alert type="status" />

  <main class="page-pharmacy-profile">
    <header class="t-header t-card">
      <h2 class="text-base">
        @lang('heading.profile')
      </h2>
    </header>

    <div class="t-card t-mt-8">
      <div class="pharmacy-info">

        {{-- form --}}
        <livewire:pharmacy.information :pharmacy="$pharmacy" />

        {{-- avatar --}}
        @if (isset($pharmacy))
          <x-image :image="asset(PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo)" :uploadTo="route('pharmacy.update.logo')" name="logo" />
        @endif

      </div>


      <hr class="divided" />

      {{-- contact us --}}
      <livewire:pharmacy.contact :pharmacy="$pharmacy" />


      <hr class="divided">

      {{-- social media --}}
      <livewire:pharmacy.social :pharmacy="$pharmacy" />
    </div>
  </main>

@stop
