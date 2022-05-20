@if (isset($order))
  <div x-data="{ orderModal: false }">
    <button @click="orderModal = true" class="badge">
      @lang('action.order-details')
    </button>

    <x-modal open="orderModal" :title="__('heading.order-details')">
      <div class="t-order-details">
        {{-- user --}}
        <div class="t-order-details-user">
          {{-- avatar --}}
          <div>
            <img src="{{ asset(\App\Enum\UserEnum::USER_AVATAR_PATH . $order->user->avatar) }}" alt="user avatar"
              class="t-order-image">
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
            <div x-data="{ isZoom: false }">

              <img src="{{ asset('uploads/order/' . $order->image) }}" alt="order-image" class="t-order-image"
                @click="isZoom = true" @click.away="isZoom = false">

              <div class="t-zoom-img" :class="isZoom ? 'zoom-full' : ''">
                <img src="{{ asset('uploads/order/' . $order->image) }}" alt="order-image" class="t-order-image">
              </div>
            </div>
          @endif
        </div>

        @if (isset($footer))
          <div class="t-order-details-actions">
            {{ $footer }}
          </div>
        @endif
      </div>
    </x-modal>

  </div>
@else
  {{-- this only for dev team 🤣 --}}

  <div class="error text-large badge-danger" style="color: wheat; padding-bottom: 20rem;"> YOU NEED TO PASS
    <strong>order</strong>
    PARAM
    FOR THIS COMPONENT
  </div>
@endif
