@extends('layouts.admin.master')
@section('content')


  <x-alert type="status" />
  <x-alert type="any" />


  <main class="page-ads" x-data="{ id: null, ad: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div>
      <section class="section-header t-card">
        <h2 class="text-large">نشر الأعلان</h2>

        <button class="btn" @click="addModal = true">اضافه اعلان</button>

        {{-- add ads modal --}}
        <x-modal title="اضافة اعلان" open="addModal">
          <form action="{{ route('admin.ads.store') }}" method="post" enctype="multipart/form-data" x-ref="addForm">
            @csrf

            {{-- add titles --}}
            <div class="form-group">
              <label for="ad-name-label">أسم
                الأعلان
              </label>

              <input id="ad-name-label" name="title" value="{{ old('title') }}" type="text"
                class="form-control @error('title') is-invalid @enderror" placeholder="أسم الاعلان" />
              @error('title')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            {{-- start_at --}}
            <div class="form-group">
              <label for="start-input-date">
                تاريخ بدا الاعلان
              </label>

              <input type="date" id="start-input-date" class="form-control @error('start_at') is-invalid @enderror"
                placeholder="حدد تاريخ البدأ" name="start_at" value="{{ old('start_at') }}">
              @error('start_at')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            {{-- end_at --}}
            <div class="form-group">
              <label>تاريخ
                نهاية الاعلان</label>
              <input type="date" class="form-control @error('end_at') is-invalid @enderror"
                placeholder="حدد تاريخ الانتهاء" name="end_at" value="{{ old('end_at') }}">
              @error('end_at')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            {{-- link --}}
            <div class="form-group">
              <label>را'بط
                الموقع</label>
              <input type="url" name="link" value="{{ old('link') }}"
                class="form-control @error('link') is-invalid @enderror" placeholder="ادخل رابط الموقع" />
              @error('link')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            {{-- ad_position --}}
            <div class="form-group">
              <label>مكان الاعلان</label>

              <select name="ad_position" value="{{ old('ad_position') }}"
                class="form-control @error('ad_position') is-invalid @enderror">
                <option value="home">بيت</option>
              </select>

              @error('ad_position')
                <span class="invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            {{-- image --}}
            <x-admin.ads-image name="image" />

            <x-slot:footer>
              <button type="submit" class="btn" @click="$refs.addForm.submit()">حفظ
              </button>
            </x-slot:footer>
          </form>
        </x-modal>
      </section>

      <div class="table-wrapper">
        {{-- table --}}
        <table class="table">
          <thead>
            <tr>
              <th>الصورة</th>
              <th>العنوان </th>
              <th> تاريخ البدء</th>
              <th> تاريخ الإنتهاء</th>
              <th> حذف</th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ads as $ad)
              <tr>
                <td>
                  <img src="{{ asset(\App\Enum\AdEnum::AD_PATH . $ad->image) }}" />
                </td>

                <td class="dtr-control sorting_1" tabindex="0">{{ $ad->title }} </td>

                <td>{{ $ad->start_at }}</td>

                <td>{{ $ad->end_at }}</td>

                <td class="table-action" x-data="{ editModal: false, deleteModal: false }">
                  {{-- edit --}}
                  <button @click="editModal = true">
                    <x-icon icon='edit' />
                  </button>
                  <x-admin.edit-ads :ad='$ad' />


                  {{-- remove ads --}}
                  <button @click="deleteModal = true">
                    <x-icon icon='remove' />
                  </button>
                  <x-admin.delete-ads :ad="$ad" />
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

    {{-- modals --}}
    <div>


    </div>
  </main>

@stop
