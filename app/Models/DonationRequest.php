<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DonationRequest extends Model
{
    protected $table = 'donation_requests';
    public $timestamps = true;
    protected $fillable = array('name', 'phone', 'city_id', 'hospital_name', 'blood_type_id', 'age', 'bags_num',
                    'hospital_address', 'details', 'latitude', 'longitude', 'client_id');

    public function client()
    {
        return $this->belongsTo('App\Models\Client');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }

    public function bloodType()
    {
        return $this->belongsTo(BloodType::class, 'blood_type_id');
    }
}
