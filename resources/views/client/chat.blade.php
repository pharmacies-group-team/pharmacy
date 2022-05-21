@extends('layouts.client.master')
@section('content')
  <x-alert type="status" />

  <main class="page-chat container">

    <div class="section-header t-cart">
      <h1 class="text-large">@lang('heading.chat')</h1>
    </div>

    <section>
      {{-- chat sidebar --}}
      <div class="t-chat-sidebar t-card js-users">
        {{-- item 1 --}}
        {{-- <x-chat.user :isActive="true" name='Naif' :userImage="asset('uploads/user/default_user.png')" time="5M" :message="__('heading.protection-and-privacy')" messageCount='2' /> --}}
      </div>

      {{-- chat message --}}
      <div class="t-chat-messages t-card">

        {{-- message list --}}
        <div class="t-chat-messages-list">
          {{-- time component --}}
          <div class="t-time">
            <span>August 22 </span>
          </div>
        </div>

        {{-- message form --}}
        <x-chat.form />
      </div>
    </section>

  </main>
@endsection


@section('script')
  <x-chat.scripts />

  <script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;
  </script>
@endsection
