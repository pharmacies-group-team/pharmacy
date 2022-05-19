<div class="t-order-details">

  <div class="t-user-info">
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
      <p class="t-description">
        {{ $order->order }}
      </p>

    </div>
  </div>

  @if ($order->image !== '0')
    <div>
      <img src="{{ asset('uploads/order/' . $order->image) }}" alt="order-image" class="t-order-image">
    </div>
  @endif
</div>
