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
    var receiver_id = '';
    var my_id = "{{ Auth::id() }}";

    // get users
    axios.get('{{ route('chat.getUsers') }}').then((res) => {
      console.log(res.data)
    })

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    // pusher
    //   .subscribe('notify-channel')
    //   .bind('App\\Events\\Notify', (data) => {

    //     console.log(data);
    //     // if (my_id == data.from) {
    //     //   $('#' + data.to).click();
    //     // } else if (my_id == data.to) {
    //     //   if (receiver_id == data.from) {
    //     //     // if receiver is selected, reload the selected user ...
    //     //     $('#' + data.from).click();
    //     //   } else {
    //     //     // if receiver is not seleted, add notification for that user
    //     //     var pending = parseInt($('#' + data.from).find('.pending').html());

    //     //     if (pending) {
    //     //       $('#' + data.from).find('.pending').html(pending + 1);
    //     //     } else {
    //     //       $('#' + data.from).append('<span class="pending">1</span>');
    //     //     }
    //     //   }
    //     // }
    //   });
  </script>
@endsection
