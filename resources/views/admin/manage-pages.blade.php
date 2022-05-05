@extends('layouts/dashboard/dashboard-master')
@section('content')

  <main class="manage-website container">
    @include('includes.alerts')

    {{-- about us --}}
    <div class="section">
      <div class="section-header">
        <h2 class="text-large">من نحن</h2>
      </div>

      <form method="post" action="{{ route('admin.updateAboutUs') }}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $aboutUs->id }}" />

        {{-- title --}}
        <div class="form-group">
          <label for="mainTitle">العنوان الرئيسية</label>
          <input type="text" class="form-control @error('title') is-invalid @enderror" id="mainTitle" name="title"
            placeholder="ادخل العنوان الرئيسي" value="{{ $aboutUs->title }}" />
          @error('title')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- sub_title --}}
        <div class="form-group">
          <label for="inputLastName">العنوان الفرعي</label>
          <input type="text" class="form-control @error('sub_title') is-invalid @enderror" id="inputLastName"
            name='sub_title' placeholder="ادخل العنوان الفرعي" value="{{ $aboutUs->sub_title }}" />
          @error('sub_title')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>


        {{-- about --}}
        <div class="form-group">
          <label for="inputUsername">من نحن</label>

          <textarea rows="4" dir="auto" class="form-control @error('about') is-invalid @enderror" id="inputBio" name='about'
            placeholder="About us" spellcheck="false">{{ $aboutUs->about }}</textarea>
          @error('about')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- edit button --}}
        <button type="submit" class="btn">
          تعديل
        </button>
      </form>
    </div>



    {{-- contact us --}}
    <div class="section">
      <div class="section-header">
        <h2 class="text-large">تواصل معنا</h2>
      </div>

      <form method="post" action="{{ route('admin.updateContactUs') }}">
        @csrf
        @method('put')
        <input type="hidden" name="id" value="{{ $contactUs->id }}" />

        {{-- phone --}}
        <div class="form-group">
          <label class="form-label @error('phone') is-invalid @enderror" for="mainTitle">
            رقم
            التلفون</label>
          <input class="form-control" name="phone" value="{{ $contactUs->phone }}" type="tel" id="mainTitle"
            placeholder="ادخل  " />
          @error('phone')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- email --}}
        <div class="form-group">
          <label for="inputLastName">الايميل</label>
          <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" for="mainTitle"
            value=" {{ $contactUs->email }}" id="inputLastName" placeholder="ادخل الايميل" />

          @error('email')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">
          احفظ
        </button>
      </form>
    </div>



    {{-- social media management --}}
    <div class="section">
      <div class="section-header">
        <h2 class="text-large"> وسائل التواصل الإجتماعي</h2>
      </div>

      <form method="post" action="{{ route('admin.updateSocial') }}">
        @csrf
        @method('put')

        {{-- facebook --}}
        <div class="form-group">
          <label for="mainTitle">حساب الفيسبوك</label>
          <input class="form-control @error('facebook') is-invalid @enderror" name="facebook"
            value="{{ $social->facebook }}" type="url" id="mainTitle" placeholder="ادخل حساب الفيسبوك " />

          @error('facebook')
            <span class="error invalid-feedback">
              {{ $message }}</span>
          @enderror
        </div>

        {{-- twitter --}}
        <div class="form-group">
          <label for="inputLastName">حساب التويتر</label>
          <input type="url" name="twitter" class="form-control @error('twitter') is-invalid @enderror"
            value="{{ $social->twitter }}" id="inputLastName" placeholder="ادخل حساب التويتر" />
          @error('twitter')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- whatsapp --}}
        <div class="form-group">
          <label for="mainTitle">حساب الواتس اب</label>
          <input class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp"
            value="{{ $social->whatsapp }}" type="url" id="mainTitle" placeholder="ادخل حساب الواتس اب " />
          @error('whatsapp')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- instagram --}}
        <div class="form-group">
          <label for="inputLastName">حساب الانستقرام</label>

          <input type="url" name="instagram" class="form-control @error('instagram') is-invalid @enderror"
            value="{{ $social->instagram }}" id="inputLastName" placeholder="ادخل حساب الانستقرام" />
          @error('instagram')
            <span class="error invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <button type="submit" class="btn btn-primary">
          احفظ
        </button>
      </form>
    </div>


    <hr class="divided" />
    {{-- services --}}
    <div x-data="{ id: null, service: {}, addModal: false, editModal: false, deleteModal: false }">
      <div class="section-header">
        <h3>خدماتنا </h3>

        <button type="button" class="btn" @click="addModal=true; service = {}">اضافة</button>
      </div>

      {{-- table --}}
      <table class="table">
        <thead>
          <tr>
            <th> الايقونة</th>
            <th> الاسم</th>

            <th> الوصف </th>

            <th></th>
          </tr>
        </thead>

        <tbody>
          @if ($services)
            @foreach ($services as $service)
              <tr>
                <td>
                  <img :src="'{{ asset('images/services') }}/{{ $service->icon }}'" name=" image"
                    class="@error('icon') is-invalid @enderror" />
                  @error('icon')
                    <span class="error invalid-feedback">{{ $message }}</span>
                  @enderror
                </td>

                <td>
                  {{ $service->name }}
                </td>

                <td>{{ $service->desc }}</td>

                {{-- action --}}
                <td>
                  <button @click="id = {{ $service->id }}; service = {{ $service }}; editModal= true">
                    <x-icon icon='edit' />
                  </button>

                  <button @click="id = {{ $service->id }};service = {{ $service }}; deleteModal= true">
                    <x-icon icon='remove' />
                  </button>
                </td>
              </tr>
            @endforeach
          @endif
        </tbody>
      </table>

      {{-- modals --}}
      <div>
        {{-- add service modal --}}
        <x-modal title="اضافه خدمة" open="addModal">
          <form action="{{ route('admin.addService') }}" method="post" enctype="multipart/form-data" x-ref="addForm">
            @csrf

            {{-- name --}}
            <div class="form-group">
              <label for="mainTitle">اسم الخدمة</label>
              <input type="text" class="form-control" id="mainTitle" name="name" placeholder="ادخل اسم الخدمة"
                :value="service.name" />
            </div>

            {{-- desc --}}
            <div class="form-group">
              <label for="inputUsername">الوصف</label>
              <textarea rows="2" class="form-control" name='desc' placeholder="ادخل الوصف" spellcheck="false"
                :value="service.desc"></textarea>
            </div>

            {{-- icon --}}
            <div class="form-group">
              <label for="inputUsername">الايقونة</label>

              <input name="icon" :value="service.icon" class="form-control @error('image') is-invalid @enderror"
                type="file">

              @error('icon')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <x-slot:footer>
              <button type="submit" class="btn" @click="$refs.addForm.submit()">حفظ
              </button>
            </x-slot:footer>
          </form>
        </x-modal>

        {{-- update service modal --}}
        <x-modal title="تعديل الخدمات" open="editModal">
          <form :action="'{{ url('admin/site/services') }}/' + id" method="post" enctype="multipart/form-data"
            x-ref='editForm'>
            @method('PUT')
            @csrf

            {{-- name --}}
            <div class="form-group">
              <label for="mainTitle">اسم الخدمة</label>
              <input type="text" class="form-control" id="mainTitle" name="name" placeholder="ادخل اسم الخدمة"
                :value="service.name" />
            </div>

            {{-- desc --}}
            <div class="form-group">
              <label for="inputUsername">الوصف</label>
              <textarea rows="2" class="form-control" name='desc' placeholder="ادخل الوصف" spellcheck="false"
                :value="service.desc"></textarea>
            </div>

            {{-- icon --}}
            <div class="form-group">
              <label for="inputUsername">الايقونة</label>

              <input name="icon" :value="service.icon" class="form-control @error('image') is-invalid @enderror"
                type="file">

              @error('icon')
                <span class="error invalid-feedback">{{ $message }}</span>
              @enderror
            </div>

            <x-slot:footer>
              <button class="btn" @click="$refs.editForm.submit()">حفظ
              </button>
            </x-slot:footer>
          </form>
        </x-modal>

        {{-- delete service modal --}}
        <x-modal title="حذف الخدمة" open="deleteModal">
          <form method="post" :action="'/admin/site/services/' + id" x-ref='deleteForm' style="text-align: center">
            @csrf
            @method('DELETE')

            <p class="text-danger">
              هل انت متاكد من حذف الخدمة ؟
            </p>

            <div>
              <img :src="'{{ url('images/services') }}/'
              service.icon" width="200" height="150"
                alt="ad image" style="display: block; margin: 1rem auto;">
              <div x-text="service.name"></div>
            </div>

            <x-slot:footer>
              <button class="btn btn-danger" @click="$refs.deleteForm.submit()">حذف
              </button>
            </x-slot:footer>
          </form>
        </x-modal>
      </div>
    </div>
    </div>
  </main>
@stop
