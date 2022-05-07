<div>
  <div class="container" style="margin-top: 70px ">
    <div class="profile-form">
      <form>
        <div>
          @if (session()->has('message'))
            <div class="alert-box">
              {{ session('message') }}
            </div>
          @endif
        </div>
        {{-- name --}}
        <div class="form-group" style="flex-direction: row; align-items: center ; gap: 20px">

          <div style="display:flex; flex-direction: column">
            <input wire:model="name" type="text" class="form-control" placeholder="الاسم ">
            @error('name')
            <span class="error">{{ $message }}</span>
            @enderror
          </div>


          <div style="display:flex; flex-direction: column">
            <input wire:model="phone" type="text" class="form-control" placeholder="رقم الهاتف">
            @error('phone')
            <span class="error">{{ $message }}</span>
            @enderror
          </div>

          <div style="display:flex; flex-direction: column">
            <select wire:model="type_address" id="pharmacy-address" class="form-control">
              <option>نوع العنوان</option>
              <option value="{{ \App\Enum\UserEnum::TYPE_ADDRESS_HOME }}">
                منزل
              </option>
              <option value="{{ \App\Enum\UserEnum::TYPE_ADDRESS_WORK }}">
                عمل
              </option>
            </select>
            @error('type_address')
            <span class="error">{{ $message }}</span>
            @enderror
          </div>
        </div>

        {{-- address --}}
        <div class="form-group">
          {{-- address description --}}
          <textarea wire:model="desc" rows="3" class="form-control" placeholder="وصف الموقع" style="margin-top: 10px "></textarea>
          @error('desc')
          <span class="error">{{ $message }}</span>
          @enderror
        </div>


        <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
      </form>
    </div>
  </div>

  <div class="container" style="margin-top: 50px ">
    <table class="table">
      <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">الاسم</th>
        <th scope="col">رقم الهاتف</th>
        <th scope="col">نوع العنوان</th>
      </tr>
      </thead>
      <tbody>
        @foreach($addresses as $address)
          <tr>
            <th scope="row"></th>
            <td>{{ $address->name }}</td>
            <td>{{ $address->phone }}</td>
            <td>{{ $address->type_address }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
