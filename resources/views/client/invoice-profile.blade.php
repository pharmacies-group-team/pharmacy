@extends('layouts/client/master')
@section('content')
  <x-alert type="status" />

  <main class="page-invoice-profile container">

    {{-- bg --}}
    <div class="t-bg"></div>

    {{-- user --}}
    <header class="t-header">
      {{-- avatar --}}
      <div class="t-avatar">
        <img src="{{ asset('uploads/user/' . $user->avatar) }}" alt="user avatar">
      </div>

      {{-- user info --}}
      <div class="t-user">
        {{-- user name --}}
        <h3 class="t-user-name">
          <x-icon icon='home' />

          <span> {{ $user->name }} </span>
        </h3>

        <div class="t-user-desc">
          {{-- item address --}}
          <div class="t-item">
            <x-icon icon='location' />

            {{-- TODO user address :) --}}
            <span>{{ $user->addresses[0]->name }}</span>
          </div>

          {{-- item date --}}
          <div class="t-item">
            <x-icon icon='home' />

            <span>{{ $user->created_at }}</span>
          </div>
        </div>
      </div>
    </header>

    {{-- content --}}
    <div class="t-content">
      {{-- log data --}}
      <div class="t-log-data">
        <header>
          <x-icon icon="home" />

          <h3 class="t-heading">Activity timeline</h3>
        </header>

        <div class="t-list">
          {{-- item --}}
          <div class="t-item">
            {{-- header --}}
            <div class="t-item-header">
              {{-- title --}}
              <h4>Client meeting</h4>

              {{-- date --}}
              <span class="t-date">Today</span>
            </div>

            {{-- desc --}}
            <p class="t-desc">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure veniam maiores numquam dolores corrupti
              voluptates quidem repellat, eos suscipit molestias soluta magnam adipisci, facere possimus laboriosam odio
              cupiditate odit perferendis.
            </p>
          </div>

          {{-- item --}}
          <div class="t-item">
            {{-- header --}}
            <div class="t-item-header">
              {{-- title --}}
              <h4>Client meeting</h4>

              {{-- date --}}
              <span class="t-date">Today</span>
            </div>

            {{-- desc --}}
            <p class="t-desc">
              Lorem ipsum dolor, sit amet consectetur adipisicing elit. Iure veniam maiores numquam dolores corrupti
              voluptates quidem repellat, eos suscipit molestias soluta magnam adipisci, facere possimus laboriosam odio
              cupiditate odit perferendis.
            </p>
          </div>
        </div>



      </div>
    </div>

  </main>

@stop
