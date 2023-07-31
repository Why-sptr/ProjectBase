<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPindahanLong extends Model
{
    use HasFactory;

    protected $table = 'order_pindahan_long';
    protected $fillable = [
        'origin_provinsi',
        'origin_kabupaten',
        'origin_kecamatan',
        'destinasi_provinsi',
        'destinasi_kabupaten',
        'destinasi_kecamatan',
        'armada',
        'tkbm',
        'harga',
        'whatsapp',
        'nama',
        'email',
        'paket',
        'home_provinsi',
        'home_kabupaten',
        'home_kecamatan',
        'detail_alamat_home',
        'detail_alamat_origin',
        'detail_alamat_destinasi',
        'rencana_kirim',
    ];
}
