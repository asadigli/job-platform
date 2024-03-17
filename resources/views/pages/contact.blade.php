@extends('layouts.master')
@section('head')
<title>{{__('app.Contact')}} - eJob</title>
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
                        <h3>{{__('app.Contact')}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section id="contact" class="section">
        <div class="contact-form">
            <div class="container">
                <div class="row contact-form-area">
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="contact-block">
                            <h2>{{__('app.Contact_us')}}</h2>
                            <div id="loading"></div>
                                <div class="row" id="cont_form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" id="name" placeholder="{{__('app.Name')}}" autocomplete="off" required>
                                            <div class="help-block with-errors" id="nerror"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="email" placeholder="{{__('app.Email')}}..." id="email" class="form-control" autocomplete="off" required>
                                            <div class="help-block with-errors" id="eerror"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <input type="text" placeholder="{{__('app.Subject')}}..." id="msg_subject" class="form-control" autocomplete="off" required>
                                            <div class="help-block with-errors" id="serror"></div>
                                        </div>
                                        <div class="form-group">
                                            <textarea class="form-control" id="message" placeholder="{{__('app.Message')}}..." rows="5" required></textarea>
                                            <div class="help-block with-errors" id="merror"></div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                      <div class="submit-button">
                                          <button class="btn-add-res" id="contact_us_btn" type="submit">{{__('app.Send')}}</button>
                                          <div class="clearfix"></div>
                                      </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6 col-sm-12">
                        <div class="contact-right-area wow fadeIn">
                            <h2>{{__('app.Contact_address')}}</h2>
                            <div class="contact-info">
                                <div class="single-contact">
                                    <div class="contact-icon">
                                        <i class="lni-map-marker"></i>
                                    </div>
                                    <p>{{__('app.Baku_Azerbaijan')}}</p>
                                </div>
                                <div class="single-contact">
                                    <div class="contact-icon">
                                        <i class="lni-envelope"></i>
                                    </div>
                                    <p><a href="mailto:{{config('settings.contact_email')}}">{{__('app.Customer_Support')}}: {{config('settings.contact_email')}} </a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
