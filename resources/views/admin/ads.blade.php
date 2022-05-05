@extends('layouts/dashboard/dashboard-master')
@section('content')

  <div class="container px-5">
    @include('includes.alerts')
  </div>

  <main class="ads" x-data="{ id: null, ad: {{ json_encode(old()) }} ?? {}, addModal: false, editModal: false, deleteModal: false }">
    <div class="container">
      <section class="section-header">
        <h2 class="text-large">نشر الأعلان</h2>

        {{ json_encode(old()) }}
        <button class="btn" @click="addModal = true; ad = {{ json_encode(old()) }} ?? {}">اضافه اعلان</button>
      </section>

      <div class="table-wrapper">
        {{-- table --}}
        <table class="table">
          <thead>
            <tr>
              <th class="sorting sorting_desc" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 147px" aria-label="Name: activate to sort column ascending" aria-sort="descending">
                الصورة
              </th>
              <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 225px" aria-label="Position: activate to sort column ascending">
                العنوان
              </th>
              <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 55px" aria-label="Office: activate to sort column ascending">
                الرابط
              </th>
              {{-- <th class="sorting" tabindex="0" aria-controls="datatables-multi"
                              rowspan="1" colspan="1" style="width: 55px"
                              aria-label="Office: activate to sort column ascending">
                              المكان
                          </th> --}}
              <th class="sorting" tabindex="0" aria-controls="datatables-multi" rowspan="1" colspan="1"
                style="width: 94px" aria-label="Age: activate to sort column ascending">
                حذف
              </th>
            </tr>
          </thead>
          <tbody>
            @foreach ($ads as $ad)
              <tr>
                <td>
                  <img :src="'{{ url('images/ads') }}/{{ $ad->image }}'" />
                  <input type="hidden" name="image" value="{{ $ad->id }}" />
                </td>

                <td class="dtr-control sorting_1" tabindex="0">
                  {{ $ad->title }}

                </td>
                <td>{{ $ad->link }}</td>

                <td class="table-action">
                  <button @click=" id = {{ $ad->id }}; ad = {{ $ad }}; editModal = true">
                    <x-icon icon='edit' />
                  </button>

                  <button @click="id = {{ $ad->id }};ad = {{ $ad }}; deleteModal = true">
                    <x-icon icon='remove' />
                  </button>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>

    </div>

    {{-- modals --}}
    <div>
      {{-- add ads modal --}}
      <x-modal title="اضافة اعلان" open="addModal">
        <form action="{{ route('admin.ads.store') }}" method="post" enctype="multipart/form-data" x-ref="addForm">
          @csrf

          {{-- add titles --}}
          <div class="form-group">
            <label for="ad-name-label">أسم
              الأعلان</label>
            <input id="ad-name-label" name="title" :value="ad.title" type="text"
              class="form-control @error('title') is-invalid @enderror" placeholder="أسم الاعلان" />
            @error('title')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- start_at --}}
          <div class="form-group">
            <label for="start-input-date">تاريخ
              بدا الاعلان</label>

            <input type="date" id="start-input-date" class="form-control @error('start_at') is-invalid @enderror"
              placeholder="حدد تاريخ البدأ" name="start_at" :value="ad.start_at">
            @error('start_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- end_at --}}
          <div class="form-group">
            <label>تاريخ
              نهاية الاعلان</label>
            <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="حدد تاريخ الانتهاء"
              name="end_at" :value="ad.end_at">
            @error('end_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- link --}}
          <div class="form-group">
            <label>را'بط
              الموقع</label>
            <input type="url" name="link" :value="ad.link" class="form-control @error('link') is-invalid @enderror"
              placeholder="ادخل رابط الموقع" />
            @error('link')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- ad_position --}}
          <div class="form-group">
            <label>مكان الاعلان</label>

            <select name="ad_position" :value="ad.ad_position"
              class="form-control @error('ad_position') is-invalid @enderror">
              <option value="ddddddddad">at top</option>
              <option value="sidebarad">on sidebar</option>
              <option value="inlinead">inline ad</option>
            </select>

            @error('ad_position')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- image --}}
          <div class="form-group">
            <label>صوره الاعلان</label>
            <input name="image" class="form-control @error('image') is-invalid @enderror" type="file">

            @error('image')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <x-slot:footer>
            <button type="submit" class="btn" @click="$refs.addForm.submit()">حفظ
            </button>
          </x-slot:footer>
        </form>
      </x-modal>

      {{-- update ad modal --}}
      <x-modal title="تعديل اعلان" open="editModal">
        <form :action="'{{ url('/admin/ads') }}/' + ad.id" method="post" enctype="multipart/form-data"
          x-ref='editForm'>
          @method('PUT')
          @csrf

          {{-- title --}}
          <div class="form-group">
            <label for="ad-name-label">أسم
              الأعلان</label>
            <input id="ad-name-label" name="title" :value="ad.title" type="text"
              class="form-control @error('title') is-invalid @enderror" placeholder="أسم الاعلان" />
            @error('title')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- start_at --}}
          <div class="form-group">
            <label>تاريخ
              بدا الاعلان</label>
            <input type="date" class="form-control @error('start_at') is-invalid @enderror" placeholder="حدد تاريخ البدأ"
              name="start_at" :value="ad.start_at">
            @error('start_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- end_at --}}
          <div class="form-group">
            <label>تاريخ
              نهاية الاعلان</label>
            <input type="date" class="form-control @error('end_at') is-invalid @enderror" placeholder="حدد تاريخ الانتهاء"
              name="end_at" :value="ad.end_at">
            @error('end_at')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- link --}}
          <div class="form-group">
            <label>را'بط
              الموقع</label>
            <input type="text" name="link" :value="ad.link"
              class="form-control @error('link') is-invalid @enderror" placeholder="ادخل رابط الموقع" />
            @error('link')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- ad_position --}}
          <div class="form-group">
            <label>مكان الاعلان</label>

            <select name="ad_position" :value="ad.ad_position"
              class="form-control @error('ad_position') is-invalid @enderror">
              <option value="hello">at top</option>
              <option value="facebook">on sidebar</option>
              <option value="twitter">inline ad</option>
            </select>

            @error('ad_position')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          {{-- image --}}
          <div class="form-group">
            <label>صوره الاعلان</label>
            <input name="image" class="form-control @error('image') is-invalid @enderror" type="file">

            @error('image')
              <span class="invalid-feedback">{{ $message }}</span>
            @enderror
          </div>

          <x-slot:footer>
            <button class="btn" @click="$refs.editForm.submit()">حفظ
            </button>
          </x-slot:footer>
        </form>
      </x-modal>

      {{-- delete ad modal --}}
      <x-modal title="حذف الاعلان" open="deleteModal">
        <form method="post" :action="'/admin/ads/' + id" x-ref='deleteForm' style="text-align: center">
          @csrf
          @method('DELETE')

          <p class="text-danger">
            هل انت متاكد من حذف الاعلان ؟
          </p>

          <div>
            <img :src="'{{ url('images/ads') }}/'
            ad.image" width="200" height="150" alt="ad image"
              style="display: block; margin: 1rem auto;">
            <div x-text="ad.title"></div>
          </div>

          <x-slot:footer>
            <button class="btn btn-danger" @click="$refs.deleteForm.submit()">حذف
            </button>
          </x-slot:footer>
        </form>
      </x-modal>
    </div>
  </main>

@stop
