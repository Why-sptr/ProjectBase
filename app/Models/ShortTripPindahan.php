<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ShortTripPindahan extends Model
{
    use HasFactory;
    protected $table = 'short_trip_pindahan';
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
    ];
}
