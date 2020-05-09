@extends('layouts.layout')

@section('title',  __('lang.news') )
@section('meta')
  <meta name="description" content="{{ $setting->description}}">
  <meta name="keywords" content="{{ $setting->keywords }}">
  <meta property="og:description" content="{{ $setting->description}}"/>

 
@endsection

@section('content')
      <!--Start breadcrumb bottom area-->     
      <section class="breadcrumb-bottom-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="left pull-right">
                        <ul style="direction: rtl">
                        <li><a href="{{ route('home', $lang) }}">{{__('lang.home')}}</a></li>
                            <li><i class="fa fa-angle-left" aria-hidden="true"></i></li>
                            <li class="active">{{__('lang.news')}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
      </section>
      <!--End breadcrumb bottom area-->

<!--Start service area-->
<section class="service-page-area">
    <div class="container">
        <div class="row">
            @foreach($news as $new)
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 pull-right">
                    <!--Start single item-->
                    <div class="single-service-item ">
                        <div class="img-holder">
                            <img width="100%" height="100%" src="{{$new->image}}" alt="news">
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
                </div>    
                    <!--End single item-->
                    @endforeach
                </div>
                <p>{{$news->links()}}</p>
    </div>
</section>
<!--End service area-->

@endsection