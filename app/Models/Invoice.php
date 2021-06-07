<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = ['date' => 'date'];

    public function trips()
    {
        return $this->belongsToMany(Trip::class)->withTimestamps();
    }

    // public function receivedTrips()
    // {
    //     return $this->belongsToMany(Trip::class)->withTimestamps()->withPivot('status')->wherePivot('status' , 'received');
    // }

}
