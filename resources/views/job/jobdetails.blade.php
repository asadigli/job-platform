@extends('layouts.master')
@section('head')
<title>{{$vac->title}} </title>
<meta name="description" content="{{$vac->description}}">
<meta name="keywords" content="{{$vac->title}}">
@endsection
@section('body')
<header id="home" class="hero-area">
    @include('layouts.header')
</header>
<div class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-6 col-xs-12 main-job-det">
                <div class="breadcrumb-wrapper">
                    <div class="img-wrapper">
                        <img src="/img/about/company-logo.png" alt="">
                    </div>
                    <div class="content">
                        <h3 class="product-title">{{$vac->title}}</h3>
                        <p class="brand">{{$vac->company}}</p>
                        <div class="tags">
                            <span><i class="lni-map-marker"></i> {{$vac->location}}</span>
                            <span><i class="lni-calendar"></i> {{trans('app.Posted_on',['date' => $vac->created_at->format('d M, Y')])}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-xs-12">
                <div class="month-price">
                    <div id="loading-hide">
                      <span class="year">@if($vac->salary_type == 1) {{__('app.Hourly')}}
                      @elseif($vac->salary_type == 2) {{__('app.Daily')}}
                      @elseif($vac->salary_type == 3) {{__('app.Weekly')}}
                      @elseif($vac->salary_type == 4) {{__('app.Monthly')}}
                      @else {{__('app.Annual')}}
                      @endif</span>
                      <div class="price">{{number_format($vac->salary)}}AZN </div>
                    </div>
                    <span id="loading"></span>
                </div>
            </div>
        </div>
    </div>
</div>

<section class="job-detail section">
    <div class="container">
        <div class="row justify-content-between" id="vac_body">
            <div class="col-lg-8 col-md-12 col-xs-12">
                <div class="content-area">
                  @include('layouts.alerts')
                  @if($vac->status == 0 && substr(Request::url(), strrpos(Request::url(), '/') + 1) == $vac->token)
                  <div class="verify-vacancy">
                    {{__('app.Active_your_vacancy')}}
                    <a href="/delete-job/{{$vac->token}}" class="verif-btn btn-danger">{{__('app.Delete')}} </a>
                    <a onclick="activate_vacancy({{$vac->id}})" class="verif-btn btn-success">{{__('app.Confirm')}} </a>
                  </div>
                  @else
                  <div class="verified-vacancy" id="verifiedvac" style="display:none;">
                    <center>{{__('app.Successfully_started')}}</center>
                  </div>
                  @endif
                    <h4>{{__('app.Description')}}</h4>
                    {!! $vac->description !!}
                    <h4>{{__('app.Job_requirements')}}</h4>
                    {!! $vac->requirements !!}
                    <div class="app-btn-div">
                      @if(Auth::check())
                        @if(Auth::user()->role_id == 0)
                          @if(App\Jobreq::where('vac_id',$vac->id)->where('applier_id',Auth::user()->id)->count() == 0)
                            <a href="#" class="appy-btn-large" data-toggle="modal" data-target="#apply_popup" onclick="apply_job()">{{__('app.Apply')}}</a>
                          @else
                          <a class="appy-btn-large" disabled>{{__('app.Applied')}} <i class="fa fa-check"></i> </a>
                          @endif
                        @endif
                      @else
                        <a href="#" class="btn btn-common" data-toggle="modal" data-target="#apply_popup">{{__('app.Apply')}}</a>
                      @endif
                    </div>
                </div>
            </div>
            <div id="apply_popup" class="modal fade" role="dialog" success="{{__('app.Applied')}}">
              <div class='modal-dialog'>
                @if(Auth::check())
                <div class='modal-content'>
                  <div class='modal-header'>
                    <h5>{{__('app.Apply')}}</h5>
                    <button type='button' class='close' data-dismiss='modal'>&times;</button>
                  </div>
                  <div class='modal-body'> <span id='loading'></span>
                    <div class='form-group'>
                      <label class='control-label'>{{__('app.My_resume')}}</label>
                      <div class='search-category-container' id='res_id_for_apply'>
                        <label class='styled-select'>
                          <select class='dropdown-product selectpicker' id='disp_m_res' name='vac_id' required>
                          </select>
                        </label>
                      </div>
                    </div>
                  </div>
                  <div class='modal-footer'>
                    <button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button>
                    <a class='btn btn-primary' onclick='apply_for_job({{$vac->id}})'>{{__('app.Apply')}}</a>
                  </div>
                </div>
                @else
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5>{{__('app.Apply')}}</h5>
                        <button type='button' class='close' data-dismiss='modal'>&times;</button>
                    </div>
                    <form action='/apply-as-ur-user' method='POST' enctype='multipart/form-data'>
                      @csrf
                        <div class='modal-body'>
                            <input type='hidden' name='vac_id' value="{{$vac->id}}" required/>
                            <div class='form-group'>
                                <label>{{__('app.Upload_a_resume')}}</label>
                                <input type='file' class='form-control' name='resume' required/>
                            </div>
                        </div>
                        <div class='modal-footer'>
                            <button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button>
                            <button class='btn btn-primary' type='submit'>{{__('app.Apply')}}</button>
                        </div>
                    </form>
                </div>
                @endif
              </div>
              <!-- <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                  </div>
                  <div class="modal-body">
                    <p>Some text in the modal.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-common" name="button">{{__('app.Apply')}}</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">{{__('app.Close')}}</button>
                  </div>
                </div>

              </div> -->
            </div>
            <div class="col-lg-4 col-md-12 col-xs-12">
                <div class="sideber">
                    <div class="widghet">
                        <h3>Job Location</h3>
                        <ul>
                          <li><b>{{__('app.Vacancy_ID')}}:</b> {{$vac->vac_id}}</li>
                          <li><b>{{__('app.Category')}}:</b>
                            @if($vac->category == 1) <a href="#">{{__('app.Finance')}}</a>
                            @elseif($vac->category == 2) <a href="#">{{__('app.IT_and_Engineering')}}</a>
                            @elseif($vac->category == 3) <a href="#">{{__('app.Education_or_Training')}}</a>
                            @elseif($vac->category == 4) <a href="#">{{__('app.Art_or_Design')}}</a>
                            @elseif($vac->category == 5) <a href="#">{{__('app.Sale_Markting')}}</a>
                            @elseif($vac->category == 6) <a href="#">{{__('app.Healthcare')}}</a>
                            @elseif($vac->category == 7) <a href="#">{{__('app.Science')}}</a>
                            @elseif($vac->category == 8) <a href="#">{{__('app.Food_Services')}}</a> @endif
                          </li>
                          <li><b>{{__('app.Job_type')}}:</b>
                            @if($vac->type == 1) {{__('app.Part_time')}}
                              @elseif($vac->type == 3) {{__('app.Remote')}}
                              @elseif($vac->type == 0) {{__('app.Intern')}}
                              @elseif($vac->type == 2) {{__('app.Full_time')}}
                              @endif
                            </li>
                          <li><b>{{__('app.Website')}}:</b> <a href="{{$vac->website}}" target="_blank">{{$vac->website}}</a> </li>
                        </ul>
                    </div>
                    <div class="widghet">
                        <h3>Share This Job</h3>
                        <div class="share-job">
                            <center><img style="height:200px;" src="data:image/png;base64,{{DNS2D::getBarcodePNG(Request::url(), 'QRCODE')}}" alt="barcode" /></center>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@include('layouts.similarjobs')
@if(Auth::check())
<script type="text/javascript">
function apply_job(){
  var op = "<option value='0' selected disabled>{{__('app.Choose_resume')}}</option>";
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
@else

@endif
@endsection
