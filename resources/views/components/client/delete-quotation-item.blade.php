{{-- delete product modal --}}
<x-modal title="حذف منتج" open="deleteModal">
  <form style=" height: 112px">

    <h1 style="" class="text-danger">
      هل انت متاكد من حذف المنتج ؟
    </h1>

    <div class="t-mt-8">{{ $name }}</div>

    <x-slot:footer>
      <button class="btn btn-danger" wire:click="delete({{ $id }})" @click="deleteModal = false">حذف
      </button>
    </x-slot:footer>
  </form>
</x-modal>
