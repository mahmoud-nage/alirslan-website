@inject('news', 'App\News')
<!--Start service area-->
<section class="service-area">
    <div class="container">
        <div class="sec-title pull-right text-right"   style="margin: 0 !important">
            <h1>{{__('lang.news')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="servicecarousel">
            @foreach($news->orderBy('created_at', 'desc')->where('type',0)->take(4)->get() as $new)
                    <!--Start single item-->
                    <div class="single-service-item ">
                        <div class="img-holder">
                            <img width="100%" height="100%" src="{{ url('/public/uploads/thumbs').'/'.$new->image }}" alt="news">
                            <div class="content">
                                <div class="text-holder text-center" style="height: 100% !important">
                                    <div class="inner">
                                        <div class="inner-content">
                                            <h3 style="font-size:14px;">{{ $new->ar_title }}</h3>
                                            <p>{{ str_replace ('&nbsp;' , ' ' , strip_tags (clean_limit($new->ar_details,100))) }}</p>
                                            <a  class="thm-btn bgclr-1" href="{{ route('new', ['lang' => $lang, 'permalink' => $new->permalink]) }}">
                                            {{__('lang.read_more')}}
                                            </a>
                                            </div>
                                    </div>    
                                </div>
                                <div class="text-holder-1 text-center" style=" padding-top: 10px;">
                                    <div class="inner">
                                        <div class="inner-content">
                                                <h3  style="font-size:14px;">{{ $new->ar_title }}</h3>
                                        </div>
                                    </div>  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--End single item-->
                    @endforeach
                </div>
            </div>    
        </div>
    </div>
</section>
<!--End service area-->