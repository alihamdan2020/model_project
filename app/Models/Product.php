<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
class Product extends Model
{
    protected $primaryKey="product_id";
    use HasFactory;

    public function category()
{
    return $this->belongsTo(Category::class, 'category_id');
}

}
