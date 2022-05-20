@extends('layouts.client.master')
@section('content')
  <x-alert type="status" />

  <main class="page-chat container">

    <div class="section-header">
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

          {{-- message 1 --}}
          <x-chat.message :userAvatar="asset('uploads/user/default_user.png')" content="هذا النص هو مثال لنص يمكن أن يستبدل" time='06:00 pm'
            isMessageLeft='true' />

          {{-- message 2 --}}
          <x-chat.message :userAvatar="asset('uploads/user/default_user.png')" content="هذا النص هو مثال لنص يمكن أن يستبدل" time='06:00 pm'
            isMessageLeft='true' />

          {{-- message 3 --}}
          <x-chat.message :userAvatar="asset('uploads/user/default_user.png')" content="هذا النص هو مثال لنص يمكن أن يستبدل" time='06:00 pm' />

          {{-- message 4 --}}
          <x-chat.message :userAvatar="asset('uploads/user/default_user.png')" content="هذا النص هو مثال لنص يمكن أن يستبدل" time='06:00 pm'
            isMessageLeft='true' />


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
    // Pusher.logToConsole = true;

    pusher
      .subscribe('notify-channel')
      .bind('App\\Events\\Notify', (data) => {

        console.log(data);
        // if (my_id == data.from) {
        //   $('#' + data.to).click();
        // } else if (my_id == data.to) {
        //   if (receiver_id == data.from) {
        //     // if receiver is selected, reload the selected user ...
        //     $('#' + data.from).click();
        //   } else {
        //     // if receiver is not seleted, add notification for that user
        //     var pending = parseInt($('#' + data.from).find('.pending').html());

        //     if (pending) {
        //       $('#' + data.from).find('.pending').html(pending + 1);
        //     } else {
        //       $('#' + data.from).append('<span class="pending">1</span>');
        //     }
        //   }
        // }
      });

    $.ajax({
      type: "get",
      url: "users", // need to create this route
      data: "",
      cache: false,
      success: function(data) {
        $('.js-user-item').html(data);


        $('.user').click(function() {
          $('.user').removeClass('active');
          $(this).addClass('active');
          $(this).find('.pending').remove();

          receiver_id = $(this).attr('id');


          // alert("receiver_id");
          $.ajax({
            type: "get",
            url: "message/" + receiver_id, // need to create this route
            data: "",
            cache: false,
            success: function(data) {
              $('#messages').html(data);
              scrollToBottomFunc();
              //alert("receiver_id");
            }
          });
        });

      }
    });


    // TODO Naif not good need help here please :)
    setTimeout(() => {

      $('.js-users').on('click', () => console.log('hi ussr'))
    }, 2000);




    $(document).on('keyup', '.input-text input', function(e) {
      var message = $(this).val();

      // check if enter key is pressed and message is not null also receiver is selected
      if (e.keyCode == 13 && message != '' && receiver_id != '') {
        $(this).val(''); // while pressed enter text box will be empty

        var datastr = "receiver_id=" + receiver_id + "&message=" + message;
        $.ajax({
          type: "post",
          url: "message", // need to create this post route
          data: datastr,
          cache: false,
          success: function(data) {

          },
          error: function(jqXHR, status, err) {},
          complete: function() {
            scrollToBottomFunc();
          }
        })
      }
    });


    // make a function to scroll down auto
    function scrollToBottomFunc() {
      $('.message-wrapper').animate({
        scrollTop: $('.message-wrapper').get(0).scrollHeight
      }, 50);
    }
  </script>
@endsection
