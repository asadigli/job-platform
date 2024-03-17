@extends('layouts.master')
@section('head')
<meta name="keywords" content="">
<meta name="description" content="">
<title>E-Job</title>
@endsection
@section('body')
<header id="home" class="hero-area">
    @include('layouts.header')
    <div id="carousel-area">
        <div id="carousel-slider" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-slider" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-slider" data-slide-to="1"></li>
                <li data-target="#carousel-slider" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <div class="carousel-item active">
                    <img src="/img/slider/bg-1.jpg" alt="">
                    <div class="carousel-caption text-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 class="wow fadeInRight" data-wow-delay="0.4s">Find the career you <br> deserve</h2>
                                <p class="wow fadeInRight" data-wow-delay="0.6s">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                                    <br> Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
                                <a href="/jobs" class="btn btn-lg btn-common btn-effect wow fadeInRight">See our jobs</a>
                                <a href="/jobs" class="btn btn-lg btn-common btn-effect wow fadeInRight">Search jobs</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                <div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="/img/slider/img-1.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/slider/bg-1.jpg" alt="">
                    <div class="carousel-caption text-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 class="wow fadeInUp" data-wow-delay="0.4s">10000+ Jobs waiting <br>for you!</h2>
                                <p class="wow fadeInUp" data-wow-delay="0.6s">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                                    <br> Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
                                <a href="/jobs" class="btn btn-lg btn-common btn-effect wow fadeInUp" data-wow-delay="0.9s">See our jobs</a>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                <div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="/img/slider/img-2.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img src="/img/slider/bg-1.jpg" alt="">
                    <div class="carousel-caption text-left">
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
                                <h2 class="wow fadeInRight" data-wow-delay="0.4s">Post a job and hunt <br> amazing talents</h2>
                                <p class="wow fadeInRight" data-wow-delay="0.6s">Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum.
                                    <br> Vestibulum congue posuere lacus, id tincidunt nisi porta sit amet.</p>
                                @if(Auth::check())
                                <a href="/start/resume/personal-information" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">{{__('app.Create_resume')}}</a>
                                @else
                                <a href="/register" class="btn btn-lg btn-common btn-effect wow fadeInRight" data-wow-delay="0.9s">{{__('app.Register')}}</a>
                                @endif
                                @if(Auth::check())
                                  @if(Auth::user()->role_id == 1)
                                  <a href="/add-vacancy" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">{{__('app.Add_vacancy')}}</a>
                                  @else
                                  <a href="" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">{{__('app.Add_vacancy')}}</a>
                                  @endif
                                @else
                                <a href="/add-vacancy" class="btn btn-lg btn-border wow fadeInRight" data-wow-delay="1.2s">{{__('app.Add_vacancy')}}</a>
                                @endif
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-4 col-xs-12">
                                <div class="img-wrapper wow fadeInUp" data-wow-delay="0.6s">
                                    <img src="/img/slider/img-3.png" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#carousel-slider" role="button" data-slide="prev">
                <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-left"></i></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carousel-slider" role="button" data-slide="next">
                <span class="carousel-control" aria-hidden="true"><i class="lni-chevron-right"></i></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
</header>
<section id="featured" class="section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">{{__('app.Latest_vacancies')}}</h2>
            <!-- <p>As the world's #1 job site, with over 200 million unique visitors every month from over 60 different countries</p> -->
        </div>
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
            @if(count($vacs) > 24)
            <div class="col-12 text-center mt-4">
                <a href="/jobs" class="btn btn-common">{{__('app.Load_more')}}</a>
            </div>
            @endif
        </div>
        <div id="apply_popup" class="modal fade" role="dialog" success="{{__('app.Applied')}}"></div>
    </div>
</section>

