<header>
  <nav class="nav">
    {{-- menu icon --}}
    <button class="menu-icon" @click="isSidebarOpen = !isSidebarOpen">
      <svg width="27" height="17" viewBox="0 0 27 17" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M27 1H0" stroke="url(#paint0_linear_0_1)" stroke-width="2" />
        <path d="M26.5 8H4.5" stroke="url(#paint1_linear_0_1)" stroke-width="2" />
        <path d="M26.5 15.5H8" stroke="url(#paint2_linear_0_1)" stroke-width="2" />
        <defs>
          <linearGradient id="paint0_linear_0_1" x1="9.36735" y1="1.61224" x2="9.3739" y2="2.06032"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#5D93FF" />
            <stop offset="1" stop-color="#877EFF" />
          </linearGradient>
          <linearGradient id="paint1_linear_0_1" x1="12.1327" y1="8.61224" x2="12.1407" y2="9.06027"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#5D93FF" />
            <stop offset="1" stop-color="#877EFF" />
          </linearGradient>
          <linearGradient id="paint2_linear_0_1" x1="14.4184" y1="16.1122" x2="14.4279" y2="16.5602"
            gradientUnits="userSpaceOnUse">
            <stop stop-color="#5D93FF" />
            <stop offset="1" stop-color="#877EFF" />
          </linearGradient>
        </defs>
      </svg>
    </button>

    {{-- nav end --}}
    <div class="nav-end">
      {{-- notification --}}
      <div class="notification">
        {{-- icon --}}
        <div class="notification-icon active">
          <svg width="24" height="27" viewBox="0 0 24 27" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M23.6895 21.766C23.6895 22.1699 23.3621 22.4973 22.9582 22.4973H1.5457C1.14185 22.4973 0.814453 22.1699 0.814453 21.766V20.7983C0.814453 20.3944 1.14185 20.067 1.5457 20.067H1.9582V11.5989C1.9582 5.5379 6.56752 0.625183 12.252 0.625183C17.9364 0.625183 22.5457 5.5379 22.5457 11.5989V20.067H22.9582C23.3621 20.067 23.6895 20.3944 23.6895 20.7983V21.766ZM4.2457 20.067H20.2582V11.5989C20.2582 6.8806 16.6737 3.05542 12.252 3.05542C7.83022 3.05542 4.2457 6.8806 4.2457 11.5989V20.067ZM9.4752 24.4374C9.38417 24.0439 9.71997 23.7124 10.1238 23.7124H14.3801C14.7839 23.7124 15.1197 24.0439 15.0287 24.4374C14.9051 24.9717 14.6461 25.465 14.2738 25.8604C13.7376 26.4301 13.0103 26.7502 12.252 26.7502C11.4936 26.7502 10.7663 26.4301 10.2301 25.8604C9.85782 25.465 9.5988 24.9717 9.4752 24.4374Z"
              fill="#C1C1C1" />
          </svg>
        </div>

        {{-- content --}}
        <div class="notification-content">
        </div>
      </div>

      {{-- user avatar --}}
      <div class="nav-avatar">
        <img src="{{ asset('img/avatars/avatar-2.jpg') }}" alt="user avatar">
      </div>
    </div>
  </nav>
</header>
