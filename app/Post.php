<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;

class Post extends Model
{

  use softDeletes;

  protected $fillable = [
      'title', 'content', 'category_id','image','slug'
  ];

  public function getImageAttribute($image)
  {
    return asset($image);
  }

  protected $dates = ['deleted_at'];



    public function category()
    {
      return $this->belongsTo('App\Category');


    }
}
