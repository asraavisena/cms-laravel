<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    // protected $guarded = []; //Opposite from fillable
    protected $fillable = ['title', 'post_image', 'body'];

    public function user() {
        return $this->belongsTo('App\Models\User');
    }

    // Mutator
    // public function setPostImageAttribute($value){
    //     $this->attributes['post_image'] = asset($value);
    // }

    // Accessor; returning something
    public function getPostImageAttribute($value){
        return asset($value);
    }
}
