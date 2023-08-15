<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSewaTrukShort extends Model
{
    use HasFactory;
    protected $table = 'order_sewa_truk_short';
    protected $fillable = [
        'origin_provinsi',
        'origin_kabupaten',
        'origin_kecamatan',
        'origin_kelurahan',
        'destinasi_provinsi',
        'destinasi_kabupaten',
        'destinasi_kecamatan',
        'destinasi_kelurahan',
        'armada',
        'jarak',
        'harga',
        'whatsapp',
        'user_id',
        'status',
        'gambar',
        'nama',
        'email',
        'home_provinsi',
        'home_kabupaten',
        'home_kecamatan',
        'home_kelurahan',
        'detail_alamat_home',
        'detail_alamat_origin',
        'detail_alamat_destinasi',
        'rencana_kirim',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
