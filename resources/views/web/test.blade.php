@php
    session_start();
@endphp
@extends('layouts.layout')

@section('title',  __('lang.videos') )
@section('meta')
  <meta name="description" content="{{ $setting->description}}">
  <meta name="keywords" content="{{ $setting->keywords }}">
  <meta property="og:description" content="{{ $setting->description}}"/>
@endsection

@section('content')
@php
    $path = "18714558741586029672.mp4";
    $sid = session_id();
    $hash = md5($path.$sid);
    $_SESSION[$hash] = $path;
    var_dump($path,$sid,$hash);
@endphp

<div class="row container" style="margin-right: 0px !important;margin-left: 0px !important;">
    <video width="320" height="240" controls>
    <source src="{{url('/public').'/video.php?video='.$hash}}" type="video/mp4"><br>
    <source src="{{url('/public/uploads').'/'.$_SESSION[$hash]}}" type="video/mp4"><br>
      Your browser does not support the video tag.
      </video>

      <object data="{{url('/public').'/video.php?video='.$hash}}" type="video/mp4"></object>
</div>
    
@endsection