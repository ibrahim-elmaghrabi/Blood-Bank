<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    protected $table = 'blood_types';
    public $timestamps = true;
    protected $fillable = array('name');

    public function clients()
    {
        return $this->hasMany('App\Models\Client');
    }

    public function bloodType_clients()
    {
        return $this->morphToMany('App\Models\Client', 'clientable');
    }

    public function donations()
    {
        return $this->hasMany(DonationRequest::class);
    }
}
