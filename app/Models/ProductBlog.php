<?php

// app/Models/ProductBlog.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this

class ProductBlog extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    protected $fillable = [
        'shoes_id', 'title', 'content', 'product_story', 'image'
    ];

    public function shoe()
    {
        return $this->belongsTo(Shoe::class, 'shoes_id');
    }
}