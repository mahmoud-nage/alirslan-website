@extends('layouts.layout')

@section('title', 'السيره الذاتيه')

@section('meta')
  <meta name="description" content="السيره الذاتيه">
  <meta name="keywords" content="السيره الذاتيه">
@endsection

@section('content')
      <!--Start call to action area-->
<section class="callto-action-area sec-padding">
    <div class="container">
        <div class="row">
            <div class="col-md-5 pull-right">
                <div class="img-holder wow slideInRight text-center">
                <img src="{{url('/public/web/template')}}/images/resources/callto-action.png" alt="Awesome Image">
                </div>
            </div> 
            <div class="col-md-7 pull-left">
                <div class="text-holder">
                    <div class="sec-title">
                    <h3  style="margin: -40px 0 30px 0 !important;">{{__('السيره الذاتيه')}}</h3>
                        <p>{!!$setting->about_us!!}</p>
                     </div> 
                </div>
            </div> 
  
        </div>
    </div>
</section>
<!--End call to action area-->
@endsection
