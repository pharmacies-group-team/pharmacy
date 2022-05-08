@php
use App\Enum\UserEnum;
@endphp

<div class='pharmacy-profile'>
  <div class="section-header">
    <h2 class="text-large">@lang('heading.profile')</h2>
  </div>

  <div class="pharmacy-info">
    <div class="profile-form">
      {{-- form --}}
      <form action="">
        {{-- name --}}
        <div class="form-group">

          <label class="text-base"> @lang('form.name') </label>

          <input type="text" value="{{ $name }}" class="form-control" name="name"
            placeholder="@lang('form.name') ">
        </div>

        {{-- email --}}
        <div class="form-group">
          <label class="text-base">@lang('form.email')</label>

          <input type="text" class="form-control" value="{{ $email }}" name="email"
            placeholder="@lang('form.email')">
        </div>

        <button type="submit" class="btn btn-full">@lang('form.update')</button>
      </form>
    </div>
  </div>
</div>
