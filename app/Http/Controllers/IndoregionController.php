<?php

namespace App\Http\Controllers;

use App\Models\LongTripTruk;
use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\OrderSewaTrukLong;
use Illuminate\Support\Facades\DB;
use App\Models\Village;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class IndoregionController extends Controller
{
    public function kota()
    {
        $provinces = Province::all();
        return view('kota', compact('provinces'));
    }

    public function cekongkir(Request $request)
    {
        $provinces = Province::all();
        $harga = OrderSewaTrukLong::find($request->input('id')); // Mengambil data dari model Harga berdasarkan input ID pengguna
        return view('sewatruklong', compact('provinces', 'harga'));
    }


    public function kabupaten(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabuptens = Regency::where('province_id', $id_provinsi)->get();

        return response()->json($kabuptens);
    }

    public function kecamatan(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        return response()->json($kecamatans);
    }

    public function kabupatencek(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabuptens = Regency::where('province_id', $id_provinsi)->get();

        return response()->json($kabuptens);
    }

    public function kecamatancek(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        return response()->json($kecamatans);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'origin_provinsi' => 'required',
            'origin_kabupaten' => 'required',
            'origin_kecamatan' => 'required',
            'destinasi_provinsi' => 'required',
            'destinasi_kabupaten' => 'required',
            'destinasi_kecamatan' => 'required',
            'armada' => 'required',
            'harga' => 'required',
        ]);

        // Mendapatkan nama provinsi, kabupaten, dan kecamatan berdasarkan ID yang dipilih
        $originProvinsi = Province::find($request->origin_provinsi)->name;
        $originKabupaten = Regency::find($request->origin_kabupaten)->name;
        $originKecamatan = District::find($request->origin_kecamatan)->name;
        $destinasiProvinsi = Province::find($request->destinasi_provinsi)->name;
        $destinasiKabupaten = Regency::find($request->destinasi_kabupaten)->name;
        $destinasiKecamatan = District::find($request->destinasi_kecamatan)->name;

        // Membuat objek Data baru
        $data = new LongTripTruk;
        $data->origin_provinsi = $originProvinsi;
        $data->origin_kabupaten = $originKabupaten;
        $data->origin_kecamatan = $originKecamatan;
        $data->destinasi_provinsi = $destinasiProvinsi;
        $data->destinasi_kabupaten = $destinasiKabupaten;
        $data->destinasi_kecamatan = $destinasiKecamatan;
        $data->armada = $request->armada;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('kota')
            ->with('success', 'Data created successfully.');
    }

    public function update(Request $request, LongTripTruk $data)
    {
        $validatedData = $request->validate([
            'origin_provinsi' => 'required',
            'origin_kabupaten' => 'required',
            'origin_kecamatan' => 'required',
            'destinasi_provinsi' => 'required',
            'destinasi_kabupaten' => 'required',
            'destinasi_kecamatan' => 'required',
            'armada' => 'required',
            'harga' => 'required',
        ]);

        $data->update($validatedData);

        return redirect()->route('kota')
            ->with('success', 'Data updated successfully.');
    }

    public function cekHarga(Request $request)
    {
        // Ambil data dari permintaan
        $originProvinsi = $request->input('origin_provinsi');
        $originKabupaten = $request->input('origin_kabupaten');
        $originKecamatan = $request->input('origin_kecamatan');
        $armada = $request->input('armada');
        $destinasiProvinsi = $request->input('destinasi_provinsi');
        $destinasiKabupaten = $request->input('destinasi_kabupaten');
        $destinasiKecamatan = $request->input('destinasi_kecamatan');
        $whatsapp = $request->input('whatsapp');

        // Query untuk mendapatkan harga berdasarkan data yang diberikan
        $harga = DB::table('longtrip_truk')
            ->where('origin_provinsi', $originProvinsi)
            ->where('origin_kabupaten', $originKabupaten)
            ->where('armada', $armada)
            ->where('destinasi_provinsi', $destinasiProvinsi)
            ->where('destinasi_kabupaten', $destinasiKabupaten)
            ->value('harga');

        // Pastikan user terautentikasi sebelum melanjutkan
        if (Auth::check()) {
            $user = auth()->user();

            // Simpan data ke database baru
            $newHarga = new OrderSewaTrukLong;
            $newHarga->origin_provinsi = $originProvinsi;
            $newHarga->origin_kabupaten = $originKabupaten;
            $newHarga->origin_kecamatan = $originKecamatan;
            $newHarga->armada = $armada;
            $newHarga->destinasi_provinsi = $destinasiProvinsi;
            $newHarga->destinasi_kabupaten = $destinasiKabupaten;
            $newHarga->destinasi_kecamatan = $destinasiKecamatan;
            $newHarga->harga = $harga ?? 0;  // Menggunakan harga jika ada, jika tidak gunakan 0
            $newHarga->whatsapp = $whatsapp;
            $newHarga->user_id = $user->id;  // Mengatur ID user

            $newHarga->save();

            return response()->json(['harga' => $harga, 'id' => $newHarga->id,]);
        } else {
            return response()->json(['message' => 'Pengguna tidak terautentikasi'], 401);
        }
    }

    public function tampil($id)
    {
        $harga = OrderSewaTrukLong::find($id);
        return view('orderstep', ['harga' => $harga]);
    }
}
