<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{   
    protected $table = 'orders'; 
    
    protected $fillable = [
        'user_id', 
        'name', 
        'phone', 
        'address', 
        'product_details', 
        'total_price', 
        'status'
    ];
}