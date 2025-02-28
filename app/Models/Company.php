<?php

// app/Models/Company.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes; // Add this

class Company extends Model
{
    use HasFactory, SoftDeletes; // Use SoftDeletes trait

    protected $fillable = ['name'];

    public function shoes()
    {
        return $this->hasMany(Shoe::class, 'com_id');
    }
}