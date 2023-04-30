<?php

namespace App\Models;

use App\Models\{Client, DonationRequest};
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function request()
    {
        return $this->belongsTo(DonationRequest::class);
    }

    public function clients()
    {
        return $this->morphToMany(Client::class, 'clientable')->withPivot('is_read');
    }
}
