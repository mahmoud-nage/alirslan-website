<?php

namespace App\Http\Controllers\Web\audio;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use App\Setting;
use App\Category;
use Carbon\Carbon;

class audioController extends Controller
{
  /**
   * Show audiospage
   *
   * @return response
   */
  public function index($lang, Request $request) {
    $cat_name = null;
     $setting=Setting::first();
     if($request->has('category_id') && $request->category_id != null){
       $audios = Media::where('type', 1)->orderBy('id', 'desc')->where('category_id', $request->category_id)->paginate(5);
       $cat_name = Category::where('id', $request->category_id)->pluck('ar_name')[0];
      }else{
      $audios = Media::where('type', 1)->orderBy('id', 'desc')->paginate(5);
     }
    return view('web.audios.audios', compact('audios','setting','cat_name'));
  }

  /**
   * Show audios page by the given permalink
   *
   * @return response
   */
   public function audio($lang, $permalink) {
     $audios = Media::where('type', 1)->where('permalink', $permalink)->first();

     if ($audios) {
       $audios->month = Carbon::parse($audios->created_at)->format('M');
       $audios->day = Carbon::parse($audios->created_at)->day;

       $other_audios = Media::where('id', '!=', $audios->id)->inRandomOrder()->limit(10)->get();
     }

     return $audios ? view('web.audios.audio', compact('audios', 'other_audios')) : view('web.errors.notfound');
   }
}
