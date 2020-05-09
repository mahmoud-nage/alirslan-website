<?php

namespace App\Http\Controllers\Web\News;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Setting;
use Carbon\Carbon;

class NewsController extends Controller
{
  /**
   * Show Newspage
   *
   * @return response
   */
  public function index($lang) {
     $setting=Setting::first();
    $news = News::where('type', 0)->orderBy('id', 'desc')->paginate(8);
    foreach ($news as $new) {
      $new->full_image = asset('public/uploads/' . $new->image);
      $new->image = asset('public/uploads/thumbs/' . $new->image);
      $new->ar_details = clean_limit($new->ar_details, 400);
    }

    return view('web.news.news', compact('news','setting'));
  }

  /**
   * Show news page by the given permalink
   *
   * @return response
   */
   public function new($lang, $permalink) {
     $news = News::where('type', 0)->where('permalink', $permalink)->first();

     if ($news) {
       $news->full_image = asset('public/uploads/' . $news->image);
       $news->image = asset('public/uploads/thumbs2/' . $news->image);
       $news->month = Carbon::parse($news->created_at)->format('M');
       $news->day = Carbon::parse($news->created_at)->day;

       $other_news = News::where('id', '!=', $news->id)->inRandomOrder()->limit(10)->get();
       foreach ($other_news as $n) {
         $n->image = asset('public/uploads/thumbs/' . $n->image);
         $n->ar_details = clean_limit($n->ar_details, 30);
       }
     }

     return $news ? view('web.news.new', compact('news', 'other_news')) : view('web.errors.notfound');
   }
}
