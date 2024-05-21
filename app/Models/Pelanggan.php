<?php

namespace App\Models;

use App\Models\Pembayaran;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pelanggan extends Model
{
    use HasFactory;
    protected $table = 'pelanggans';
    protected $guarded = ['id'];

    public function pembayaran()
    {
        return $this->hasMany(Pembayaran::class, 'pembayaran_id_pelanggan');
    }
}
