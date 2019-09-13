<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">@yield('page-title', 'Dashboard')</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('user.dashboard') }}">Home</a></li>
                    <li><span>@yield('page-title', 'Dashboard')</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            <div class="user-profile pull-right">
                <img class="avatar user-thumb" src="{{ auth()->user()->avatar !== null ? asset('images/avatars/'.auth()->user()->avatar) : '/assets/images/author/avatar.png' }}" alt="avatar">
                <h4 class="user-name dropdown-toggle" data-toggle="dropdown">{{ auth()->user()->name }} <i class="fa fa-angle-down"></i></h4>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{ route('user.account', auth()->user()->staff_no) }}">My Account</a>
                    {{--  <a class="dropdown-item" href="#">Settings</a> --}}
                    <a class="dropdown-item" href="{{ route('logout') }}" 
                        onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                        {{ __('Log out') }}
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>