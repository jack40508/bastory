<div class="user-wrapper">
  <ul class="users">
    @foreach($m_users as $user)
      @if($user->countMessage() > 0)
        <li class="user" id="{{ $user->id }}">
          @if($user->unreadMessages($user->id))
            <span class="pending">{{ $user->unreadMessages($user->id) }}</span>
          @endif
          <div class="media">
            <div class="media-left">
              <img src="/img/user_profile/user_profile_{{ $user->id }}.jpg" alt="" class="media-object">
            </div>
            <div class="media-body">
              <p class="name">{{ $user->name }}</p>
              <p class="email">{{ $user->email }}</p>
            </div>
          </div>
        </li>
      @endif
    @endforeach
  </ul>
</div>
