<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    
    use HasFactory;
    protected $primaryKey="category_id";
    //we can name the funxtion as we want
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id'); 
    }
}

