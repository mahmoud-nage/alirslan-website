@inject('categories', 'App\Category')


<!--Start top bar area-->
<section class="top-bar-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-7 col-md-6 col-sm-12 col-xs-12 pull-right">
                <div class="top-left">
                    <ul class="top-contact-info">
                    <li><span class="flaticon-technology"></span>{{$setting->phone}}</li>    
                        <li><span class="flaticon-note"></span>{{$setting->email}}</li>     
                    </ul>   
                </div>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-12 col-xs-12">
                <div class="top-right clearfix">
                    <ul class="social-links">
                        <li><a href="{{$setting->facebook}}"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="{{$setting->instagram}}"><i class="fa fa-instagram"></i></a></li>
                        <li><a href="{{$setting->twitter}}"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="{{$setting->soundcloud}}"><i class="fa fa-soundcloud"></i></a></li>
                        <li><a href="{{$setting->youtube}}"><i class="fa fa-youtube"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</section>
<!--End top bar area-->


<!--Start mainmenu area-->
<section class="mainmenu-area stricky">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 clearfix">
                <!--Start logo-->
                <div class="logo pull-left">
                    <a href="{{ route('home', $lang) }}">
                        <img src="{{url('/public/web/template')}}/images/resources/logo.png" alt="Awesome Logo">
                    </a>
                </div>
                <!--End logo-->
                <!--Start mainmenu-->
                <nav class="main-menu">
                    <div class="navbar-header">   	
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                    </div>
                    <div class="navbar-collapse collapse clearfix">
                        <ul class="navigation clearfix">
                                <li class="current"><a href="{{ route('home', $lang) }}">{{ __('lang.home') }} </a></li>

                            <li><a href="{{route('about', $lang)}}">{{ __('lang.about') }}</a><li>

                                <li class="dropdown text-r"><a href="javascript:void(0);">{{ __('lang.video') }}<i class="fa fa-angle-down"></i></a></a>
                                    <ul class="sub_menu">
                                          @forelse($categories->where('parent', 1)->get() as $category)
                                            <li><a href="{{ route('videos', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                                          @empty
                                          @endforelse
                                    </ul>
                                </li>

                                <li class="dropdown text-r"><a href="javascript:void(0);">{{ __('lang.audio') }}<i class="fa fa-angle-down"></i></a></a>
                                    <ul class="sub_menu">
                                          @forelse($categories->where('parent', 2)->get() as $category)
                                            <li><a href="{{ route('audios', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                                          @empty
                                          @endforelse
                                    </ul>
                                </li>
                                </li>

                                <li class="dropdown text-r"><a href="javascript:void(0);">{{ __('lang.articles') }}<i class="fa fa-angle-down"></i></a></a>
                                    <ul class="sub_menu">
                                          @forelse($categories->where('parent', 0)->get() as $category)
                                            <li><a href="{{ route('articles', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                                          @empty
                                          @endforelse
                                    </ul>
                                </li>
                                </li>

                                <li><a href="{{ route('news', ['lang' => $lang]) }}">{{ __('lang.news') }}</a>   </li>
                                <li><a href="{{ route('contact', ['lang' => $lang]) }}"> {{ __('lang.contact') }} </a></li>
                            </ul>
                    </div>
                </nav>
                <!--End mainmenu-->
            </div>   
        </div>
    </div>
</section>
<!--End mainmenu area-->
