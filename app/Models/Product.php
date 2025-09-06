<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory; // مهم جدًا لاستخدام Factories والـ Seeders

    // الحقول التي يمكن ملؤها مباشرة
    protected $fillable = [
        'category_id',
        'name',
        'slug',
        'description',
        'price',
        'on_sale',
        'image',
    ];

    // علاقة المنتج بالفئة
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // علاقة المنتج بالمراجعات (اختياري، إذا تريد استخدام Reviews)
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
