<div class="container">
  <div class="justify-content-center">
      <div class="card card_profile">
        <img class="card-img-top" src="/img/user_profile/user_profile_{{ Auth::user()->id }}.jpg" alt="user_profile" style="padding:10px;">
        <div class="card-body">
          <h5 class="card-title">{{ Auth::user()->name }}</h5>
          <div class="list-group list-group-flush" id="list-tab" role="tablist">
            <a class="list-group-item list-group-item-action active" id="list-event-list" data-toggle="list" href="#list-event" role="tab" aria-controls="event">イベント</a>
            <a class="list-group-item list-group-item-action" id="list-team-list" data-toggle="list" href="#list-team" role="tab" aria-controls="team">チーム</a>
            <a class="list-group-item list-group-item-action" id="list-profile-list" data-toggle="list" href="#list-profile" role="tab" aria-controls="profile">プロフィール</a>
          </div>
        </div>
      </div>
  </div>
</div>
