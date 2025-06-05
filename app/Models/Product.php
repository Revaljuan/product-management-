<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Kolom-kolom yang bisa diisi (wajib tambah 'category_id')
    protected $fillable = ['name', 'description', 'price', 'category_id'];

    // Set relasi: Satu produk dimiliki oleh satu kategori
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
