<?php

namespace App\Models;

use App\Models\City;
use App\Models\Client;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Governorate extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function cities()
    {
        return $this->hasMany(City::class);
    }

    public function clients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }
}
