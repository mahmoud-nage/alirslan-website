@inject('categories', 'App\Category')
@extends('layouts.layout')
@section('title',  __('lang.articles') )
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
                        <li class="active">{{  __('lang.articles') }}</li>
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
            <div class="col-lg-8 col-md-8 col-sm-12 col-xs-12">
                <div class="blog-post">
            @isset($articles)
            @foreach($articles as $article) 
            <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12 pull-right">
        <!--Start single blog item-->
        <div class="single-blog-item wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">

                <div class="img-holder">
                    <img src="{{$article->image}}" alt="articles" style="height: 300px !important">
                    <div class="overlay-style-one"></div>
                    <div class="categories">
                    <a href="{{ route('articles', [$lang, 'category_id'=>$article->category->id]) }}">{{$article->category->ar_name}}</a>
                    </div> 
                </div>
                <div class="text-holder">
                    <ul class="meta-info">
                        <li>   
                            <a  href="{{ route('article', ['lang' => $lang, 'permalink' => $article->permalink]) }}">
                            <h3 class="text-right">{{$article->ar_title}}</h3>
                            </a>
                        </li>
                    </ul>
                    <div class="text">
                        <p>{{ str_replace ('&nbsp;' , ' ' , strip_tags (clean_limit($article->ar_details,200))) }} </p>
                    </div>
                </div>    
            </div>    
            </div>
            <!--End single blog item-->
            @endforeach
            @endisset
            <p>{!! $articles->links() !!}</p>
        </div>
            </div>
<!--End blog Single area--> 
            <!--Start sidebar Wrapper-->
            <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12 pull-right">
                <div class="sidebar-wrapper">
                    <!--Start single sidebar-->
                    <div class="single-sidebar wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                        <div class="sec-title" style="margin: 0 !important">
                        <h3>{{__('التصنيفات')}}</h3>
                        </div>
                        <ul class="categories clearfix">
                            @forelse($categories->where('parent', 0)->get() as $category)
                            <li><a href="{{ route('articles', [$lang, 'category_id'=>$category->id]) }}">{{$category->ar_name}}</a></li>
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