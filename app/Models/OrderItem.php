<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    // Secure the fields for Mass Assignment
    protected $fillable = [
        'order_id', 
        'product_id', 
        'product_name', 
        'variation', 
        'quantity', 
        'price'
    ];

    // Tell Laravel this item belongs to a specific Order
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Tell Laravel this item is linked to a specific Product in your catalog
    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}