<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    protected $primaryKey="product_id";
    use HasFactory;
    protected $fillable =[
        'product_name',
        'product_photo',
        'product_description',
        'product_price',
        'category_id',
        'color1',
        'color2',
        'color3',

    ];

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
