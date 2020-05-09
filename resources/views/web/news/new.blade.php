@extends('layouts.layout')
@section('title')
{{ $news->ar_title }}
@endsection
@section('meta')
 <meta name="description" content="{{ $news->description }}">
 <meta name="keywords" content="{{ $news->keywords }}">
@endsection


@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.css">
<style type="text/css">
  .new_one{
  font-size: 17px !important;
}
</style>
@endsection

@section('js')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.3.5/jquery.fancybox.min.js"></script>
<script>
$(document).ready(function() {
  $(".fancybox").fancybox();
});
</script>
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
                      <li class="active">{{ $news->ar_title }}</li>
                  </ul>
              </div>
          </div>
      </div>
  </div>
</section>
<!--End breadcrumb bottom area-->

<!--Start blog Single area-->
<section id="blog-area" class="blog-large-area blog-single-area ">
  <div class="container">
      <div class="row">
          <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>
          <div class="col-lg-8 col-md-12 col-sm-12 col-xs-12">
              <div class="blog-post">
                  <!--Start single blog post-->
                  <div class="single-blog-item">
                      <div class="img-holder">
                          <img height="420px" src="{{ $news->image }}" alt="{{$news->ar_title}}">
                      </div>
                      <div class="text-holder">
                          <ul class="meta-info">
                              <li><a href="#">{{ $news->created_at }}</a></li>
                              <li><a href="#">Ali Raslan</a></li>
                          </ul>
                          <hr>
                          <h3 class="blog-title">{{ $news->ar_title }}</h3>
                          <div class="text">
                              <p>{!! $news->ar_details !!}</p>
                          </div>
                      </div>    
                  </div>
              </div></div>
          <div class="col-lg-2 col-md-12 col-sm-12 col-xs-12"></div>

<!--End blog Single area--> 
      </div>
  </div>
</section> 
@endsection
