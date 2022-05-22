@php
use Illuminate\Support\Facades\Auth;
@endphp

{{-- render user messages --}}
<script>
  let getMinutes = (time) => new Date(time).getMinutes();
  let getHours = (time) => new Date(time).getHours();

  const scrollToBottom = (node) => node.scrollTop = node.scrollHeight;

  let messageTimeFormat = (time) => {
    return `${Math.ceil(getHours(time)/2)}:${getMinutes(time) < 10 ? '0': ''}${getMinutes(time)}`;
  }

  let renderUserMessages = (message) => {
    return `
      <div
        class="t-message ${ message.from == '{{ Auth::id() }}' ?  '':'t-message-left' }" >

        <div class="t-message-avatar">
          <img src="/uploads/user/${message.from_user.avatar}" alt="user avatar" width="50px" height="50px">
        </div>

        <div class="t-content">
          <p>${message.message}</p>
          {{-- time --}}
          <span>${messageTimeFormat(message.created_at)}</span>
        </div>
      </div>
    `
  }
</script>

{{-- get user messages --}}
<script>
  const getUserMessages = (userID) => {
    // console.log(userID);
    axios
      .get(`/chat/messages/${userID}`)
      .then(res => {

        // console.log(res.data);
        let usersMessages = [...res.data.from_messages, ...res.data.to_messages]
        // console.log(usersMessages);

        // sort message by created_at
        usersMessages = usersMessages.sort((a, b) => new Date(a.created_at) - new Date(b.created_at))

        let messages = usersMessages.map(message => renderUserMessages(message))

        let element = el('.t-chat-messages-list').innerHTML = messages.join(' ');

        // scroll to bottom
        scrollToBottom(el('.t-chat-messages-list'));
      })
  }
</script>

{{-- user-item --}}
<script>
  let toUserID = location.search.slice('userToID='.length + 1);

  const usersClickEvent = () => {
    els('.js-user-item')
      .forEach(userElement => {
        userElement
          .addEventListener('click', (event) => {
            toUserID = userElement.getAttribute('data-user-id')

            // user messages
            getUserMessages(userElement.getAttribute('data-user-id'))

            // add active class
            removeActiveClass();
            userElement.classList.add('is-active')
          })

        // console.log('{{ Auth::id() }}')
      })
  }
</script>

{{-- render users item --}}
<script>
  // remove active class from user item
  const removeActiveClass = () => {
    els('.js-user-item').forEach(item => item.classList.remove('is-active'));
  }

  const calcTime = (time) => {
    let dateDifference = new Date() - new Date(time);

    const dateDiff = (time) => Math.floor(dateDifference / time);

    let minutes = 1000 * 60;
    let hours = minutes * 60;
    let days = hours * 24;


    // console.log(dateDiff(minutes), dateDiff(minutes) > 9 ? '' : '*', 'hi there');
    // day
    if (dateDiff(days) > 0) return `${dateDiff(days)}d`;

    // hour
    else if (dateDiff(hours) > 0) return `${dateDiff(hours)}h`;

    // minutes
    else if (dateDiff(minutes) > 0) return `${dateDiff(minutes)}m`;

    else {
      return new Date(time).getMinutes();
    }
  }

  const renderUser = (user) => {

    let messageCount = () => {
      if (user.unread_message > 0) {
        return `
          <span class="t-item-message-count">
            ${user.unread_message}
          </span>`;
      }

      return '';
    }
    return `
      <div class="t-item js-user-item" data-user-id="${user.id}">
          <div class="t-item-avatar">
            <img src="/uploads/user/${user.avatar}" alt="user avatar" width="40px" height="40px">

            ${messageCount()}
          </div>

          <div class="t-item-name">
            <header>

              <h3 class="t-item-title">${user.name}</h3>

              <span class="t-item-time">
                ${calcTime(user.last_message.created_at)}
              </span>
            </header>

              <footer>
                <p>
                  ${ user.last_message.message.substring(0,40)}...
                </p>
              </footer>
          </div>
        </div>
      `
  }

  // get users
  const getUsersList = () => axios.get('{{ route('chat.getUsers') }}').then((res) => {
    let users = res.data
      .filter(user => user.id !== Number('{{ Auth::id() }}'))
      .map(user => renderUser(user));

    el('.js-users').innerHTML = users.join('');

    usersClickEvent();

    // render first user message
    el('.js-user-item').click()
    el('.js-user-item').classList.add('is-active')
  })

  getUsersList();
</script>

{{-- chat form --}}
<script>
  const sendMessage = ({
    to,
    message
  }) => {
    axios
      .post("{{ route('chat.sendMessage') }}", {
        from: '{{ Auth::id() }}',
        to,
        message
      })
      .then(res => {
        // el('.t-chat-messages-list').innerHTML += renderUserMessages(res.data);
        resetInput();
        // scroll to bottom
        scrollToBottom(el('.t-chat-messages-list'));
      })
  }

  const resetInput = () => el('.js-chat-input').value = '';

  el('.js-chat-form')
    .addEventListener('submit', event => {
      event.preventDefault();

      sendMessage({
        to: toUserID,
        message: el('.js-chat-input').value
      });

      // add user to chat list
      if (location.search.search('userToID') !== -1) {
        // getUserMessages(toUserID);
        getUsersList()

        // location.search = ''
      }
    });
</script>

{{-- pusher --}}
<script>
  pusher
    .subscribe('notify-channel')
    .bind('App\\Events\\Notify', (data) => {
      // console.log(data, 'pppppppppppppppppppppppppppppppppppp')

      el('.t-chat-messages-list').innerHTML += renderUserMessages(data.users)

      // scroll to bottom
      scrollToBottom(el('.t-chat-messages-list'));
    });
</script>
