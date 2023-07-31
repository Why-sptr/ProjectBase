<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderPindahanShort extends Model
{
    use HasFactory;
    protected $table = 'order_pindahan_short';
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
        'tkbm',
        'jarak',
        'paket',
        'harga',
        'whatsapp',
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
}
