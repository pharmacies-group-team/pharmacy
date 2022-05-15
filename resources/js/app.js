window.Pusher = require('pusher-js');
import Echo from "laravel-echo";
Pusher.logToConsole = true;
var pusher = new Pusher('da19676fc51825fbbeba', {
  cluster: 'mt1'
});

var channel = pusher.subscribe('my-channel');
channel.bind('my-event', function(data) {
  alert(JSON.stringify(data));
});

require('./bootstrap');
window._ = require('lodash');
window.$ = window.jQuery = require('jquery');
require('bootstrap-sass');


var notifications = [];
const NOTIFICATION_TYPES = {
  order: 'App\Notifications\OrderNotification'
};

$(document).ready(function() {
  // проверить, есть ли вошедший в систему пользователь
  if(Laravel.userId) {
    $.get('/notification', function (data) {
      addNotifications(data, "#notifications");

      window.Echo.private(`App.User.${Laravel.userId}`)
        .notification((notification) => {
          addNotifications([notification], '#notifications');
        });
    });
  }
});
function addNotifications(newNotifications, target) {
  notifications = _.concat(notifications, newNotifications);
  // показываем только последние 5 уведомлений
  notifications.slice(0, 5);
  showNotifications(notifications, target);
}



function showNotifications(notifications, target) {
  if(notifications.length) {
    var htmlElements = notifications.map(function (notification) {
      return makeNotification(notification);
    });
    $(target + 'Menu').html(htmlElements.join(''));
    $(target).addClass('has-notifications')
  } else {
    $(target + 'Menu').html('No notifications');
    $(target).removeClass('has-notifications');
  }
}



function makeNotification(notification) {
  var to = routeNotification(notification);
  var notificationText = makeNotificationText(notification);
  return '' + notificationText + '';
}
// получить маршрут уведомления в зависимости от его типа
function routeNotification(notification) {
  var to = '?read=' + notification.id;
  if(notification.type === NOTIFICATION_TYPES.order) {
    to = 'users' + to;
  }
  return "https://habr.com/" + to;
}
// получить текст уведомления в зависимости от его типа
function makeNotificationText(notification) {
  var text = '';
  if(notification.type === NOTIFICATION_TYPES.order) {
    const name = notification.link;
    text += '' + name + ' followed you';
  }
  return text;
}







