@extends('layouts.web.master')

@section('title') Pharmacies @stop

@section('content')
  <x-alert type="success" />
  <main class="pharmacies" x-data="{ addOrderModal: false, pharmacy: {} }">
    <div class="pharmacies-bg"></div>

    <livewire:search />

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
        <form action="{{ route('client.orders.store') }}" method="POST" enctype="multipart/form-data">
          @csrf

          {{-- TODO fixed need to test :) --}}
          {{-- pharmacy id --}}
          <input type="hidden" name="pharmacy_id" :value="pharmacy.user.id">

          {{-- file --}}
          <input type="file" accept="image/*" name="image" x-ref="inputFileOrder" @change="fileChosen">

          {{-- description / note --}}
          <div>
            <h3 class="form-title">اكتب طلبك</h3>
            <p class="form-description">
              اكتب هنا اسم الدواء أو المنتج الذي تريد طلبه من الصيدلية
            </p>

            <textarea class="form-control" name="order" rows="5"
              placeholder="مثال: علبة بنادول و بامبرز مقاس 4">{{ old('order') }}</textarea>
            @error('order')
              <span class="text-danger" role="alert">
                {{ $message }}
              </span>
            @enderror
          </div>

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
