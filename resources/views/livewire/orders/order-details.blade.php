<div x-data="{ orderModal: false }">
  <button x-data="{ order: {{ $order }} }" @click="orderModal = true" class="btn">
    @lang('action.show')
  </button>

  <x-modal open="orderModal" :title="__('heading.order-details')">
    <div class="t-order-details">
      {{-- user --}}
      <div class="t-order-details-user">
        {{-- avatar --}}
        <div>
          <img src="{{ asset('uploads/user/' . $order->user->avatar) }}" alt="user avatar">
        </div>

        <div>
          <h3 class="t-section-title text-base">{{ $order->user->name }}</h3>
          <p class="t-created-at">{{ $order->created_at }}</p>
        </div>
      </div>

      {{-- order description --}}
      <div class="t-order-details-description">
        <div class="t-order-header">
          <x-icon icon="menu" />
          <h3 class="t-section-title text-base">@lang('heading.order-details')</h3>
        </div>

        <p class="t-description">
          {{ $order->order }}
        </p>

        @if ($order->image !== '0')
          <img src="{{ asset('uploads/order/' . $order->image) }}" alt="order-image" class="t-order-image">
        @endif
      </div>

      {{-- actions --}}
      <div class="t-order-details-actions">
        <button class="btn">
          <x-icon icon="order" />
          @lang('action.create-quote')
        </button>

        <button class="btn">
          <x-icon icon="message" />
          @lang('action.send-message')
        </button>

        <button class="btn btn-danger">@lang('action.not-found')</button>
      </div>
    </div>
  </x-modal>

</div>
