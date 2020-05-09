@inject('categories', 'App\Category')

@extends('layouts.layout')
@section('title',  __('lang.audios') )
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
                      <li class="active">{{__('lang.audio')}}</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</section>
<!--End breadcrumb bottom area-->

<!--Start blog Single area-->
<section id="blog-area" class="blog-large-area blog-single-area">
  <div class="container">
      <div class="row">
        <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
          <div class="blog-post">
          @isset($audios)
          @foreach($audios as $audio)
                  <!--Start single blog post-->
                  <div class="text-holder text-right" style="margin-bottom: 10px">
                    <h3 class="blog-title">{{ $audio->ar_title }}</h3>
                </div>   
                  <div class="single-blog-item wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                      <div class="img-holder">
                          <iframe allowtransparency="true" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url={{$audio->source}}&color=orange_white&show_artwork=false" style="width: 100%; height: 100%;"></iframe></div>
                          <div class="categories">
                              <a href="{{ route('audio', [$lang, 'category_id'=>$audio->category->id]) }}">{{$audio->category->ar_name}}</a>
                          </div> 
                      </div>
                      <hr>

                      @endforeach
                      @endisset 
                  </div>
                                      <!--Start post pagination-->
                                      <div class="row">
                                        <div class="col-md-12"> 
                                              {!! $audios->links() !!}
                                        </div> 
                                    </div>
                                    <!--End post pagination-->
              </div>

<!--End blog Single area--> 
          <!--Start sidebar Wrapper-->
          <div class="col-lg-4 col-md-6 col-sm-7 col-xs-12">
              <div class="sidebar-wrapper">
                  <!--Start single sidebar-->
                  <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                      <div class="sec-title" style="margin: 0 !important">
                      <h3>{{__('التصنيفات')}}</h3>
                      </div>
                      <ul class="categories clearfix">
                          @forelse($categories->where('parent', 2)->get() as $category)
                          <li><a href="{{ route('audios', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                        @empty
                        @endforelse
                      </ul>
                  </div>
                  <!--End single sidebar-->
      </div>
  </div>

      </div>
  </div>
</section> 

@endsection