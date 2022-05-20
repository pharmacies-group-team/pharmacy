<div x-data="{ orderModal: false }">
    <button @click="orderModal = true" class="badge badge-info">
        @lang('action.add_perodic_order')
    </button>

    <x-modal open="orderModal" :title="__('heading.perodic_order')">
        <div class="t-order-details">
            <form action="{{ route('client.addPerodicOrder') }}" method="POST" enctype="multipart/form-data"
                x-ref='editForm' class="t-edit-ads">
                {{-- @method('PUT') --}}
                @csrf
                <input type="hidden" class="form-control" value={{ $order->id }} name="order_id">


                {{-- start_at --}}
                <div class="form-group">
                    <label>تاريخ
                        بدا الطلب الدوري</label>
                    <input type="date" class="form-control @error('start_date') is-invalid @enderror"
                        placeholder=" حدد تاريخ البدأ" name="start_date">
                    @error('start_date')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>

                {{-- perodic_date_type --}}
                <div class="form-group">
                    <label>نوع الطلب الدوري</label>

                    <select name="perodic_date_type"
                        class="form-control @error('perodic_date_type') is-invalid @enderror">
                        <option value="weekly">اسبوعي</option>
                        <option value="monthly">شهري</option>
                    </select>

                    @error('perodic_date_type')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>





                <x-slot:footer>
                    <button class="btn" @click="$refs.editForm.submit()">حفظ
                    </button>
                </x-slot:footer>
            </form>
        </div>
    </x-modal>









</div>
