@inject('categories', 'App\Category')
@extends('layouts.layout')
@section('title')
{{ $articles->ar_title }}
@endsection
@section('meta')
 <meta name="description" content="{{ $articles->description }}">
 <meta name="keywords" content="{{ $articles->keywords }}">
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
@endsection

@section('js')

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
                        <li class="active">{{ $articles->ar_title }}</li>
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
                    <!--Start single blog post-->
                    <div class="single-blog-item">
                        <div class="img-holder">
                            <img height="420px" src="{{ $articles->full_image }}" alt="{{$articles->ar_title}}">
                            <div class="categories">
                                <a href="{{ route('articles', [$lang, 'category_id'=>$articles->category->id]) }}">{{$articles->category->ar_name}}</a>
                            </div> 
                        </div>
                        <div class="text-holder">
                            <ul class="meta-info">
                                <li><a href="#">{{ $articles->created_at }}</a></li>
                                <li><a href="#">Ali Raslan</a></li>
                            </ul>
                            <hr>
                            <h3 class="blog-title">{{ $articles->ar_title }}</h3>
                            <div class="text">
                                <p>{!! $articles->ar_details !!}</p>
                            </div>
                        </div>    
                    </div>
                </div></div>
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
