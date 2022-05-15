@extends('layouts/client/master')
@section('content')

  <x-alert type="status" />

  <main class="page-chat container">

    <div class="section-header">
      <h1 class="text-large">@lang('heading.chat')</h1>
    </div>

    <section>
      {{-- chat sidebar --}}
      <div class="t-chat-sidebar t-card">
        {{-- item 1 --}}
        <div class="t-item is-active">
          {{-- user avatar --}}
          <div class="t-item-avatar">
            <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="40px" height="40px">

            {{-- message count --}}
            <span class="t-item-message-count">2</span>
          </div>

          {{-- name --}}
          <div class="t-item-name">
            <header>
              {{-- title --}}
              <h3 class="t-item-title">Naif sameer</h3>

              {{-- time --}}
              <span class="t-item-time">5M</span>
            </header>
            <footer>
              <p>
                {{ substr(__('heading.protection-and-privacy'), 0, 40) }}...
              </p>
            </footer>
          </div>
        </div>

        {{-- item 2 --}}
        <div class="t-item">
          {{-- user avatar --}}
          <div class="t-item-avatar">
            <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="40px" height="40px">

            {{-- message count --}}
            <span class="t-item-message-count">2</span>
          </div>

          {{-- name --}}
          <div class="t-item-name">
            <header>
              {{-- title --}}
              <h3 class="t-item-title">Naif sameer</h3>

              {{-- time --}}
              <span class="t-item-time">5M</span>
            </header>
            <footer>
              <p>
                {{ substr(__('heading.protection-and-privacy'), 0, 40) }}...
              </p>
            </footer>
          </div>
        </div>

        {{-- item 3 --}}
        <div class="t-item">
          {{-- user avatar --}}
          <div class="t-item-avatar">
            <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="40px" height="40px">

            {{-- message count --}}
            <span class="t-item-message-count">2</span>
          </div>

          {{-- name --}}
          <div class="t-item-name">
            <header>
              {{-- title --}}
              <h3 class="t-item-title">Naif sameer</h3>

              {{-- time --}}
              <span class="t-item-time">5M</span>
            </header>
            <footer>
              <p>
                {{ substr(__('heading.protection-and-privacy'), 0, 40) }}...
              </p>
            </footer>
          </div>
        </div>
      </div>

      {{-- chat message --}}
      <div class="t-chat-messages t-card">

        {{-- message list --}}
        <div class="t-chat-messages-list">

          {{-- time component --}}
          <div class="t-time">
            <span>August 22 </span>
          </div>

          {{-- message 1 --}}
          <div class="t-message">
            {{-- avatar --}}
            <div class="t-message-avatar">
              <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="50px" height="50px">
            </div>

            {{-- content --}}
            <div class="t-content">
              <p>
                هذا النص هو مثال لنص يمكن أن يستبدل
              </p>
              {{-- time --}}
              <span>06:00 pm</span>
            </div>
          </div>

          {{-- message 2 --}}
          <div class="t-message t-message-left">
            {{-- avatar --}}
            <div class="t-message-avatar">
              <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="50px" height="50px">
            </div>

            {{-- content --}}
            <div class="t-content">
              <p>
                هذا النص هو مثال لنص يمكن أن يستبدل
              </p>
              {{-- time --}}
              <span>06:00 pm</span>
            </div>
          </div>

          {{-- message 3 --}}
          <div class="t-message">
            {{-- avatar --}}
            <div class="t-message-avatar">
              <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="50px" height="50px">
            </div>

            {{-- content --}}
            <div class="t-content">
              <p>
                هذا النص هو مثال لنص يمكن أن يستبدل
              </p>
              {{-- time --}}
              <span>06:00 pm</span>
            </div>
          </div>
          {{-- message 4 --}}
          <div class="t-message">
            {{-- avatar --}}
            <div class="t-message-avatar">
              <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="50px" height="50px">
            </div>

            {{-- content --}}
            <div class="t-content">
              <p>
                هذا النص هو مثال لنص يمكن أن يستبدل
              </p>
              {{-- time --}}
              <span>06:00 pm</span>
            </div>
          </div>
          {{-- message 5 --}}
          <div class="t-message t-message-left">
            {{-- avatar --}}
            <div class="t-message-avatar">
              <img src="{{ asset('uploads/user/default_user.png') }}" alt="user avatar" width="50px" height="50px">
            </div>

            {{-- content --}}
            <div class="t-content">
              <p>
                هذا النص هو مثال لنص يمكن أن يستبدل
              </p>
              {{-- time --}}
              <span>06:00 pm</span>
            </div>
          </div>

        </div>

        {{-- message form --}}
        <form class="t-chat-messages-form">

          <input type="text" class="form-control">

          <div class="t-chat-messages-form-actions">
            {{-- media --}}
            <button>
              <div class='icon'>
                <ion-icon name="image-outline"></ion-icon>
              </div>
            </button>

            {{-- emoji --}}
            <button>
              <div class='icon'>
                <ion-icon name="happy-outline"></ion-icon>
              </div>
            </button>

            {{-- send --}}
            <button>
              <div class='icon t-icon-send'>
                <ion-icon name="send"></ion-icon>
              </div>
            </button>
          </div>
        </form>
      </div>
    </section>

  </main>

@stop
