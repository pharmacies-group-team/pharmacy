@php
use App\Enum\PharmacyEnum;
@endphp
<div>
  {{-- page header --}}
  <section class="container">
    <form class="pharmacies-header">
      {{-- address --}}
      <div class="header-select">
        {{-- cities --}}
        <select wire:model="cityID" class="form-control" name="city">
          <option> المدينة</option>
          @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
          @endforeach
        </select>


        {{-- directorates --}}
        <select wire:model="directorateID" class="form-control" name="directorate">
          <option> المديرية</option>
          @foreach ($directorates as $directorate)
            <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
          @endforeach
        </select>


        {{-- neighborhood --}}
        <select wire:model="neighborhoodID" class="form-control" name="neighborhood">
          <option>الحي </option>
          @foreach ($neighborhoods as $neighborhood)
            <option value="{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
          @endforeach
        </select>

      </div>

      {{-- search --}}
      <div class="header-input">
        <div class="search-group">
          {{-- search input --}}
          <input wire:model="search" type="text" class="form-control" placeholder="بحث">

          <button>
            <x-icon icon="search" />
          </button>
        </div>
      </div>
    </form>
  </section>

  {{-- pharmacies list --}}
  <section class="list container">
    @foreach ($pharmacies as $pharmacy)
      <article class="item">
        <a class="item-header" href="{{ route('show.pharmacy.profile', $pharmacy->id) }}">
          {{-- logo --}}
          <img src="{{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo) }}" width="50%"
            class="item-logo" alt="pharmacy logo">

          {{-- content --}}
          <div>
            <h3 class="item-title">
              {{ $pharmacy->name }}
            </h3>

            @if (isset($pharmacy->neighborhood->name))
              <div class="item-address">
                <x-icon icon='location' />

                <div>
                  <span>
                    {{ $pharmacy->neighborhood->directorate->name }} /
                  </span>
                  <span>{{ $pharmacy->neighborhood->name }}</span>
                </div>
              </div>
            @endif
          </div>
        </a>

        {{-- action --}}
        <div x-data="{ addOrderModal: false }">
          <button class="btn btn-full item-link" @click="addOrderModal = true">أطلب
            دوائك</button>
          <x-web.pharmacy-add-order :pharmacyName="$pharmacy->name" :pharmacyID="$pharmacy->id" />
        </div>
      </article>
    @endforeach
  </section>
  <div style="display: flex; justify-content: center; margin-top: 50px ">
    {{ $pharmacies->links('livewire.livewire-pagination') }}
  </div>
</div>
