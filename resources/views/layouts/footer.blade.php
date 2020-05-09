@inject('categories', 'App\Category')

<!--Start footer area-->  
<footer class="footer-area">
    <div class="container">
        <div class="row">
           
            <!--Start single footer widget-->
            <div class="col-lg-9 col-md-6 col-sm-6 col-xs-12" style="padding: 0 100px">
                <div class="single-footer-widget pd-bottom50">
                    <div class="title">
                    <h3>{{__('التصنيفات')}}</h3>
                        <span class="border"></span>
                    </div>
                    <hr>
                    @if($categories->count()>0)
                    <div class="row">
                    <ul class="usefull-links col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="title">{{__('lang.video')}}</h3>
                        @foreach($categories->where('parent', 1)->take(5)->get() as $category)
                        <li><a href="{{ route('videos', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                        @endforeach
                    </ul>
                    <ul class="usefull-links col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="title">{{__('lang.audio')}}</h3>
                        @forelse($categories->where('parent', 2)->take(5)->get() as $category)
                        <li><a href="{{ route('audios', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                      @empty
                      @endforelse
                    </ul>
                    <ul class="usefull-links col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="title">{{__('lang.articles')}}</h3>
                        @forelse($categories->where('parent', 0)->take(5)->get() as $category)
                        <li><a href="{{ route('articles', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                      @empty
                      @endforelse
                    </ul>
                    <ul class="usefull-links col-lg-3 col-md-6 col-sm-6 col-xs-6">
                        <h3 class="title">{{__('lang.general')}}</h3>
                        <li><a href="{{ route('home', $lang) }}">{{ __('lang.home') }} </a></li>
                        <li><a href="{{ route('news', ['lang' => $lang]) }}">{{ __('lang.news') }}</a>   </li>
                        <li><a href="{{ route('contact', ['lang' => $lang]) }}"> {{ __('lang.contact') }} </a></li>
                    </ul>
                    </div>
                    @endif
                </div>
            </div>
            <!--End single footer widget-->
             <!--Start single footer widget-->
             <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                <div class="single-footer-widget martop-minus pd-bottom50">
                    <div class="footer-logo">
                        <a href="{{ route('home', $lang) }}">
                            <img src="{{url('/public/web/template')}}/images/footer/footer-logo.jpeg" alt="Awesome Footer Logo">
                        </a>
                    </div>
                    <div class="our-info">
                        <p>{{ str_replace ('&nbsp;' , ' ' , strip_tags (clean_limit($setting->about_us,186))) }}</p>
                    </div>
                    <hr>
                    <div class="footer-bottom-area" style="background: none">
                    <ul class="footer-social-links">
                                    <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                                    <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="{{$setting->soundcloud}}"><i class="fa fa-soundcloud"></i></a></li>
                                    <li><a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                                </ul>
                            </div>
                </div>
            </div>
            <!--End single footer widget-->


        </div>
    </div>
</footer>   
<!--End footer area-->

<!--Start footer bottom area-->
<section class="footer-bottom-area">
    <div class="container">
        <div class="row">
     
            <div class="col-md-12">
                <div class="copyright-text text-center">
                    <p>copyright &copy; 2020 <a href="https://www.td.com.eg">Typical Design </a>. all right reserved</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End footer bottom area-->

</div>

<!--Scroll to top-->
<div class="scroll-to-top scroll-to-target" data-target="html"><span class="fa fa-chevron-circle-up"></span></div>
