<?php

namespace App\Models;

use illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    
    protected $fillable = [
        "nama",
        'harga_beli',
        'harga_jual',
        'stok',
        'stok',
        'kategori_id',
        'image_url',
    ];

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
