@extends('layouts.master')
@section('head')
<title>{{__('app.Create_resume')}}</title>
<link rel="stylesheet" href="/css/select2.css">
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
                    <h3>Create Resume</h3>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-9 col-md-12 col-xs-12">
                <div class="post-job box">
                    <form method="POST" action="/create-resume" class="form-ad">
                      @csrf
                        @include('layouts.alerts')
                          <h4>{{__('app.Information')}}</h4>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Name')}}</label>
                              <input type="text" class="form-control" name="full_name" value="{{Auth::user()->name}} {{Auth::user()->surname}}" placeholder="{{__('app.Name')}}..." required>
                              @error('full_name')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Email')}}</label>
                              <input type="text" class="form-control" name="official_email" value="{{Auth::user()->email}}" placeholder="{{__('app.Email')}}..." required>
                              @error('official_email')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Profession_title')}}</label>
                              <input type="text" class="form-control" name="title" placeholder="{{__('app.Profession_title')}}..." required>
                              @error('title')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                            <label class="control-label">{{__('app.Location')}}</label>
                              <div class="search-category-container">
                                <label class="styled-select">
                                  <select class="dropdown-product selectpicker" name="location" id="location">
                                    @foreach($locs = App\Locations::all() as $loc)
                                    <option value="{{$loc->id}}">{{$loc->location_az}}</option>
                                    @endforeach
                                  </select>
                                </label>
                              </div>
                              @error('location')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Personal_website')}} ({{__('app.optional')}})</label>
                              <input type="text" class="form-control" name="website" value="http://" placeholder="{{__('app.Personal_website')}}...">
                              @error('website')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Contact_number')}}</label>
                              <input type="text" class="form-control" id="phoneNumber" name="phone_number" placeholder="{{__('app.Contact_number')}}...">
                              @error('phone_number')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.About_me')}}</label>
                              <textarea name="about" rows="8" class="form-control" placeholder="{{__('app.About_me')}}..." required></textarea>
                              @error('about')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                          <div class="form-group">
                              <label class="control-label">{{__('app.Age')}}</label>
                              <input type="text" class="form-control" value="{{\Carbon\Carbon::parse(Auth::user()->birthdate)->age}}" disabled>
                          </div>
                          <div class="divider"><h4>{{__('app.Skills')}}</h4></div>
                          <div class="form-group">
                            <label class="control-label">{{__('app.Add_skill')}}</label>
                            <div class="search-category-container">
                                <label class="styled-select">
                                  <select class="dropdown-product selectpicker select2" name="skills[]" multiple="multiple" data-placeholder="{{__('app.Skills')}}...">
                                    <option value="php">PHP</option>
                                    <option value="laravel">Laravel</option>
                                    <option value="javascript">Javascript</option>
                                    <option value="css">CSS</option>
                                    <option value="html">HTML</option>
                                    <option value="bpmn">BPMN</option>
                                    <option value="mysql">MySQL</option>
                                    @foreach($skills = App\Skill::all() as $skill)
                                    <option value="{{$skill->skill}}">{{$skill->skill}}</option>
                                    @endforeach
                                  </select>
                                </label>
                              </div>
                              @error('skills')
                                <span class="warning-text" role="alert">{{ $message }} </span>
                              @enderror
                          </div>
                        <div class="pull-right">
                          <button type="submit" class="btn btn-common">{{__('app.Next')}} <i class="fa fa-chevron-right"></i> </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('foot')
<script src="/js/select2.full.min.js"></script>
<script src="https://rawgit.com/RobinHerbots/jquery.inputmask/3.x/dist/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">
$(function () {
  $('.select2').select2()
})
$('#phoneNumber').inputmask("(+999) 99 999-99-99");
</script>
@endsection
