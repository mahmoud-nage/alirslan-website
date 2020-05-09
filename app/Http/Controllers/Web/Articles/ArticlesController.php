<?php

namespace App\Http\Controllers\Web\articles;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Setting;
use App\Category;
use Carbon\Carbon;

class ArticlesController extends Controller
{
  /**
   * Show articlespage
   *
   * @return response
   */
  public function index($lang, Request $request) {

    $cat_name = null;
     $setting=Setting::first();
     if($request->has('category_id') && $request->category_id != null){
      $articles = News::where('type', 1)->orderBy('id', 'desc')->where('category_id', $request->category_id)->paginate(5);
      $cat_name = Category::where('id', $request->category_id)->pluck('ar_name')[0];
    }else{
       $articles = News::where('type', 1)->orderBy('id', 'desc')->paginate(5);
     }
    foreach ($articles as $article) {
      $article->full_image = asset('public/uploads/' . $article->image);
      $article->image = asset('public/uploads/thumbs2/' . $article->image);
      $article->ar_title = clean_limit($article->ar_title, 30);
      $article->ar_details = clean_limit($article->ar_details, 400);
    }

    return view('web.articles.articles', compact('articles','setting','cat_name'));
  }

  /**
   * Show articles page by the given permalink
   *
   * @return response
   */
   public function article($lang, $permalink) {
     $articles = News::where('type', 1)->where('permalink', $permalink)->first();

     if ($articles) {
       $articles->full_image = asset('public/uploads/' . $articles->image);
       $articles->image = asset('public/uploads/thumbs2/' . $articles->image);
       $articles->month = Carbon::parse($articles->created_at)->format('M');
       $articles->day = Carbon::parse($articles->created_at)->day;

       $other_articles = News::where('id', '!=', $articles->id)->inRandomOrder()->limit(10)->get();
       foreach ($other_articles as $n) {
         $n->image = asset('public/uploads/thumbs/' . $n->image);
         $n->ar_title = clean_limit($n->ar_title, 10);
         $n->ar_details = clean_limit($n->ar_details, 30);
       }
     }

     return $articles ? view('web.articles.article', compact('articles', 'other_articles')) : view('web.errors.notfound');
   }
}
