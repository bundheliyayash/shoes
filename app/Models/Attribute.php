<?php

// app/Models/Attribute.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this

class Attribute extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    protected $fillable = ['name', 'parent_id'];

    public function parent()
    {
        return $this->belongsTo(Attribute::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Attribute::class, 'parent_id');
    }

    public function shoes()
    {
        return $this->belongsToMany(Shoe::class, 'shoe_attributes', 'attributes_id', 'shoes_id')
                    ->withPivot('value');
    }
}