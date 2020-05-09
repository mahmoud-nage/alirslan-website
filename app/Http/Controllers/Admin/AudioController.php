<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Media;
use App\Http\Requests\Admin\MediaRequest;

class AudioController extends Controller
{
  /**
   * Show all audio
   *
   * @return response
   */
  public function index(Media $audio) {
     $audio = $audio->orderBy('id', 'asc')->where('type', 1)->get();
     return view('admin.audio.index', compact('audio'));
  }

  /**
   * Create med audio
   *
   * @return response
   */
  public function create() {
    return view('admin.audio.create');
  }
  /**
   * Store med audio
   *
   * @return response
   */
  public function store(MediaRequest $request) {
    request()->validate([
     'permalink' => 'required|string|unique:media',
     'category_id' => 'required',
    ]);
    $audio = Media::create($request->all());
    return redirect()->back()->with(['success' => 'audio inserted successfully']);
  }

  /**
   * edit existing audio
   *
   * @return response
   */
  public function edit($id) {
    $audio = Media::find($id);
    if (! $audio) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    return view('admin.audio.edit', compact('audio'));
  }

  /**
   * update existing audio
   *
   * @return response
   */
  public function update($id, MediaRequest $request) {
    $audio = Media::find($id);
    if (! $audio) {
      return redirect()->back()->with(['error' => 'Sorry, An error occurs']);
    }

    $audio = $audio->update($request->all());
   return redirect()->back()->with(['success' => 'audio updated successfully']);
  }

  /**
   * Delete audio by the given id
   *
   * @return message
   */
  public function destroy($id) {
    $audio = Media::find($id);
    if (! $audio) {
      return redirect()->back()->with(['error' => 'Data Not Found']);
    }
    Media::destroy($id);
    return redirect()->back()->with(['success' => 'audio deleted successfully']);
  }
}
