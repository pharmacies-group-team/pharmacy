<div class="profile-form">
  <form>
    <x-alert type="message" />

    {{-- name --}}
    <div class="form-group">
      <label for="pharmacy-name" class="text-base">اسم الصيدلية:</label>

      <input wire:model="name" type="text" class="form-control" placeholder="اسم الصيدلية">
      @error('name')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    {{-- address --}}
    <div class="form-group">
      <label for="pharmacy-address" class="text-base">موقع الصيدلية:</label>

      <div class="address-selects">
        {{-- city --}}
        <select wire:model="cityID" id="pharmacy-address" class="form-control">
          <option  >حدد اسم المدينة</option>
          @foreach ($cities as $city)
            <option value="{{ $city->id }}">{{ $city->name }}</option>
          @endforeach
        </select>

        {{-- directorates --}}
        <select wire:model="directorateID" id="pharmacy-address" class="form-control">
          <option selected >حدد اسم المديرية</option>
          @foreach ($directorates as $directorate)
            <option value="{{ $directorate->id }}">{{ $directorate->name }}</option>
          @endforeach
        </select>

        {{-- neighborhoods --}}
        <select wire:model="neighborhoodID" id="pharmacy-address" class="form-control">
          @if(isset($neighborhoodID))
            <option selected value="{{ $pharmacy->neighborhood->name}}">{{ $pharmacy->neighborhood->name}}</option>
          @else
            <option selected >حدد اسم الحي</option>
          @endif
          @foreach ($neighborhoods as $neighborhood)
            <option value="{{ $neighborhood->id }}">{{ $neighborhood->name }}</option>
          @endforeach
        </select>
      </div>

      {{-- address description --}}
      <textarea wire:model="address" rows="3" class="form-control" placeholder="وصف الموقع"></textarea>
      @error('address')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    {{-- about --}}
    <div class="form-group">
      <label for="pharmacy-name" class="text-base">عن الصيدلية:</label>
      <textarea wire:model="about" rows="3" class="form-control" placeholder="نبذه عن الصيدلية"></textarea>
      @error('about')
        <span class="error">{{ $message }}</span>
      @enderror
    </div>

    <button wire:click.prevent="store()" class="btn btn-full">حفظ</button>
  </form>
</div>
