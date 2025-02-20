<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Указываем, какие атрибуты можно массово назначать
    protected $fillable = [
        'name',
        'category_id',
        'description',
        'price',
    ];

    // Связь с категорией
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
