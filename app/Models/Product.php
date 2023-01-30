<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'product_id',
        'category_id',
        'image',
        'name',
        'description',
        'price',
        'view_count'
    ];
}