<script>
  function imageViewer() {
    return {
      imageUrl: '',

      fileChosen(event) {
        this.fileToDataUrl(event, src => this.imageUrl = src)
      },

      fileToDataUrl(event, callback) {
        if (!event.target.files.length) return

        let file = event.target.files[0],
          reader = new FileReader()

        reader.readAsDataURL(file)
        reader.onload = e => callback(e.target.result)
      },
    }
  }

  /**
   * @returns {HTMLElement}
   */
  let el = $el => document.querySelector($el);
</script>
@yield('alpine-script')

<script src="{{ asset('js/alpine.min.js') }}"></script>

{{-- ionicons --}}
<script def type="module" src="{{ asset('js/icons/ionicons.esm.js') }}"></script>
<script def nomodule src="{{ asset('js/icons/ionicons.js') }}"></script>

<script src="{{ asset('js/jquery.min.js') }}"></script>

<script src="{{ asset('js/pusher.min.js') }}"></script>


{{-- admin notification --}}
<script>
  const renderNotificationItem = (data) => {
    return `
<li class="t-item">
  <a href="${data.link}">
    <header class="t-item-header">
      <div class="${data.read_at === null ? 'is-not-read' : ''} t-avatar">
        <img
          src="/uploads/user/${data.sender.avatar}"
          alt="user avatar"
          class="t-avatar"
          width="40px"
        />
      </div>

      <div>
        <div class="t-user">
          <h4 class="t-name">${data.sender.name}</h4>

          <span class="t-date">3M</span>
        </div>

        <p class="t-desc">${data.message}</p>
      </div>
    </header>
  </a>
</li>`
  }

  // Enable pusher logging - don't include this in production
  // Pusher.logToConsole = true;
  var pusher = new Pusher('da19676fc51825fbbeba', {
    cluster: 'mt1',
    encrypted: true
  });


  let notifyCount = el('.js-notify-count');
  const addOneToNotifyCount = () => {
    notifyCount.textContent = parseInt(notifyCount.textContent.trim()) + 1
  }


  // admin channel
  pusher
    .subscribe('new-admin-notification')
    .bind(`Illuminate\\Notifications\\Events\\BroadcastNotificationCreated`, (data) => {
      if ({{ Auth::id() }} === data.receiver) {
        el('.js-dropdown-menu').innerHTML += renderNotificationItem(data);

        // console.log(data);
        addOneToNotifyCount()
      }
    });

  // order channel
  pusher
    .subscribe('new-order-notification')
    .bind(`Illuminate\\Notifications\\Events\\BroadcastNotificationCreated`, (data) => {
      if ({{ Auth::id() }} === data.receiver) {
        el('.js-dropdown-menu').innerHTML += renderNotificationItem(data);

        // console.log(data, notifyCount);

        // console.log(data);
        addOneToNotifyCount();
      }
    });
</script>
