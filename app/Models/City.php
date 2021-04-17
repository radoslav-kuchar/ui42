<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class City extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'mayor_name',
        'city_hall_address',
        'phone',
        'fax',
        'email',
        'web',
        'coat_of_arms_path',
        'latitude',
        'longitude',
        'district_id',
    ];
}
