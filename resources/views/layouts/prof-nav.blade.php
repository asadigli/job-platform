<div class="col-lg-4 col-md-4 col-xs-12">
    <div class="right-sideabr">
        <h4>Manage Account <a class="cogs" href="/account-settings"><i class="fa fa-cogs"></i></a> </h4>
        <ul class="list-item">
            <li><a @if(Request::is('home')) class="active" @endif href="/home">{{__('app.My_profile')}}</a></li>
            <li><a @if(Request::is('all-resumes')) class="active" @endif href="/all-resumes">{{__('app.My_resumes')}}</a></li>
            <li><a @if(Request::is('all-vacancies')) class="active" @endif href="/all-vacancies">{{__('app.My_vacancies')}}</a></li>
            <li><a @if(Request::is('my-request')) class="active" @endif href="/my-requests">{{__('app.My_requests')}}</a></li>
            <li><a @if(Request::is('job-applications')) class="active" @endif href="/job-applications">{{__('app.Job_applications')}}</a></li>
            <!-- <li><a @if(Request::is('/')) class="active" @endif href="/home">Bookmarked Jobs</a></li> -->
            <!-- <li><a @if(Request::is('/')) class="active" @endif href="/home">Notifications <span class="notinumber">2</span></a></li> -->
            <!-- <li><a @if(Request::is('/')) class="active" @endif href="/home">Manage Applications</a></li> -->
            <!-- <li><a @if(Request::is('/')) class="active" @endif href="/home">Job Alerts</a></li> -->
            <li><a @if(Request::is('account-settings')) class="active" @endif href="/account-settings">{{__('app.Account_settings')}}</a></li>
            <li><a @if(Request::is('change-password')) class="active" @endif href="/change-password">{{__('app.Change_password')}}</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{__('app.Logout')}}</a></li>
        </ul>
    </div>
</div>
