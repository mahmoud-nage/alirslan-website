
@inject('banners', 'App\Banner')

<!--Start rev slider wrapper-->     
<section class="rev_slider_wrapper ">
    <div id="slider1" class="rev_slider"  data-version="5.0">
        <ul>
            @foreach ($banners->all() as $banner)
            @if($loop->iteration % 2 ==0)
            <li data-transition="rs-20">
                <img src="{{url('/public/uploads').'/'.$banner->image}}"  alt="" width="100%" height="100%" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1">
                <div class="tp-caption tp-resizeme"
                    data-x="right" data-hoffset="0" 
                    data-y="top" data-voffset="160" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"  
                    data-start="500">
                </div>
                <div class="tp-caption  tp-resizeme" 
                    data-x="right" data-hoffset="0" 
                    data-y="top" data-voffset="215" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="1500">
                    <div class="slide-content-box mar-lft">
                        <h1>{{$banner->ar_title}}</h1>
                        <p>{{ str_replace ('&nbsp;' , ' ' , strip_tags (clean_limit($banner->ar_description,100))) }} </p>
                    </div>
                </div>
                <div class="tp-caption tp-resizeme" 
                    data-x="right" data-hoffset="0" 
                    data-y="top" data-voffset="350" 
                    data-transform_idle="o:1;"                         
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                    data-splitin="none" 
                    data-splitout="none" 
                    data-responsive_offset="on"
                    data-start="2500">
                    <div class="slide-content-box mar-lft">
                        <div class="button">
                            <a class="" href="{{route('about', $lang)}}">{{__('lang.read_more')}}</a>     
                            <a class="btn-style-two" href="{{ route('contact', ['lang' => $lang]) }}"> {{ __('lang.contact') }}</a>     
                        </div>
                    </div>
                </div>
            </li>
            @else
            <li data-transition="fade">
                <img src="{{url('/public/uploads').'/'.$banner->image}}" alt="" width="1920" height="500" data-bgposition="top center" data-bgfit="cover" data-bgrepeat="no-repeat" data-bgparallax="1" >
                
                <div class="tp-caption tp-resizeme"
                    data-x="center" data-hoffset="0" 
                    data-y="center" data-voffset="135" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"  
                    data-start="500">
                </div>
                <div class="tp-caption  tp-resizeme" 
                    data-x="center" data-hoffset="0" 
                    data-y="center" data-voffset="-35" 
                    data-transform_idle="o:1;"         
                    data-transform_in="x:[-175%];y:0px;z:0;rX:0;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0.01;s:3000;e:Power3.easeOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;" 
                    data-mask_in="x:[100%];y:0;s:inherit;e:inherit;" 
                    data-splitin="none" 
                    data-splitout="none"
                    data-responsive_offset="on"
                    data-start="1500">
                    <div class="slide-content-box middle-slide">
                        <h1>{{$banner->ar_title}}</h1>
                        <p>{{ str_replace ('&nbsp;' , ' ' , strip_tags (clean_limit($banner->ar_description,400))) }} </p>
                    </div>
                </div>
                <div class="tp-caption tp-resizeme" 
                    data-x="center" data-hoffset="0" 
                    data-y="center" data-voffset="90" 
                    data-transform_idle="o:1;"                         
                    data-transform_in="y:[100%];z:0;rX:0deg;rY:0;rZ:0;sX:1;sY:1;skX:0;skY:0;opacity:0;s:2000;e:Power4.easeInOut;" 
                    data-transform_out="s:1000;e:Power3.easeInOut;s:1000;e:Power3.easeInOut;"                     
                    data-splitin="none" 
                    data-splitout="none" 
                    data-responsive_offset="on"
                    data-start="2300">
                    <div class="slide-content-box middle-slide">
                        <div class="button">
                            <a class="btn-style-two" href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a>
                            <a class="btn-style-two" href="{{$setting->soundcloud}}"><i class="fa fa-soundcloud"></i></a>
                            <a class="btn-style-two" href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a>
                            <a class="btn-style-two" href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a>
                            <a class="btn-style-two" href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a>
                        </div>    
                    </div>
                </div>
            </li>
            @endif
            @endforeach
        </ul>
    </div>
</section>
<!--End rev slider wrapper-->