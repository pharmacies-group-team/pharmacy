<!DOCTYPE html>
<html lang="ar" dir="rtl">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>صيدلية اون لاين</title>

  <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet" />

  @livewireStyles()

</head>

<body>
  <div class="dashboard" x-data="{ isSidebarOpen: window.innerWidth >= 786 ? true : false }">
    {{-- sidebar --}}
    @include('layouts.pharmacy.sidebar')

    <div class="dashboard-content">
      {{-- navbar --}}
      @include('layouts.shared.navbar')

      @yield('content')
    </div>
  </div>

  @livewireScripts()

  {{-- load alpinejs before any html element #fix modal light show/hide issues --}}
  @yield('alpine-script')
  <script src="{{ asset('js/alpine.min.js') }}"></script>

  <script src="{{ asset('js/jquery.min.js') }}"></script>

  <script>

    var notificationsWrapper = $('.dropdown-notifications');
    var notificationsToggle = notificationsWrapper.find('a[data-toggle]');
    var notificationsCountElem = notificationsToggle.find('span[data-count]');
    var notificationsCount = parseInt(notificationsCountElem.data('count'));
    var notifications = notificationsWrapper.find('li.scrollable-container');

    // Subscribe to the channel we specified in our Laravel Event
    var channel = pusher.subscribe('new-notification');
    // Bind a function to a Event (the full Laravel class)
    channel.bind('App\\Events\\NewOrderNotification', function (data) {
      var existingNotifications = notifications.html();
      var newNotificationHtml = `<a href="`+data.user_id+`"><div class="media-body"><h6 class="media-heading text-right">` + data.user_name + `</h6> <p class="notification-text font-small-3 text-muted text-right">` + data.comment + `</p><small style="direction: ltr;"><p class="media-meta text-muted text-right" style="direction: ltr;">` + data.date + data.time + `</p> </small></div></div></a>`;
      notifications.html(newNotificationHtml + existingNotifications);
      notificationsCount += 1;
      notificationsCountElem.attr('data-count', notificationsCount);
      notificationsWrapper.find('.notif-count').text(notificationsCount);
      notificationsWrapper.show();
    });

  </script>

</body>

</html>
