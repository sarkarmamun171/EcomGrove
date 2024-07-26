<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;
use App\Models\City;
class Shipping extends Model
{
    use HasFactory;
    public function rel_to_city(){
        return $this->belongsTo(City::class,'ship_city');
    }
    public function rel_to_country(){
        return $this->belongsTo(Country::class,'ship_country');
    }
}
