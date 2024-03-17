@extends('layouts.master')
@section('head')
<title>@if(Request::is('account-settings')) {{__('app.Account_settings')}} @else {{trans('app.My_profile_section',['name' => Auth::user()->name])}} @endif</title>
@endsection
@section('body')
<header id="home" class="hero-area">
  @include('layouts.header')
</header>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    <h3>@if(Request::is('account-settings')) {{__('app.Account_settings')}} @else {{__('app.Change_password')}} @endif</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="content">
    <div class="container">
        <div class="row">
            @include('layouts.prof-nav')
            <div class="col-md-8 col-sm-8 col-xs-12">
                <div class="job-alerts-item">
                  @if(Request::is('account-settings'))
                    <p class="sec-title">   {{__('app.Account_settings')}} </p>
                      @include('layouts.alerts')
                    <form action="/edit-user-profile" method="POST" class="form" enctype="multipart/form-data">
                      @csrf
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Name')}}*</label>
                            <input class="form-control" name="name" placeholder="{{__('app.Name')}}..." value="{{Auth::user()->name}}" type="text" required>
                            @if ($errors->has('name'))
                              <span class="help-block red"> {{$errors->first('name')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Surname')}}*</label>
                            <input class="form-control" name="surname" placeholder="{{__('app.Surname')}}..." value="{{Auth::user()->surname}}" type="text" required>
                            @if ($errors->has('surname'))
                              <span class="help-block red"> {{$errors->first('surname')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Username')}}*</label>
                            <input class="form-control" name="username" placeholder="{{__('app.Username')}}..." value="{{Auth::user()->username}}" type="text" required>
                            @if ($errors->has('username'))
                              <span class="help-block red"> {{$errors->first('username')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Email')}}*</label>
                            <input class="form-control" name="email" placeholder="{{__('app.Email')}}..." value="{{Auth::user()->email}}" type="text" required>
                            @if ($errors->has('email'))
                              <span class="help-block red"> {{$errors->first('email')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Birthday')}}*</label>
                            <input class="form-control" name="birthdate" value="{{\Carbon\Carbon::parse(Auth::user()->birthdate)->format('Y-m-d')}}" type="date" required>
                            @if ($errors->has('birthdate'))
                              <span class="help-block red"> {{$errors->first('birthdate')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Profile_picture')}}*</label>
                            <input type="file" class="form-control" name="user_avatar">
                            @if ($errors->has('user_avatar'))
                              <span class="help-block red"> {{$errors->first('user_avatar')}} </span>
                            @endif
                        </div>
                        <button type="submit" class="btn btn-common">{{__('app.Update')}}</button>
                    </form>
                  @else
                    <p class="sec-title">   {{__('app.Change_password')}} </p>
                      @include('layouts.alerts')
                    <form action="/change-pass" method="POST" class="form">
                      @csrf
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Old_password')}}*</label>
                            <input class="form-control" name="old_password" placeholder="{{__('app.Old_password')}}..." type="password" required>
                            @if (session('danger'))
                              <span class="help-block red"> {{Session::get('danger')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.New_password')}}*</label>
                            <input class="form-control" name="password" placeholder="{{__('app.New_password')}}..." type="password" required>
                            @if ($errors->has('password'))
                              <span class="help-block red"> {{$errors->first('password')}} </span>
                            @endif
                        </div>
                        <div class="form-group is-empty">
                            <label class="control-label">{{__('app.Confirm_password')}}*</label>
                            <input class="form-control" name="password_confirmation" placeholder="{{__('app.Confirm_password')}}..." type="password" required>
                        </div>
                        <button type="submit" class="btn btn-common">{{__('app.Update')}}</button>
                    </form>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('foot')
@endsection
