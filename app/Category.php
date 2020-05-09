<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
      'parent', 'ar_name',
  ];

  public function news() {
    return $this->hasMany('App\New', 'category_id');
  }
  public function media() {
    return $this->hasMany('App\Media', 'category_id');
  }
}
