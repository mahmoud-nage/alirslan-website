<?php

namespace App\Http\Controllers\Web\video;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use App\Setting;
use App\Category;
use Carbon\Carbon;

class VideoController extends Controller
{
  /**
   * Show videospage
   *
   * @return response
   */
  public function index($lang, Request $request) {
    $cat_name = null;
     $setting=Setting::first();
     if($request->has('category_id') && $request->category_id != null){
      $videos = Media::where('type', 0)->orderBy('id', 'desc')->where('category_id', $request->category_id)->paginate(6);
      $cat_name = Category::where('id', $request->category_id)->pluck('ar_name')[0];
    }else{
     $videos = Media::where('type', 0)->orderBy('id', 'desc')->paginate(6);
    }
    foreach ($videos as $video) {
      $video->ar_title = clean_limit($video->ar_title, 30);
    }

    return view('web.videos.videos', compact('videos','setting', 'cat_name'));
  }

  /**
   * Show videos page by the given permalink
   *
   * @return response
   */
   public function video($lang, $permalink) {
     $videos = Media::where('type', 0)->where('permalink', $permalink)->first();

     if ($videos) {
       $videos->month = Carbon::parse($videos->created_at)->format('M');
       $videos->day = Carbon::parse($videos->created_at)->day;

       $other_videos = videos::where('id', '!=', $videos->id)->inRandomOrder()->limit(10)->get();
       foreach ($other_videos as $n) {
         $n->ar_title = clean_limit($n->ar_title, 10);
       }
     }

     return $videos ? view('web.videos.video', compact('videos', 'other_videos')) : view('web.errors.notfound');
   }
}
