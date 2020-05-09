<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
      /**
   * Table name
   *
   * @return string
   */
  protected $table = 'media';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'ar_title', 'source', 'category_id', 'type', 'permalink', 'keywords', 'description',
  ];

  public function category() {
    return $this->belongsTo('App\Category', 'category_id');
  }
}
