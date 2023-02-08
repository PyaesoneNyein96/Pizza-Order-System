<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends Model
{
    use HasFactory;

    protected $fillable=[
        'category_id',
        'image',
        'name',
        'description',
        'price',
        'view_count',
        'baking_time'
    ];

    public function Category(){
        return $this->belongsTo(Category::class);
    }
}