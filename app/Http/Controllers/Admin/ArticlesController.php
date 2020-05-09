<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\News;
use App\Http\Requests\Admin\NewsRequest;

class ArticlesController extends Controller
{
  /**
   * Show all news
   *
   * @return response
   */
  public function index(News $articles) {
     $articles = $articles->orderBy('id', 'asc')->where('type', 1)->get();
     foreach ($articles as $article) {
       $article->ar_details = clean_limit($article->ar_details);
       $article->image = asset('public/uploads/thumbs/' . $article->image);
     }
     return view('admin.articles.index', compact('articles'));
  }

  /**
   * Create new news
   *
   * @return response
   */
  public function create() {
    return view('admin.articles.create');
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
     'category_id' => 'required',
    ]);
    $request->image = uploadImage2($request->image,270,270,1170,350);

    $articles = News::create($request->all());
    $articles->image = $request->image;
    $articles->save();

    

    return redirect()->back()->with(['success' => 'News inserted successfully']);
  }

  /**
   * edit existing news
   *
   * @return response
   */
  public function edit($id) {
    $articles = News::find($id);
    if (! $articles) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    $articles->image = asset('public/uploads/thumbs/' . $articles->image);

    return view('admin.articles.edit', compact('articles'));
  }

  /**
   * update existing news
   *
   * @return response
   */
  public function update($id, NewsRequest $request) {
    $articles = News::find($id);


    if (! $articles) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    request()->validate([
      'permalink' => 'required|string|unique:media,permalink,'.$id,
    ]);

    $articles = $articles->fill($request->except('image'));
     if($request->hasFile('image')) {
         $articles->image = uploadImage2($request->image,270,270,1170,350);
     }
    $articles->save();

   return redirect()->back()->with(['success' => 'News updated successfully']);
  }

  /**
   * Delete news by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $articles = News::find($id);

    if (! $articles) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    News::destroy($id);
    return redirect()->back()->with(['success' => 'News deleted successfully']);
  }
}
