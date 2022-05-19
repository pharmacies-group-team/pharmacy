<div class="user-wrapper">
    <ul class="users">
        @foreach ($users as $user)
            <li class="user js-users" id="{{ $user->id }}">
                {{-- will show unread count notification --}}
                @if ($user->unread)
                    <span class="pending">{{ $user->unread }}</span>
                @endif

                <div class="media">
                    <div class="media-body">
                        <p class="name">{{ $user->name }}</p>
                        <p class="email">{{ $user->email }}</p>
                    </div>
                </div>
            </li>
        @endforeach
    </ul>
</div>
