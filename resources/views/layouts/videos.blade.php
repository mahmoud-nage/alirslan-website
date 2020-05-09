@inject('videos', 'App\Media')
<!--Start service area-->
<section class="service-area">
    <div class="container">
<div class="sec-title">
        <h1>{{__('lang.video')}}</h1>
        </div>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <!--Start single item-->
                    @foreach($videos->orderBy('created_at', 'desc')->where('type',0)->take(1)->get() as $video)
                    <div class="single-service-item" style="min-height: 530px;">
                        <div class="img-holder">
                                       @php 
                                      if(strlen($video->source) > 11)
                                      {
                                        if (preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $video->source, $match))
                                          {
                                             $link=  $match[1].'?author=TypicalDesign&rel=0';
                                                      
                                                     echo '
                                                     <iframe height="500px" width="100%" src="https://www.youtube.com/embed/'.$link.'" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                                             ';
                                          }   
                                        
                                         else {
                                             echo " Wrong Link ";
                                          }
                                     
                                     }
                                      
                             @endphp
                        </div>
                                        <a class="thm-btn pull-right" href="{{ route('video', ['lang' => $lang, 'permalink' => $video->permalink]) }}">
                                            <h3 class="text-right" style="color: #2acb35">{{ $video->ar_title }}</h3>
                                       </a>

                        </div>
                    </div>
                    @endforeach

            </div>    
        </div>
    </div>
</section>
<!--End service area--> 
    