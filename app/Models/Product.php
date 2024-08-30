<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    protected $fillable = [
        'category_id',
        'brand_id',
        'name',
        'slug',
        'description',
        'thumbnail',
        'price',
        'sale_percent',
        'quantity',
        'trending',
        'status'
    ];
}
