@php
use Illuminate\Support\Facades\Auth;
@endphp

{{-- render user messages --}}
<script>
  let getMinutes = (time) => new Date(time).getMinutes();
  let getHours = (time) => new Date(time).getHours();

  let messageTimeFormat = (time) => {
    return `${getMinutes(time)}: ${getHours(time)}`;
  }

  let renderUserMessages = (message) => {
    return `
      <div
        class="t-message ${ message.from == '{{ Auth::id() }}' ?  't-message-left' : '' }" >

        <div class="t-message-avatar">
          <img src="/uploads/user/${message.to_user.avatar}" alt="user avatar" width="50px" height="50px">
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
    console.log(userID);
    axios
      .get(`/chat/messages/${userID}`)
      .then(res => {
        let messages = res.data.map(message => renderUserMessages(message))

        el('.t-chat-messages-list').innerHTML = messages.join(' ');
      })
  }
</script>

{{-- user-item --}}
<script>
  const usersClickEvent = () => {
    els('.js-user-item')
      .forEach(userElement => {
        userElement
          .addEventListener('click', (event) => {
            console.log(userElement)
            getUserMessages(userElement.getAttribute('data-user-id'))
          })

        console.log('{{ Auth::id() }}')
      })
  }
</script>

{{-- render users item --}}
<script>
  const calcTime = (time) => {
    let dateDifference = new Date() - new Date(time);

    const dateDiff = (time) => Math.floor(dateDifference / time);

    let minutes = 1000 * 60;
    let hours = minutes * 60;
    let days = hours * 24;


    // day
    if (dateDiff(days) > 0) return `${dateDiff(days)}d`;

    // hour
    else if (dateDiff(hours) > 0) return `${dateDiff(hours)}h`;

    // minutes
    else if (dateDiff(minutes) > 0) return `${dateDiff(minutes)}m`;
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
      <div class="t-item is-active js-user-item" data-user-id="${user.id}">
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
  axios.get('{{ route('chat.getUsers') }}').then((res) => {

    res.data.forEach(user => {
      el('.js-users').innerHTML += renderUser(user);
    });

    usersClickEvent();
  })
</script>
