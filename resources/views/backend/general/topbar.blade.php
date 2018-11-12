<nav class="navbar-custom">
    <ul class="list-inline float-right mb-0">
      @if (Auth::user()->kode_jabatan == 'admin')
      <li class="list-inline-item dropdown notification-list">
          <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
          aria-haspopup="false" aria-expanded="false">
          <i class="ion-chatboxes noti-icon"></i>
          <span class="badge badge-success noti-icon-badge notif"></span>
      </a>
      <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg ">
        <div class="dropdown-item noti-title">
        <h5><span class="badge badge-danger float-right notif"></span>Message</h5>
      </div>
      <div class="list_chat">

      </div>
      <input type="hidden" class="code_user" value="{{Auth::User()->kode_user}}">
      </div>

  </li>
  @endif
        <li class="list-inline-item dropdown notification-list">
            <a class="nav-link dropdown-toggle arrow-none waves-effect" data-toggle="dropdown" href="#" role="button"
            aria-haspopup="false" aria-expanded="false">
            <i class="ion-ios7-bell noti-icon"></i>
            <span class="badge badge-success noti-icon-badge" id="all-notification"></span>
        </a>
        <div class="dropdown-menu dropdown-menu-right dropdown-arrow dropdown-menu-lg">
            <div class="dropdown-item noti-title">
                <h5>Notification</h5>
            </div>
            <a href="{{ route('ordertransactionIndex') }}" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary"><i class="mdi mdi-cart-outline"></i></div>
                <p class="notify-details"><b>Transaction pending</b><small class="text-muted">You Have <b id="transaction_pending"></b> pending transaction</small></p>
            </a>
            <a href="{{ route('indexReturn') }}" class="dropdown-item notify-item">
                <div class="notify-icon bg-primary"><i class="mdi mdi-file-restore"></i></div>
                <p class="notify-details"><b>Transaction return pending</b><small class="text-muted">You Have <b id="transactionreturn_pending"></b> pending transaction return</small></p>
            </a>
        </div>
    </li>
    <li class="list-inline-item dropdown notification-list">
        <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
        aria-haspopup="false" aria-expanded="false">
        @if (Auth::user()->avatar)
        <img src="{{ asset('storage/imageuser/'.Auth::user()->avatar) }}" defaultimguser alt="user" class="rounded-circle">
      	@else
        <img src="{{ asset('defaultimguser.png') }}" alt="user" class="rounded-circle">
      	@endif
    </a>
    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
        <a class="dropdown-item" href="{{ route('profileIndexBackend') }}"><i class="mdi mdi-account-circle m-r-5 text-muted"></i> Profile</a>
        <a class="dropdown-item" href="" onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();"><i class="mdi mdi-logout m-r-5 text-muted"></i> Logout</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</li>
</ul>
<ul class="list-inline menu-left mb-0">
    <li class="list-inline-item">
        <button type="button" class="button-menu-mobile open-left waves-effect">
            <i class="ion-navicon"></i>
        </button>
    </li>
    <li class="hide-phone list-inline-item app-search">
        <h3 class="page-title">{{$page}}</h3>
    </li>
</ul>
<div class="clearfix"></div>
</nav>
