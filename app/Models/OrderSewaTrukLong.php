<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderSewaTrukLong extends Model
{
    use HasFactory;

    protected $table = 'order_sewa_truk_long';
    protected $fillable = [
        'origin_provinsi',
        'origin_kabupaten',
        'origin_kecamatan',
        'destinasi_provinsi',
        'destinasi_kabupaten',
        'destinasi_kecamatan',
        'armada',
        'harga',
        'whatsapp',
        'nama',
        'email',
        'jenis_kelamin',
        'home_provinsi',
        'home_kabupaten',
        'home_kecamatan',
        'detail_alamat_home',
        'detail_alamat_origin',
        'detail_alamat_destinasi',
        'rencana_kirim',
    ];

}
