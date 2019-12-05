<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-10">
      <div class="card" style="width: 18rem; box-shadow:3px 3px 12px gray; position: fixed">
        <img class="card-img-top" src="/img/user_profile/user_profile_{{ Auth::user()->id }}.jpg" alt="user_profile">
        <div class="card-body">
          <h5 class="card-title">{{ Auth::user()->name }}</h5>
        </div>
        <div class="card-body">
          <ul class="list-group list-group-flush">
            <li class="list-group-item">Profile</li>
            <li class="list-group-item">My Team</li>
            <li class="list-group-item">My Event</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
</div>
