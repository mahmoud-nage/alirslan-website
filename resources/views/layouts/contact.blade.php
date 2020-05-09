
<!--Start consultations area-->
<section class="consultations-area" style="background-image:url({{url('/public/web/template')}}/images/resources/consultation-bg.jpg);">
    <div class="container wow zoomIn" data-wow-delay="100ms" data-wow-duration="900ms">
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