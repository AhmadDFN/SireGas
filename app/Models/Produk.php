<?php

namespace App\Models;

use App\Models\Pengadaan;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produks';
    protected $guarded = ['id'];

    public function pengadaan()
    {
        return $this->hasMany(Pengadaan::class, 'id_produk');
    }
}
