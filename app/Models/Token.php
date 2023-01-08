<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Token extends Model
{
    use HasFactory;

    protected $fillable = ['token' , 'client_id','type'] ;

    public function client()
    {
        return $this->belongsTo(Client::class, 'client_id');
    }
}
