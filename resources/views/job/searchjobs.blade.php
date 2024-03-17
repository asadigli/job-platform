@extends('layouts.master')
@section('head')
<title>{{__('app.Search_for_job')}}</title>
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
                    <h3>{{__('app.Search_for_job')}}</h3>
                </div>
                <div class="job-search-form bg-cyan job-featured-search">
                    <form method="get" action="/jobs">
                        <div class="row justify-content-center">
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <input class="form-control" type="text" name="word" @if(!empty($word)) value="{{$word}}" @endif placeholder="{{__('app.Enter_keywords')}}...">
                                </div>
                            </div>
                            <div class="col-lg-5 col-md-5 col-xs-12">
                                <div class="form-group">
                                    <div class="search-category-container">
                                        <label class="styled-select">
                                            <select name="location">
                                              <option value="0" @if(!empty($location)) @if($location == 0) selected @endif @endif>{{__('app.All_regions')}}</option>
                                              @foreach(App\Locations::all() as $loc)
                                              <option value="{{$loc->id}}" @if(!empty($location)) @if($location == $loc->id) selected @endif @endif>{{$loc->location_az}}</option>
                                              @endforeach
                                            </select>
                                        </label>
                                    </div>
                                    <i class="lni-map-marker"></i>
                                </div>
                            </div>
                            <div class="col-lg-1 col-md-1 col-xs-12">
                                <button type="submit" class="button"><i class="lni-search"></i></button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<section id="featured" class="section bg-cyan">
    <div class="container">
      <div id="job_list" class="row">
          @foreach($vacs as $vac)
          <div class="col-lg-4 col-md-6 col-xs-12">
              <div class="job-featured">
                  <div class="icon">
                      <img src="/img/dc.png" alt="">
                  </div>
                  <div class="content">
                      <h3><a href="/job/{{$vac->vac_id}}">{{$vac->title}}</a></h3>
                      <p class="brand"><a href="/company/{{$vac->company}}/vacancies">{{$vac->company}}</a> </p>
                      <div class="tags">
                          <span class="vac-loc"><i class="lni-map-marker"></i> <a href="/location/{{App\Locations::find($vac->location)->id}}/{{App\Locations::find($vac->location)->location_az}}/vacancies">{{App\Locations::find($vac->location)->location_az}}</a> </span>
                          <span class="vac-owner"><i class="lni-user"></i>
                            @if($vac->user_id == 0)
                            {{$vac->user_name}}
                            @else
                            <a href="/user/{{App\User::find($vac->user_id)->username}}/vacancies">{{App\User::find($vac->user_id)->name}} {{App\User::find($vac->user_id)->surname}}</a>
                            @endif
                          </span>
                      </div>
                      @if($vac->type == 1)
                      <a href="/job-type/part-time" class="job-type pt">{{__('app.Part_time')}}</a>
                      @elseif($vac->type == 3)
                      <a href="/job-type/remote" class="job-type rmt">{{__('app.Remote')}}</a>
                      @elseif($vac->type == 0)
                      <a href="/job-type/intern" class="job-type intr">{{__('app.Intern')}}</a>
                      @elseif($vac->type == 2)
                      <a href="/job-type/full-time" class="job-type ftm">{{__('app.Full_time')}}</a>
                      @endif
                      @if(Auth::check())
                        @if(Auth::user()->role_id == 0)
                          @if(App\Jobreq::where('vac_id',$vac->id)->where('applier_id',Auth::user()->id)->count() == 0)
                            <a class="apply-btn" onclick="apply_job({{$vac->id}})" data-toggle="modal" data-target="#apply_popup">Apply Now</a>
                          @else
                            <a class="applied-btn" disabled>{{__('app.Applied')}} <i class="fa fa-check"></i> </a>
                          @endif
                        @endif
                      @else
                      @endif
                  </div>
              </div>
          </div>
          @endforeach
          @if(count($vacs) >= 1)
          <div class="col-12 text-center mt-4">
              <a onclick="get_more_jobs()" class="btn btn-common">{{__('app.Load_more')}}</a>
          </div>
          @elseif(count($vacs) == 0)
          <div class="col-12 text-center mt-4">
              <h4>{{__('app.Result_not_found')}}</h4>
          </div>
          @endif
      </div>
      <center id="ldpart"></center>
      <div id="apply_popup" class="modal fade" role="dialog" success="{{__('app.Applied')}}"></div>
    </div>
</section>
@endsection
@section('foot')
@if(Auth::guest())

@else
<script type="text/javascript">
function apply_job(id){
  $("#apply_popup").html("<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Apply')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'> <span id='loading'></span> <div class='form-group'><label class='control-label'>{{__('app.My_resume')}}</label><div class='search-category-container' id='res_id_for_apply'><label class='styled-select'><select class='dropdown-product selectpicker' id='disp_m_res' required></select></label></div></div></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button><a class='btn btn-primary' onclick='apply_for_job("+id+")'>{{__('app.Apply')}}</a></div></div></div>");
  var op = "<option value='0' selected>{{__('app.Choose_resume')}}</option>";
  $.ajax({
    type:'GET',
    url:'/myresumes-list',
    cache: false,
    success:function(data){
        for(var i=0; i < data.length; i++){
          op +='<option value="'+data[i].id+'"> R'+(i+1)+': '+data[i].title+'</option>';
        }
        $("#disp_m_res").append(op);
    },
    error:function(data){console.log("error");}
  });
}
</script>
@endif
@endsection
