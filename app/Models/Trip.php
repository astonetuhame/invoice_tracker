<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;

    protected $guarded = [];
    
    protected $casts = ['date' => 'date'];

    public function invoices()
    {
        return $this->belongsToMany(Invoice::class)->withTimestamps();
    }
}
