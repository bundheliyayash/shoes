<?php

// app/Models/Shoe.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this

class Shoe extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    protected $fillable = [
        'com_id', 'name', 'image', 'url', 'company_pro_id', 'gallery', 'price'
    ];

    public function company()
    {
        return $this->belongsTo(Company::class, 'com_id');
    }

    public function attributes()
    {
        return $this->belongsToMany(Attribute::class, 'shoe_attributes', 'shoes_id', 'attributes_id')
                    ->withPivot('value');
    }

    public function blogs()
    {
        return $this->hasMany(ProductBlog::class, 'shoes_id');
    }
}