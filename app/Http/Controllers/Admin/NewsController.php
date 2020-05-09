<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Requests\Admin\NewsRequest;

class NewsController extends Controller
{
  /**
   * Show all news
   *
   * @return response
   */
  public function index(News $news) {
     $news = $news->orderBy('id', 'asc')->where('type', 0)->get();
     foreach ($news as $new) {
       $new->ar_details = clean_limit($new->ar_details);
       $new->image = asset('public/uploads/thumbs/' . $new->image);
     }
     return view('admin.news.index', compact('news'));
  }

  /**
   * Create new news
   *
   * @return response
   */
  public function create() {
    return view('admin.news.create');
  }

  /**
   * Store new news
   *
   * @return response
   */
  public function store(NewsRequest $request) {
    request()->validate([
     'image' => 'required|image|max:5000',
     'permalink' => 'required|string|unique:news',
    ]);
    $request->image = uploadImage2($request->image,270,270,1170,350);

    $news = News::create($request->all());
    $news->image = $request->image;
    $news->save();

    

    return redirect()->back()->with(['success' => 'News inserted successfully']);
  }

  /**
   * edit existing news
   *
   * @return response
   */
  public function edit($id) {
    $news = News::find($id);
    if (! $news) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    $news->image = asset('public/uploads/thumbs/' . $news->image);

    return view('admin.news.edit', compact('news'));
  }

  /**
   * update existing news
   *
   * @return response
   */
  public function update($id, NewsRequest $request) {
    $news = News::find($id);


    if (! $news) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    request()->validate([
      'permalink' => 'required|string|unique:news,permalink,'.$id,
    ]);

    $news = $news->fill($request->except('image'));
     if($request->hasFile('image')) {
         $news->image = uploadImage2($request->image,270,270,1170,350);
     }
    $news->save();

   return redirect()->back()->with(['success' => 'News updated successfully']);
  }

  /**
   * Delete news by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $news = News::find($id);

    if (! $news) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    News::destroy($id);
    return redirect()->back()->with(['success' => 'News deleted successfully']);
  }
}
