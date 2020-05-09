<?php

namespace App\Http\Controllers\Web\Landing;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Banner;
use App\News;
use App\Category;
use Carbon\Carbon;
use App\Setting;


class HomeController extends Controller
{
  /**
   * landing page
   *
   * @return response
   */
  
  public function landing() {
    $lang = cookie_get('lang', 'ar');
    return redirect()->route('home', $lang);
  }

  /**
   * Set language
   *
   * @return response
   */
  public function setLanguage($lang) {
    $locales = locales();

    if (array_key_exists($lang, $locales)) {
        cookie_set('lang', $lang);
    }

    $prev_path = url()->previous();

    $current_path = preg_replace('/ar/', $lang, $prev_path, 1);

    return redirect(url($current_path));
  }

  /**
   * landing page
   *
   * @return response
   */
  public function index($lang, Request $request) {
    $setting=Setting::first();
    $banners = Banner::get();
    foreach ($banners as $banner) {
      $banner->image = asset('public/uploads/thumbs/' . $banner->image);
    }

    $news = News::orderBy('id','desc')->limit(6)->get();
    foreach ($news as $new) {
      $new->image = asset('public/uploads/thumbs/' . $new->image);
      $new->en_title = clean_limit($new->en_title, 25);
      $new->ar_title = clean_limit($new->ar_title, 25);
      $new->en_details = clean_limit($new->en_details, 165);
      $new->ar_details = clean_limit($new->ar_details, 150);
      $new->month = Carbon::parse($new->created_at)->format('M');
      $new->day = Carbon::parse($new->created_at)->day;
    }
   $cats=Category::limit('12')->orderBy('id','desc')->get();

    return view('web.landing.index', compact('banners','cats', 'news','setting'));
  }
}
