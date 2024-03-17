<!doctype html>
<html lang="en">
<head>
<title>{{$res->full_name}}</title>
<meta charset="UTF-8">
<meta name="description" content="{{$res->full_name}}: {{$res->about_me}}">
<meta name="keywords" content="personal, vcard, portfolio">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta name="csrf-token" content="{{ csrf_token() }}">
<link rel="shortcut icon" type="image/x-icon" href="http://chittagongit.com/download/328250">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"/>
<link rel="stylesheet" href="/css/res.css">
</head>
<body style="background-image: url('/img/cv-background.jpg');">
<div id="preloader"><div class="spinner"></div></div>
<div class="wrapper top_60 container">
<div class="row">
<div class="col-lg-3 col-md-4">
    <div class="profile">
        <figure class="profile-image">
            <img src="/img/profile/{{App\User::find($res->user_id)->avatar}}" alt="{{$res->full_name}}">
        </figure>
        <div class="profile-name">
            <span class="name">{{$res->full_name}}</span><br>
            <span class="job">{{$res->title}}</span>
        </div>
        <ul class="profile-information">
            <li></li>
            <li><p><span>{{__('app.Name')}}:</span> {{$res->full_name}}</p></li>
            <li><p><span>{{__('app.Birthday')}}:</span> @php($user = App\User::find($res->user_id)) {{\Carbon\Carbon::parse($user->birthdate)->format('d M Y')}}</p></li>
            <li><p><span>{{__('app.Current_Job')}}:</span> {{__('app.None')}}</p></li>
            <li><p><span>{{__('app.Email')}}:</span> {{$res->email}}</p></li>
            <input type="hidden" id="official_email" value="{{$res->email}}">
            <li>
              @foreach($sns = App\Socnet::where('res_id',$res->id)->get() as $sn)
                <a class="scnet" href="{{$sn->link}}" target="_blank"><i class="{{$sn->icon}}" aria-hidden="true"></i></a>
              @endforeach
            </li>
        </ul>
        @if(!empty($res->resume))
        <div class="col-md-12">
            <button class="site-btn icon hmbtn">{{__('app.Download_Cv')}}<i class="fa fa-download" aria-hidden="true"></i></button>
        </div>
        @endif
    </div>
