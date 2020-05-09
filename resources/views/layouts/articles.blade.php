@inject('articles', 'App\News')
@inject('categories', 'App\Category')
<!--Start latest blog area-->  
<section class="latest-blog-area sec-padding" style="background-color: #f5f4f3 !important">
    <div class="container">
        <div class="sec-title text-center">
            <h3>{{__('lang.articles')}} </h3>
        </div>
        <div class="row">
            @foreach($articles->orderBy('created_at', 'desc')->where('type',1)->take(3)->get() as $article) 
                <div class="col-lg-4 col-md-6 col-sm-12 col-xs-12 pull-right">
            <!--Start single blog item-->
                <div class="single-blog-item">
                    <div class="img-holder">
                        <img src="{{ url('/public/uploads/thumbs').'/'.$article->image}}" alt="articles">
                        <div class="overlay-style-one"></div>
                        <div class="categories">
                        <a href="{{ route('articles', [$lang, 'category_id'=>$article->category->id]) }}">{{$article->category->ar_name}}</a>
                        </div> 
                    </div>
                    <div class="text-holder">
                        <ul class="meta-info">
                            <li>   
                                <a href="{{ route('article', ['lang' => $lang, 'permalink' => $article->permalink]) }}">
                                <h3 class="blog-title">{{$article->ar_title}}</h3>
                                </a>
                            </li>
                        </ul>
                        <div class="text">
                            <p>{{ str_replace ('&nbsp;' , ' ' , strip_tags (clean_limit($article->ar_details,200))) }} </p>
                        </div>
                    </div>    
                </div>    
                <!--End single blog item-->
            </div>
                @endforeach
        </div>
    </div>
</section>
<!--End latest blog area-->