<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;

    public function team()
    {
        return $this->belongsTo('App\Models\Team');
    }

    public function heat_result()
    {
        return $this->hasMany('App\Models\HeatResult');
    }
}
