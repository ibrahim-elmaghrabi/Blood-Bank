<?php

namespace App\Models;

use App\Models\Client;
use App\Models\DonationRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BloodType extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function bloodType_clients()
    {
        return $this->morphToMany(Client::class, 'clientable');
    }

    public function donations()
    {
        return $this->hasMany(DonationRequest::class);
    }
}
