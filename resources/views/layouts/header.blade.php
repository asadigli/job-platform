<nav class="navbar navbar-expand-lg fixed-top scrolling-navbar">
    <div class="container">
        <div class="theme-header clearfix">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-navbar" aria-controls="main-navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                    <span class="lni-menu"></span>
                </button>
                <a href="/" class="navbar-brand logo-nav"><span>eJob</span></a>
            </div>
            <div class="collapse navbar-collapse" id="main-navbar">
                <ul class="navbar-nav mr-auto w-100 justify-content-end">
                    <li class="nav-item">
                        <a class="nav-link" href="/">{{__('app.Home')}} </a>
                    </li>
                    @if(Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{Auth::user()->name}} {{Auth::user()->surname}} <img class="us_av-header" src="/img/profile/{{Auth::user()->avatar}}" alt="{{Auth::user()->name}} {{Auth::user()->surname}}"></a>
                        <ul class="dropdown-menu">
                          <li><a class="dropdown-item" href="/home">{{__('app.My_profile')}} <i class="fa fa-chevron-right"></i> </a></li>
                          <li><a class="dropdown-item" href="/add-vacancy">{{__('app.Post_a_Job')}}  <i class="fa fa-chevron-right"></i> </a></li>
                          <li><a class="dropdown-item" href="/start/resume/personal-information">{{__('app.Create_resume')}}  <i class="fa fa-chevron-right"></i> </a></li>
                          <li><a class="dropdown-item" href="/all-resumes">{{__('app.My_resumes')}}  <i class="fa fa-chevron-right"></i> </a></li>
                          <li><a class="dropdown-item" href="/account-settings">{{__('app.Account_settings')}}  <i class="fa fa-chevron-right"></i> </a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                 onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                  {{ __('Logout') }}  <i class="fa fa-sign-out"></i> 
                              </a>
                              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                  @csrf
                              </form></li>
                        </ul>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="/login">{{__('app.Sign_in')}}</a>
                    </li>
                    @endif
                    @if(Auth::check() && Auth::user()->role_id != 2)
                    @else
                    <li class="button-group">
                        <a href="/add-vacancy" class="button btn btn-common">{{__('app.Post_a_Job')}}</a>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="mobile-menu" data-logo="/img/logo-mobile.png"></div>
</nav>
