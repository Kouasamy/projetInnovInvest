<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = ['produit_id', 'image_path'];

    public function produit()
    {
        return $this->belongsTo(Produits::class, 'produit_id');
    }
}
