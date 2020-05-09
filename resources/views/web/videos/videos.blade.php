
@inject('categories', 'App\Category')

@extends('layouts.layout')
@section('title',  __('lang.videos') )
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
                        <li class="active">{{__('lang.video')}}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
  </section>
  <!--End breadcrumb bottom area-->
  
  <!--Start blog Single area-->
  <section id="blog-area" class="blog-large-area  blog-single-area">
    <div class="container">
        <div class="row">
          <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
            <div class="blog-post">
            @isset($videos)
            @foreach($videos as $video)
                      <!--Start single blog post-->
                    <div class="text-holder text-right" style="margin-bottom: 10px">
                      <h3 class="blog-title">{{ $video->ar_title }}</h3>
                  </div>   
                    <div class="single-blog-item wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="img-holder" style="height: 400px">
                          @php 
                          if(strlen($video->source) > 11)
                          {
                            if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->source, $match))
                              {
                                 $link=  $match[1].'?author=TypicalDesign&rel=0';
                                          
                                         echo '
                                         <iframe height="100%" width="100%" src="https://www.youtube.com/embed/'.$link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                 ';
                              }   
                            
                             else {
                                 echo " Wrong Link ";
                              }
                         
                         }
                          
                 @endphp
                        </div>
                    </div>
                    <hr>
                    @endforeach
                    @endisset 
                  </div>
              </div>

  
  <!--End blog Single area--> 
            <!--Start sidebar Wrapper-->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                <div class="sidebar-wrapper">
                    <!--Start single sidebar-->
                    <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="sec-title" style="margin: 0 !important">
                        <h3>{{__('التصنيفات')}}</h3>
                        </div>
                        <ul class="categories clearfix">
                            @forelse($categories->where('parent', 1)->get() as $category)
                            <li><a href="{{ route('videos', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
                          @empty
                          @endforelse
                        </ul>
                    </div>
                    <!--End single sidebar-->
        </div>
    </div>
  
        </div>
                                                <!--Start post pagination-->
                                                <div class="row">
                                                  <div class="col-md-12"> 
                                                        {!! $videos->links() !!}
                                                  </div> 
                                              </div>
                                              <!--End post pagination-->
    </div>
  </section> 

@endsection