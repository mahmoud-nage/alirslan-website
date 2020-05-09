<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use App\Http\Requests\Admin\MediaRequest;

class VideoController extends Controller
{
  /**
   * Show all video
   *
   * @return response
   */
  public function index(Media $video) {
     $video = $video->orderBy('id', 'asc')->where('type', 0)->get();
     return view('admin.video.index', compact('video'));
  }

  /**
   * Create med video
   *
   * @return response
   */
  public function create() {
    return view('admin.video.create');
  }
  /**
   * Store med video
   *
   * @return response
   */
  public function store(MediaRequest $request) {
    request()->validate([
     'permalink' => 'required|string|unique:media',
     'category_id' => 'required',
    ]);

    $video = Media::create($request->all());
    
    return redirect()->back()->with(['success' => 'video inserted successfully']);
  }

  /**
   * edit existing video
   *
   * @return response
   */
  public function edit($id) {
    $video = Media::find($id);
    if (! $video) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    return view('admin.video.edit', compact('video'));
  }

  /**
   * update existing video
   *
   * @return response
   */
  public function update($id, MediaRequest $request) {
    $video = Media::find($id);
    if (! $video) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    $video = $video->update($request->all());
   return redirect()->back()->with(['success' => 'video updated successfully']);
  }

  /**
   * Delete video by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $video = Media::find($id);
    if (! $video) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    Media::destroy($id);
    return redirect()->back()->with(['success' => 'video deleted successfully']);
  }
}
