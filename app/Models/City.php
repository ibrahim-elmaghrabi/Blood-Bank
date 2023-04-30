<?php

namespace App\Models;

use App\Models\{Client, Governorate, DonationRequest};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class City extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function clients()
    {
        return $this->hasMany(Client::class);
    }

    public function governorate()
    {
        return $this->belongsTo(Governorate::class);
    }

    public function donations()
    {
        return $this->hasMany(DonationRequest::class);
    }
}
