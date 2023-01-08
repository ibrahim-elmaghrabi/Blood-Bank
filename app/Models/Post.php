<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $table = 'posts';
    public $timestamps = true;
    protected $fillable = array('title', 'image', 'content', 'category_id');
    protected $appends = ['is_favourite'];

    public function getIsFavouriteAttribute()
    {
        $user = auth('sanctum')->user();
        if(!$user) {
            $user = auth('client-web')->user();
        }
        if($user) {
            $check = $this->clients()->find($user->id);
            if ($check) {
                return true;
            }
        }
        return false;
    }

    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }

    public function clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }
}
