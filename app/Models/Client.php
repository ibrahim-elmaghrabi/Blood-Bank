<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class Client  extends Authenticatable
{

    use HasApiTokens;
    protected $table = 'clients';
    public $timestamps = true;
    protected $fillable = array(
        'name',
        'phone',
        'password',
        'email',
        'blood_type_id',
        'd_o_b',
        'last_donation_date',
        'city_id',
        'active'
     );

    protected $guard = 'client-web';


    
    public function bloodType()
    {
        return $this->belongsTo('App\Models\BloodType');
    }

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function requests()
    {
        return $this->hasMany('App\Models\DonationRequest');
    }

    public function bloodTypes()
    {
        return $this->morphedByMany('App\Models\BloodType', 'clientable');
    }

    public function governorates()
    {
        return $this->morphedByMany('App\Models\Governorate', 'clientable');
    }

    public function posts()
    {
        return $this->morphedByMany('App\Models\Post', 'clientable');
    }
 

    public function notifications()
    {
        return $this->morphedByMany('App\Models\Notification', 'clientable')->withPivot('is_read');
    }
 

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
