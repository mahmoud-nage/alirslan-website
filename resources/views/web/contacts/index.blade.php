@extends('layouts.layout')
@section('meta')
  <meta name="description" content="{{ $setting->description}}">
  <meta name="keywords" content="{{ $setting->keywords }}">

  <meta property="og:title" content="الرئيسية"/>
  <meta property="og:description" content="{{ $setting->description}}"/>

  <meta name="author" content="Typical Design">
@endsection

@section('js')
@endsection

@section('content')

<!--Start consultations area-->
<section class="consultations-area">
    <div class="container wow zoomIn">
        <div class="sec-title text-center">
        <h3>{{__('lang.contact')}}</h3>
            <h1>{{ __('lang.interested_discussing') }}</h1>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="inner-content">
                    <div class="row">
                        <div class="col-lg-8 col-md-7 col-sm-12 col-xs-12">
                            <div class="consultations-form-box">
                                <form id="consultations-form" name="consultations-form" method="POST"  action="{{ route('send', $lang) }}">
                                    <div class="row">
                                        <div class="col-md-6">
                                                @csrf
                                                          <input name="name" placeholder="{{ __('lang.name') }} *" type="text" required="">    
                                                          <input name="email" placeholder="{{ __('lang.email') }} *" type="email" required="">    
                                                      </div> 
                                                      <div class="col-md-6">
                                                        <textarea required="" placeholder="{{ __('lang.details') }} *" name="details"  class="form-control2" ></textarea>     
                                                    </div>
                                                
                                                  </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <button class="thm-btn bgclr-1" type="submit">{{ __('lang.send') }}</button>   
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-5 col-sm-12 col-xs-12">  

                            <div class="contact-info">
                                <div class="footer-bottom-area" style="background: none; height: 168px; margin-top: -50px;">
                                    <ul class="footer-social-links">
                                                    <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                                    <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                                    <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                                    <li><a href="{{$setting->soundcloud}}"><i class="fa fa-soundcloud"></i></a></li>
                                                    <li><a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                                </ul>
                                            </div> 
                                <h2></h2>
                                <ul class="footer-contact-info">
                                    <li>
                                        <div class="icon-holder">
                                            <span class="flaticon-arrows"></span>
                                        </div>
                                        <div class="text-holder">
                                            <h5> {{ $setting->address_ar }}</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-holder">
                                            <span class="flaticon-technology"></span>
                                        </div>
                                        <div class="text-holder">
                                            <h5> {{$setting->phone}}</h5>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="icon-holder">
                                            <span class="flaticon-note"></span>
                                        </div>
                                        <div class="text-holder">
                                            <h5>{{$setting->email}}</h5>
                                        </div>
                                    </li>

                                </ul>
                            </div>

                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End consultations area-->  
@endsection
