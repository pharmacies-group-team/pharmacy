@php use App\Enum\PharmacyEnum; @endphp

@if (isset($link) && isset($image) && isset($name) && isset($message))
  <li class="t-item">
    <a href="{{ $link }}">
      <header class="t-header">
        {{-- avatar --}}
        <img src="{{ $image }}" alt="user avatar" class="t-avatar" width="40px">

        {{--  --}}
        <div>

          <div class="t-user">
            <h4 class="t-name">{{ $name }}</h4>

            <span class="t-date">3M</span>
          </div>

          <p class="t-desc" style="font-size: 14px; color: #588FF4">
            {{ mb_substr($message, 0, 32, 'utf-8') }}...
          </p>
        </div>
      </header>
    </a>
  </li>
@else
  <div class="t-param-error">

    <strong>x-notification</strong>
    <span>link</span>
    <span>image</span>
    <span>name</span>
    <span>message</span>
  </div>
@endif