<section class="mylist section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">Top Hiring Companies</h2>
            <!-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et -->
                <!-- <br> metus effici turac fringilla lorem facilisis.</p> -->
        </div>
        <div class=" wow fadeIn" data-wow-delay="0.5s">
            <div id="mscompanies" class="owl-carousel">
                @foreach($vacs = App\Vacancy::where('status',1)->get() as $vac)
                <div class="item">
                    <div class="product-item">
                        <div class="icon-thumb">
                            <img src="/img/product/img1.png" alt="">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><a href="#">{{$vac->company}}</a></h3>
                            <div class="tags">
                                <!-- <span><i class="lni-briefcase"></i> {{$vac->company}}</span> -->
                                <span><i class="lni-map-marker"></i> {{App\Locations::find($vac->location)->location_az}}</span>
                            </div>
                            <a href="#" class="btn btn-common">5 Open Job</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</section>
@if(2==4)
<section class="how-it-works section">
    <div class="container">
        <div class="section-header">
            <h2 class="section-title">How It Works?</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit ellentesque dignissim quam et
                <br> metus effici turac fringilla lorem facilisis.</p>
        </div>
        <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 ">
                <div class="work-process">
                    <span class="process-icon"><i class="lni-user"></i></span>
                    <h4><a href="#">Create an Account</a> </h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-2">
                    <span class="process-icon"><i class="lni-search"></i></span>
                    <h4><a href="#">Search Jobs</a></h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
                <div class="work-process step-3">
                    <span class="process-icon"><i class="lni-cup"></i></span>
                    <h4><a href="#">Apply</a></h4>
                    <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers find place best.</p>
                </div>
            </div>
        </div>
    </div>
</section>
@endif
@if(Auth::guest())
<div id="apply">
    <div class="container-fulid">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-xs-12 no-padding">
                <div class="recruiter item-box">
                    <div class="content-inner">
                        <h5>I'm</h5>
                        <h3>Recruiter</h3>
                        <p>Post a job to tell us about your project. We'll quickly match you with
                            <br> the right freelancers find place best.</p>
                        <a href="/add-vacancy" class="btn btn-border-filled">Post a Job</a>
                    </div>
                    <div class="img-thumb">
                        <i class="lni-users"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-xs-12 no-padding">
                <div class="jobseeker item-box">
                    <div class="content-inner">
                        <h5>I'm</h5>
                        <h3>Jobseeker!</h3>
                        <p>Post a job to tell us about your project. We'll quickly match you with
                            <br> the right freelancers find place best.</p>
                        <a href="/create-resume" class="btn btn-border-filled">Browser Jobs</a>
                    </div>
                    <div class="img-thumb">
                        <i class="lni-leaf"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
<section id="counter" class="section bg-gray">
    <div class="container">
        <div class="row">

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-home"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">{{App\Vacancy::all()->count()}}</span></h3>
                        <p>{{__('app.Jobs')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-briefcase"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">{{DB::table('vacancies')->distinct('company')->count('company')}}</span></h3>
                        <p>{{__('app.Companies')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-pencil-alt"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">{{App\Resume::all()->count()}}</span></h3>
                        <p>{{__('app.Resumes')}}</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-xs-12">
                <div class="counter-box">
                    <div class="icon"><i class="lni-save"></i></div>
                    <div class="fact-count">
                        <h3><span class="counter">{{App\Jobreq::all()->count()}}</span></h3>
                        <p>{{__('app.Applications')}}</p>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
@endsection
@section('foot')
@if(Auth::guest())

@else
<script type="text/javascript">
function apply_job(id){
  $("#apply_popup").html("<div class='modal-dialog'><div class='modal-content'><div class='modal-header'><h5>{{__('app.Apply')}}</h5><button type='button' class='close' data-dismiss='modal'>&times;</button></div><div class='modal-body'> <span id='loading'></span> <div class='form-group'><label class='control-label'>{{__('app.My_resume')}}</label><div class='search-category-container' id='res_id_for_apply'><label class='styled-select'><select class='dropdown-product selectpicker' id='disp_m_res' required></select></label></div></div></div><div class='modal-footer'><button type='button' class='btn btn-danger' data-dismiss='modal'>{{__('app.Close')}}</button><a class='btn btn-primary' onclick='apply_for_job("+id+")'>{{__('app.Apply')}}</a></div></div></div>");
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
@endif
@endsection
