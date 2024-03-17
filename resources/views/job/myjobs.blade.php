@extends('layouts.master')
@section('head')
<title>@if(Request::is('/all-vacancies')) {{__('app.All_my_vacacies')}} @else
  {{trans('app.My_resume_section',['name' => Auth::user()->name])}} @endif</title>
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
                    <h3>@if(Request::is('/all-vacancies')) {{__('app.All_my_resumes')}} @else {{trans('app.My_resume_section',['name' => Auth::user()->name])}} @endif</h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="section">
    <div class="container">
        <div class="row">
            @include('layouts.prof-nav')
            @if(Request::is('all-vacancies'))
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="job-alerts-item candidates">
                    <p class="sec-title">{{__('app.Manage_Vacancies')}}</p>
                    @include('layouts.alerts')
                    @foreach($vacs as $vac)
                    <div class="manager-resumes-item">
                        <div class="manager-content">
                            <a href="/my-resume/{{$vac->id}}"><img class="resume-thumb" src="/img/dvp.png" alt=""></a>
                            <div class="manager-info">
                                <div class="manager-name">
                                    <h4><a href="/job/{{$vac->vac_id}}">{{$vac->title}}</a> </h4>
                                    <h5 class="company_cl">{{$vac->company}}</h5>
                                </div>
                                <div class="manager-meta">
                                    <span class="location"><i class="lni-map-marker"></i> {{$vac->title}}</span>
                                </div>
                            </div>
                        </div>
                        <div class="update-date">
                            <p class="status">
                                {!! trans('app.Updated_on_resume',['date' => $vac->updated_at->format('M d, Y')]) !!}
                            </p>
                            <div class="action-btn" id="vac_act{{$vac->id}}">
                                @if($vac->status == 1)
                                <a class="hide-show-btn" onclick="hide_my_res({{$vac->id}})"><span id="loading{{$vac->id}}"></span> {{__('app.Hide')}}</a>
                                @else
                                <a class="hide-show-btn" onclick="show_my_res({{$vac->id}})"><span id="loading{{$vac->id}}"></span> {{__('app.Show')}}</a>
                                @endif
                                <a class="dlt-btn" data-toggle="modal" data-target="#deleteresume{{$vac->id}}">{{__('app.Delete')}}</a>
                            </div>
                        </div>
                    </div>
                    <div id="deleteresume{{$vac->id}}" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5>{{__('app.Delete_resume')}}</h5>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                          </div>
                          <form action="/delete/vacancy/{{$vac->id}}" method="POST">
                            @csrf
                            <div class="modal-body">
                              <p>{{__('app.Are_you_sure_to_delete')}}</p>
                              <div class="form-group">
                                  <label class="control-label">{{__('app.Password')}}</label>
                                  <input type="password" class="form-control" name="password" placeholder="{{__('app.Password')}}..." required>
                              </div>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                              <button type="submit" class="btn btn-primary">{{__('app.Delete')}}</a>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    @endforeach
                    <a class="btn btn-common btn-sm" href="/add-vacancy">{{__('app.Add_vacancy')}}</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
@section('foot')
<script type="text/javascript">
function hide_my_res(id){
    $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
    document.getElementById("loading"+id).innerHTML = "<img id='loading-image' src='https://www.motorcoachjobs.com/Images/LoaderGIF/blue-original-loading-animation-large.gif' style='height:15px;display:none;'>"
    $('#loading-image').show();
    jQuery.ajax({
      url: "/hide-vacancy/"+id,
      method: 'POST',
        error: function(result){console.log("error");
      },
      success: function(result){
        $("#vac_act"+id).load(location.href+" #vac_act"+id+">*","");
      },
      complete: function(){
        $('#loading-image').hide();
        document.getElementById("loading"+id).innerHTML = ""
      }
    });
}
function show_my_res(id){
  $.ajaxSetup({ headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
  document.getElementById("loading"+id).innerHTML = "<img id='loading-image' src='https://www.motorcoachjobs.com/Images/LoaderGIF/blue-original-loading-animation-large.gif' style='height:15px;display:none;'>"
  $('#loading-image').show();
  jQuery.ajax({
    url: "/show-vacancy/"+id,
    method: 'POST',
      error: function(result){console.log("error");
    },
    success: function(result){
      $("#vac_act"+id).load(location.href+" #vac_act"+id+">*","");
    },
    complete: function(){
      $('#loading-image').hide();
      document.getElementById("loading"+id).innerHTML = ""
    }
  });
}
</script>
@endsection
