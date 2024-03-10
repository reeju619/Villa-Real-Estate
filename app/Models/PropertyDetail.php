<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PropertyDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'property_name',
        'property_image',
        'category_name',
        'price',
        'address',
        'area',
        'floor',
        'parking',
        'bhk',
        'user_type',
    ];
}
