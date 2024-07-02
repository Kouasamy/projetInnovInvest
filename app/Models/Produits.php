<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produits extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'prix',
        'category_id'
    ];


    public function images()
    {
        return $this->hasMany(Image::class, 'produit_id');
    }
}

