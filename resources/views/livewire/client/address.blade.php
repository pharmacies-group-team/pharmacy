<div x-data="{ addModal: false, editModal: false, deleteModal: false }">

  <x-alert type="message" />

  <div>

    <section class="section-header t-card">
      <h2 class="text-large">عناوين التوصيل</h2>

      <button class="btn" wire:click.prevent="create()" @click="addModal = true;">اضافه عنوان جديد</button>
    </section>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">الاسم</th>
          <th scope="col">رقم الهاتف</th>
          <th scope="col">نوع العنوان</th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>
        @if (isset($addresses))
          @foreach ($addresses as $address)
            <tr>
              <td scope="row">{{ $address->id }}</th>
              <td>{{ $address->name }}</td>
              <td>{{ $address->phone }}</td>
              <td>{{ $address->type_address }}</td>
              <td class="table-action">
                <button wire:click.prevent="update({{ $address->id }})"
                  @click=" id = {{ $address->id }}; address = {{ $address }}; editModal = true">
                  <x-icon icon='edit' />
                </button>

                <button @click="id = {{ $address->id }};address = {{ $address }}; deleteModal = true">
                  <x-icon icon='remove' />
                </button>
              </td>
            </tr>
          @endforeach
        @else
          <tr>
            <td colspan="4" style="text-align: center">لايوجد بيانات</td>
          </tr>
        @endif
      </tbody>
    </table>
  </div>

  {{-- Add Address Mofal --}}
  <x-modal title="إضافة عنوان جديد" open="addModal">
    <form>
      {{-- Name --}}
      <div class="form-group">
        <label for="ad-name-label">الاسم</label>
        <input wire:model="name" id="ad-name-label" type="text" class="form-control" placeholder="الاسم " />
        @error('name')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- phone --}}
      <div class="form-group">
        <label for="ad-name-label">رقم الهاتف </label>
        <input wire:model="phone" id="ad-name-label" type="text" class="form-control" placeholder="رقم الهاتف " />
        @error('phone')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- type_address --}}
      <div class="form-group">
        <label>نوع العنوان</label>

        <select wire:model="type_address" class="form-control">
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

      {{-- desc --}}
      <div class="form-group">
        <textarea wire:model="desc" rows="3" class="form-control" placeholder="وصف الموقع"
          style="margin-top: 10px "></textarea>
        @error('desc')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      <x-slot:footer>
        <button class="btn" @click="addModal = false" wire:click.prevent="store()">حفظ</button>
      </x-slot:footer>
    </form>
  </x-modal>

  {{-- delete product modal --}}
  <x-modal title="حذف عنوان" open="deleteModal">
    <form style="display: flex; justify-content: center; align-items: center; height: 112px">
      <h1 style="font-size: 20px">
        هل انت متاكد من حذف العنوان ؟
      </h1>

      <x-slot:footer>
        <button class="btn btn-danger" wire:click="delete(id)" @click="deleteModal = false">حذف
        </button>
      </x-slot:footer>
    </form>
  </x-modal>

  {{-- Updade Address Mofal --}}
  <x-modal title="إضافة عنوان جديد" open="editModal">
    <form>
      {{-- Name --}}
      <div class="form-group">
        <label for="ad-name-label">الاسم</label>
        <input wire:model="name" id="ad-name-label" type="text" class="form-control" placeholder="الاسم " />
        @error('name')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- phone --}}
      <div class="form-group">
        <label for="ad-name-label">رقم الهاتف </label>
        <input wire:model="phone" id="ad-name-label" type="text" class="form-control" placeholder="رقم الهاتف " />
        @error('phone')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      {{-- type_address --}}
      <div class="form-group">
        <label>نوع العنوان</label>

        <select wire:model="type_address" class="form-control">
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

      {{-- desc --}}
      <div class="form-group">
        <textarea wire:model="desc" rows="3" class="form-control" placeholder="وصف الموقع"
          style="margin-top: 10px "></textarea>
        @error('desc')
          <span class="error">{{ $message }}</span>
        @enderror
      </div>

      <x-slot:footer>
        <button class="btn" @click="editModal = false" wire:click.prevent="edit(id)">حفظ</button>
      </x-slot:footer>
    </form>
  </x-modal>

</div>
