@extends('layouts.web.master')

@section('title') Pharmacies @stop

@php
use App\Enum\PharmacyEnum;
@endphp

@section('content')

  <main class="pharmacies" x-data="{ addOrderModal: false, pharmacy: {} }">
    <div class="pharmacies-bg"></div>

    {{-- page header --}}
    <section class="container">
      <form action="" method="GET" class="pharmacies-header">
        {{-- address --}}
        <div class="header-select">
          {{-- cities --}}
          <select class="form-control" name="city">
            @foreach ($cities as $city)
              <option value="{{ $city->id }}">{{ $city->name }}</option>
            @endforeach
          </select>


          {{-- directorates --}}
          <select class="form-control" name="directorate">
            @foreach ($directorates as $directorate)
              <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
            @endforeach
          </select>


          {{-- neighborhood --}}
          <select class="form-control" name="neighborhood">
            @foreach ($neighborhoods as $neighborhood)
              <option value="{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
            @endforeach
          </select>

        </div>

        {{-- search --}}
        <div class="header-input">
          <div class="search-group">
            {{-- search input --}}
            <input type="search" class="form-control" name="search-query" placeholder="بحث">

            <button type="submit">
              <x-icon icon="search" />
            </button>
          </div>
        </div>
      </form>
    </section>

    {{-- pharmacies list --}}
    @if (isset($pharmacies))
      <section class="list container">
        @foreach ($pharmacies as $pharmacy)
          <article class="item">
            <a class="item-header" href="{{ route('show.pharmacy.profile', $pharmacy->id) }}">
              {{-- logo --}}
              <img
                src="@if (isset($pharmacy->logo)) {{ asset(PharmacyEnum::PHARMACY_LOGO_PATH . $pharmacy->logo) }} @else {{ asset(PharmacyEnum::PHARMACY_LOGO_DEFAULT) }} @endif"
                width="50%" class="item-logo" alt="pharmacy logo">

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
                        {{ $pharmacy->neighborhood->name }} /
                      </span>
                      <span>{{ $pharmacy->neighborhood->directorate->name }}</span>
                    </div>
                  </div>
                @endif
              </div>
            </a>

            {{-- action --}}
            <button class="btn btn-full item-link" @click="addOrderModal = true; pharmacy = {{ $pharmacy }}">أطلب
              دوائك</button>
          </article>
        @endforeach
      </section>
    @endif

    {{-- modals --}}
    <x-modal open="addOrderModal" title="اضافة طلب">

      {{-- pharmacy info --}}
      <div class="pharmacy-info">
        <span class="pharmacy-sub-title">
          طلب دواء من صيدلية:
        </span>

        <h3 class="pharmacy-title" x-text="pharmacy.name"> ddd</h3>
      </div>

      <div x-data="imageViewer" class="image-file-upload">
        {{-- add image --}}
        <div class="file-upload" @click="$refs.inputFileOrder.click()">
          {{-- add image input --}}
          <template x-if="!imageUrl">
            <div>
              <x-icon icon='add-image' />

              <p class="title">أضف صورة الروشتة أو المنتج الذي تريده</p>
            </div>
          </template>
          {{-- image viewer --}}
          <template x-if="imageUrl">
            <div class="viewer-image">
              <img :src="imageUrl" width="100%">
            </div>
          </template>
        </div>
        @error('image')
        <span class="text-danger" role="alert">
            {{ $message }}
          </span>
        @enderror

        <div class="or"></div>

        {{-- form --}}
        <form action="{{ route('clients.order.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{--   TODO       --}}
          {{-- pharmacy id --}}
{{--          <input type="hidden" name="pharmacy_id" :value="pharmacy.id">--}}
          <input type="hidden" name="pharmacy_id" value="2">
          {{-- file --}}
          <input type="file" accept="image/*" name="image" x-ref="inputFileOrder" @change="fileChosen">

          {{-- description / note --}}
          <div>
            <h3 class="form-title">اكتب طلبك</h3>
            <p class="form-description">
              اكتب هنا اسم الدواء أو المنتج الذي تريد طلبه من الصيدلية
            </p>

            <textarea class="form-control" name="order" rows="5" placeholder="مثال: علبة بنادول و بامبرز مقاس 4">
              {{ old('order') }}
            </textarea>
            @error('order')
            <span class="text-danger" role="alert">
                 {{ $message }}
            </span>
            @enderror
          </div>

          {{-- user address --}}
          {{-- <div>
            <label for="user-address-select-id" class="form-title">العنوان</label>
            <select name="user-address" class="form-control" id="user-address-select-id">
              <option value="1">Yemen</option>
              <option value="2">Tokyo</option>
              <option value="3">Paries</option>
            </select>

            <div class="or"></div>
            <label for="">اضافه عنوان جديد</label>
            <input type="text" name="new-user-address" class="form-control">
          </div> --}}

          <button type="submit" class="btn btn-full">
            إتمام الطلب
          </button>
        </form>

        {{-- description --}}
        <p class="description">
          موقع صيدلية أونلاين يساعدك في طلب كافة احتياجاتك من الصيدلية، ولكن صيدلية أونلاين غير مسئولة عن بيع أو صرف أو
          توزيع أي أدوية، وتتحمل الصيدليات وحدها مسئولية بيع الأدوية وصرفها وتوزيعها ،لمزيد من التفاصيل يرجى مراجعة شروط
          الإستخدام.
        </p>
      </div>
    </x-modal>
  </main>

@stop

@section('alpine-script')

  <script>
    function imageViewer() {
      return {
        imageUrl: '',

        fileChosen(event) {
          this.fileToDataUrl(event, src => this.imageUrl = src)
        },

        fileToDataUrl(event, callback) {
          if (!event.target.files.length) return

          let file = event.target.files[0],
            reader = new FileReader()

          reader.readAsDataURL(file)
          reader.onload = e => callback(e.target.result)
        },
      }
    }
  </script>
@endsection