</div>
<div id="ajax-tab-container" class="col-lg-9 col-md-8 tab-container">
<div class="row">
    <header class="col-md-12">
        <nav>
            <div class="row">
                <div class="col-md-8 col-sm-8 col-xs-4">
                    <ul class="tabs">
                        <li class="tab">
                            <a class="home-btn" onclick="get_url(this.getAttribute('title'))" title="home"><i class="fa fa-home" aria-hidden="true"></i></a>
                        </li>
                        <li class="tab"><a title="contact" onclick="get_url(this.getAttribute('title'))" >{{__('app.Contact')}}</a></li>
                        @if(Auth::check())
                          @if($res->user_id == Auth::user()->id)
                          <li class="tab"><a href="/home" >{{__('app.Profile')}}</a></li>
                          @endif
                        @endif
                    </ul>
                </div>
                <div class="col-md-4 col-sm-4 col-xs-8 dynamic">
                    <a href="mailto:{{$res->email}}?subject={{__('app.Hire_From_eJob')}}" class="pull-right site-btn hmbtn hidden-xs">{{__('app.Hire_Me')}}</a>
                    <div class="hamburger pull-right hidden-lg hidden-md"><i class="fa fa-bars" aria-hidden="true"></i></div>
                </div>
            </div>
        </nav>
    </header>
    <div class="col-md-12">
        <div id="content" class="panel-container">
            <div id="home" style="display:none;">
                <div class="row">
                    <section class="about-me line col-md-12 padding_30 padbot_45">
                        <div class="section-title"><h2>{{__('app.About_me')}}</h2></div>
                        <p class="top_30">{{$res->about_me}}</p>
                    </section>
                </div>
                <div class="row">
                  <div class="section-title shead"><h2>{{__('app.Skills')}}</h2></div>
                  <div class="skills-list">
                    @foreach(App\Skill::where('res_id',$res->id)->get() as $skill)
                    <span class="skills" title="{{$skill->skill}}">{{$skill->skill}}</span>
                    @endforeach
                  </div>
                </div>
                @if(2==4)
                <div class="row">
                    <section class="services line col-md-12 padding_50 padbot_50">
                    <div class="section-title bottom_45"><span></span><h2>My Services</h2></div>
                    <div class="row">
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-038-house-6"></i>
                                </div>
                                <span class="title">Consultancy</span>
                                <p class="little-text">Gregor then turned to look out the window at the dull weather.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-035-contract-1"></i>
                                </div>
                                <span class="title">Contract</span>
                                <p class="little-text">A collection of textile samples lay spread out on the table.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-008-house-23"></i>
                                </div>
                                <span class="title">Detached House</span>
                                <p class="little-text">One morning, when Gregor Samsa woke from troubled dreams.</p>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="service">
                                <div class="icon">
                                    <i class="flaticon-015-building-2"></i>
                                </div>
                                <span class="title">Apartment</span>
                                <p class="little-text">His room, a proper human room although a little too small.</p>
                            </div>
                        </div>
                    </div>
                </section>
                </div>
                @endif
                <div class="row">
                    <section class="education">
                    <div class="section-title top_30"><h2>{{__('app.Resume')}}</h2></div>
                        <div class="row">
                            <div class="working-history col-md-6 padding_15 padbot_30">
                                <ul class="timeline col-md-12 top_30">
                                    <li><i class="fa fa-suitcase" aria-hidden="true"></i><h2 class="timeline-title">{{__('app.Working_History')}}</h2></li>
                                    @foreach($exps = App\Exp::where('res_id',$res->id)->get() as $exp)
                                    <li><h3 class="line-title">{{$exp->position}} - {{$exp->company}}</h3>
                                        <span>{{$exp->start_date}} - {{$exp->end_date}}</span>
                                        <p class="little-text">{{$exp->description}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="education-history col-md-6 padding_15 padbot_30">
                                <ul class="timeline col-md-12 top_30">
                                    <li><i class="fa fa-graduation-cap" aria-hidden="true"></i><h2 class="timeline-title">{{__('app.Education_History')}}</h2></li>
                                    @foreach($edus = App\Edu::where('res_id',$res->id)->get() as $edu)
                                    <li><h3 class="line-title">{{$edu->school}}</h3>
                                        <span>{{$edu->start_date}} - {{$edu->end_date}}</span>
                                        <p class="little-text">{{$res->description}}</p>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
            <div id="contact" style="display:none;">
                <div class="row">
                    <section class="contact-form col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>{{__('app.Contact')}}</h2></div>
                        <form class="site-form">
                          <div class="alert alert-success" id="mlsent" role="alert" style="display:none;">{{__('app.Message_sent_successfully')}}</div>
                            <div class="row">
                                <span id="loading"></span>
                                <div id="loadingcont">
                                  <div class="col-md-6">
                                      <input type="text" class="site-input" id="c_name" placeholder="{{__('app.Name')}}...">
                                  </div>
                                  <div class="col-md-6">
                                      <input type="email" class="site-input" id="c_email" placeholder="{{__('app.Email')}}...">
                                  </div>
                                  <div class="col-md-12">
                                      <textarea class="site-area" id="c_body" placeholder="{{__('app.Message')}}..." maxlength="500"></textarea>
                                  </div>
                                </div>
                                <div class="col-md-12 top_15 bottom_30">
                                    <button class="site-btn" type="button" onclick="sendmess()">{{__('app.Send')}}</button>
                                </div>
                            </div>
                        </form>
                    </section>
                    <section class="contact-info col-md-6 padding_30 padbot_45">
                        <div class="section-title top_15 bottom_30"><span></span><h2>Contact Informations</h2></div>
                        <ul>
                            <li><span>{{__('app.Phone')}}:</span> {{$res->phone_number}}</li>
                            <li><span>{{__('app.Email')}}:</span> {{$res->email}}</li>
                            <li>
                                <div class="social-icons top_15">
                                  @foreach($sns = App\Socnet::where('res_id',$res->id)->get() as $sn)
                                    <a class="scnet" href="{{$sn->link}}" target="_blank"><i class="{{$sn->icon}}" aria-hidden="true"></i></a>
                                  @endforeach
                                </div>
                            </li>
                        </ul>
                    </section>
                </div>
            </div>
        </div>
     </div>
</div>
<footer>
    <div class="footer col-md-12 top_30 bottom_30">
        <div class="name col-md-4 hidden-md hidden-sm hidden-xs">{{__('app.Online_Resume')}}</div>
        <div class="copyright col-lg-8 col-md-12">&#9400;	 {{date('Y')}} <a href="/"> eJob</a> </div>
    </div>
</footer>

</div>
</div>
</div>
<script src="/js/res.js"></script>
</body>
</html>
