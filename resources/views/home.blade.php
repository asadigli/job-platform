@extends('layouts.master')
@section('head')
<title>{{trans('app.My_profile_section',['name' => Auth::user()->name])}}</title>
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
                    <h3>{{trans('app.My_profile_section',['name' => Auth::user()->name])}}</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="content">
    <div class="container">
        <div class="row">
            @include('layouts.prof-nav')
            <div class="col-lg-8 col-md-12 col-xs-12">
              <div class="job-alerts-item candidates">
                @if(Request::is('home'))
                    <p class="sec-title">{{trans('app.My_profile_section',['name' => Auth::user()->name])}}</p>
                    <div class="pro-img">
                      <img src="/img/profile/{{Auth::user()->avatar}}" alt="">
                      <span><h4>{{Auth::user()->name}} {{Auth::user()->surname}}</h4><hr>
                        <p>{{Auth::user()->email}}</p>
                        <p>{{Auth::user()->birthdate}}</p>
                        <p>@if(Auth::user()->birthdate == 1) {{__('app.Job_seeker')}} @elseif(Auth::user()->birthdate == 1) {{__('app.Employer')}} @else Admin @endif</p>
                      </span>
                    </div>
                    <a class="btn-add-res" href="/start/resume/personal-information">{{__('app.Add_new_resume')}}</a>
                @elseif(Request::is('my-requests'))
                <p class="sec-title">{{__('app.My_requests')}}</p>
                <div id="jobreqlist">
                  @foreach($reqs as $req)
                  @php($vac = App\Vacancy::find($req->vac_id))
                    <div class="manager-resumes-item">
                      <div class="manager-content">
                          <a href="#"><img class="resume-thumb" src="/img/default.png" alt=""></a>
                          <div class="manager-info">
                              <div class="manager-name">
                                  <h4><a href="/job/{{$vac->vac_id}}" title="{{$vac->title}}">{{$vac->title}}</a></h4>
                                  <h5><a href="/company/{{$vac->company}}/vacancies" class="company_cl" title="{{$vac->company}}"><i class="fa fa-building"></i> {{$vac->company}}</a> </h5>
                              </div>
                              <div class="manager-meta">
                                  <span class="location"><i class="lni-map-marker"></i><a href="/location/{{App\Locations::find($vac->location)->id}}">{{App\Locations::find($vac->location)->location_az}}</a></span>
                              </div>
                          </div>
                      </div>
                      <div class="update-date">
                          <p class="status">{!! trans('app.Applied_on',['date' => \Carbon\Carbon::parse($req->created_at)->format('d M, Y')]) !!} / {{\Carbon\Carbon::parse($req->created_at)->diffForHumans()}}</p>
                          <div class="action-btn">
                              <a class="dlt-btn" data-toggle="modal" onclick="cancel_request({{$req->id}},'{{__('app.Are_sure_to_cancel_the_request')}}','{{__('app.Yes')}}','{{__('app.No')}}')" data-target="#cancelrequest" title="{{__('app.Cancel_request')}}">{{__('app.Cancel')}}</a>
                          </div>
                      </div>
                    </div>
                  @endforeach
                </div>
                <div id="cancelrequest" class="modal fade" role="dialog"></div>
                @else
                <p class="sec-title">{{__('app.Job_applications')}}</p>
                <div id="jobreqlist">
                  @foreach($reqs as $req)
                  @php($res = App\Resume::find($req->res_id))
                    @if(isset($res))
                    <div class="manager-resumes-item jobapps">
                      <div class="manager-content">
                          <a href="#"><img class="resume-thumb" src="/img/dc.png" alt=""></a>
                          <div class="manager-info">
                              <div class="manager-name">
                                  <h4><a href="/r/{{$res->username}}" title="{{$res->full_name}}">{{$res->full_name}}</a></h4>
                                  <h><i class="fa fa-calendar"></i> {!! trans('app.Applied_on',['date' => \Carbon\Carbon::parse($req->created_at)->format('d M, Y')]) !!} / {{\Carbon\Carbon::parse($req->created_at)->diffForHumans()}} </h5>
                              </div>
                          </div>
                      </div>
                    </div>
                    @else
                    <div class="manager-resumes-item jobapps">
                      <div class="manager-content">
                          <a href="#"><img class="resume-thumb" src="/img/dc.png" alt=""></a>
                          <div class="manager-info">
                              <div class="manager-name">
                                  <h4><a href="#" title="{{__('app.Unregistered_user')}}">{{__('app.Unregistered_user')}}</a></h4>
                                  <h><i class="fa fa-calendar"></i> {!! trans('app.Applied_on',['date' => \Carbon\Carbon::parse($req->created_at)->format('d M, Y')]) !!} / {{\Carbon\Carbon::parse($req->created_at)->diffForHumans()}} </h5>
                              </div>
                          </div>
                      </div>
                    </div>
                    @endif
                  @endforeach
                </div>
                <div id="cancelrequest" class="modal fade" role="dialog"></div>
                @endif
              </div>
            </div>
        </div>
    </div>
</div>
@endsection
