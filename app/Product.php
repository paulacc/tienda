<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Product extends Model
{
  use SoftDeletes;

  protected $fillable = ['name', 'price', 'category_id'];
  //borre codigo(code) de producto

  protected $dates = ['deleted_at'];

  public function category()
  {
    return $this->belongsTo(Category::class);
  }

  public function images()
  {
    return $this->hasMany(Image::class);
  }

  public function tags()
  {
    return $this->belongsToMany(Tag::class);
  }
}
