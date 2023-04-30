<?php

namespace App\Models;

use App\Models\Client;
use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    protected $appends = ['is_favourite'];

    public function getIsFavouriteAttribute()
    {
        $user = auth('sanctum')->user();
        if (!$user) {
            $user = auth('client-web')->user();
        }
        if ($user) {
            $check = $this->clients()->find($user->id);
            if ($check) {
                return true;
            }
        }
        return false;
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function clients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
