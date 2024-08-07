<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderproduct extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function rel_to_product(){
        return $this->belongsTo(Product::class,'product_id');
    }
    public function rel_to_city(){
        return $this->belongsTo(City::class,'city_id');
    }
    public function rel_to_country(){
        return $this->belongsTo(Country::class,'country_id');
    }
    public function rel_to_customer(){
        return $this->belongsTo(Customer::class,'customer_id');
    }

}
