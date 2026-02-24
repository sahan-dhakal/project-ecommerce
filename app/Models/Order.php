<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //// tells Laravel exactly which fields are safe to save from a checkout form
    protected $fillable = [
        'user_id', 
        'order_number', 
        'customer_name', 
        'customer_email', 
        'customer_phone', 
        'shipping_address', 
        'city', 
        'total_amount', 
        'discount_amount', 
        'shipping_fee', 
        'payment_method', 
        'payment_status', 
        'order_status'
    ];
    // Tells Laravel that one Order can have multiple items inside it
    public function items()
    {
        return $this->hasMany(OrderItem::class);
    }
}
