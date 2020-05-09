@inject('categories', 'App\Category')
@inject('media', 'App\Media')
  
<!--Start choosing area-->
<section class="choosing-area" style="width:100%">
    <div class="container">
        <div class="sec-title text-center">
            <h1>{{__('lang.audio')}}</h1>
        </div>
        <div class="row">
            @forelse($categories->where('parent', 2)->orderBy('created_at', 'desc')->get() as $category)
            @if($category->media->count() > 0)
            <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-right">
            <!--Start single item-->
                <div class="single-item">
                    <div class="title text-right">
                        <a href="{{ route('audios', [$lang, 'category_id'=>$category->id]) }}"><h3>{{$category->ar_name}}</h3></a>
                    </div> 
                    <div class="text-holder row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            @forelse($category->media()->orderBy('id', 'desc')->take(2)->get() as $audio)
                            <div class="wow fadeInUp" data-wow-delay="0s" data-wow-duration="1s" data-wow-offset="0">
                                    <iframe allowtransparency="true" scrolling="no" frameborder="no" src="https://w.soundcloud.com/player/?url={{$audio->source}}&color=orange_white&show_artwork=false" style="width: 100%; height: 80%;"></iframe>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>   
                </div>
                @endif
                <!--End single item-->
                @empty
                @endforelse
            </div>
        </div>
    </div>
</section>
<!--End choosing area-->