<div x-data="{ addModal: false }">
  <x-alert type="status" />

  <div class="container">
    {{-- title --}}
    <section class="section-header">
      <h2 class="text-large">المستخدمين</h2>
      <button class="btn" @click="addModal = true">اضافه مستخدم</button>
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
    <div style="display: flex; justify-content: center; margin-top: 50px ">
      {{ $users->links('livewire.livewire-pagination') }}
    </div>
  </div>

  {{-- modals --}}
  <div>
    {{-- add ads modal --}}
    <x-modal title="اضافة اعلان" open="addModal">
      <form enctype="multipart/form-data">
        {{-- name --}}
        <div class="form-group">
          <label for="ad-name-label">اسم المستخدم</label>
          <input wire:model="name" id="ad-name-label" type="text"
                 class="form-control @error('name') is-invalid @enderror" placeholder="أسم المستخدم" />
          @error('name')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- email --}}
        <div class="form-group">
          <label>البريد الإلكتروني</label>
          <input wire:model="email" type="email" class="form-control @error('email') is-invalid @enderror"
                 placeholder="البريد الإلكتروني" />
          @error('email')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- phone --}}
        <div class="form-group">
          <label>رقم الهاتف</label>
          <input wire:model="phone" type="text" class="form-control @error('phone') is-invalid @enderror"
                 placeholder="رقم الهاتف" />
          @error('phone')
            <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- phone --}}
        <div class="form-group">
          <label>كلمة السر</label>
          <input wire:model="password" type="text" class="form-control @error('password') is-invalid @enderror"
                 placeholder="كلمة السر" />
          @error('password')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- phone --}}
        <div class="form-group">
          <label>تأكيد كلمة السر</label>
          <input wire:model="confirm_password" type="text" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="تأكيد كلمة السر" />
        </div>
        @error('confirm_password')
        <span class="invalid-feedback">{{ $message }}</span>
        @enderror
        {{-- roles --}}
        <div class="form-group">
          <label>الصلاحيات</label>

          <select wire:model="roles" class="form-control @error('roles') is-invalid @enderror">
            <option value="{{ \App\Enum\RoleEnum::SUPER_ADMIN }}">مدير النظام</option>
            <option value="{{ \App\Enum\RoleEnum::ADMIN }}">مدير</option>
            <option value="{{ \App\Enum\RoleEnum::PHARMACY }}">صيدلي</option>
            <option selected value="{{ \App\Enum\RoleEnum::CLIENT }}">عميل</option>
          </select>

          @error('roles')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        {{-- avatar --}}
        <div class="form-group">
          <label>صورة المستخدم</label>
          <input wire:model="avatar" class="form-control @error('avatar') is-invalid @enderror" type="file">

          @error('avatar')
          <span class="invalid-feedback">{{ $message }}</span>
          @enderror
        </div>

        <x-slot:footer>
          <button wire:click.prevent="store" class="btn" @click="addModal=false">حفظ
          </button>
        </x-slot:footer>
      </form>
    </x-modal>
  </div>
</div>
