<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    // ADD THIS: Tell Laravel these fields are safe to save from a form
    protected $fillable = [
        'name',
        'contact_person',
        'email',
        'phone',
        'address'
    ];

    // Your relationship to products (if you added it earlier)
    public function products()
    {
        return $this->hasMany(Products::class, 'supplier_id', 'id');
    }
}