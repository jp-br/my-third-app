<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    protected $table = 'cars';
    protected $fillable = [
        'car_name',
        'car_model',
        'color',
        'mileage',
        'year_model',
        'amount',
        'fuel_type',
        'transmission',
        'availability'

    ];
}
