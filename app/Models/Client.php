<?php

namespace App\Models;

use App\Models\{City, Post, BloodType, Governorate, Notification, DonationRequest};
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Client  extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];
    protected $guard = 'client-web';

    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = \bcrypt($password);
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function requests()
    {
        return $this->hasMany(DonationRequest::class);
    }

    public function bloodTypes()
    {
        return $this->morphedByMany(BloodType::class, 'clientable');
    }

    public function governorates()
    {
        return $this->morphedByMany(Governorate::class, 'clientable');
    }

    public function posts()
    {
        return $this->morphedByMany(Post::class, 'clientable');
    }

    public function notifications()
    {
        return $this->morphedByMany(Notification::class, 'clientable')->withPivot('is_read');
    }

    protected $hidden = [
        'password',
    ];
}
