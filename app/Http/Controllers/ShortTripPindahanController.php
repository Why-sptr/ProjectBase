<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\ShortTripTruk;
use App\Models\Village;
use App\Models\OrderPindahanShort;

class ShortTripPindahanController extends Controller
{
    public function kota()
    {
        $provinces = Province::all();
        return view('kota', compact('provinces'));
    }

    public function cekongkir(Request $request)
    {
        $provinces = Province::all();
        $harga = OrderPindahanShort::find($request->input('id')); // Mengambil data dari model Harga berdasarkan input ID pengguna
        return view('pindahanshort', compact('provinces', 'harga'));
    }


    public function kabupaten2(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabuptens = Regency::where('province_id', $id_provinsi)->get();

        return response()->json($kabuptens);
    }

    public function kecamatan2(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        return response()->json($kecamatans);
    }

    public function kelurahan2(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $kelurahans = Village::where('district_id', $id_kecamatan)->get();

        return response()->json($kelurahans);
    }

    public function kabupatencek2(Request $request)
    {
        $id_provinsi = $request->id_provinsi;

        $kabuptens = Regency::where('province_id', $id_provinsi)->get();

        return response()->json($kabuptens);
    }

    public function kecamatancek2(Request $request)
    {
        $id_kabupaten = $request->id_kabupaten;

        $kecamatans = District::where('regency_id', $id_kabupaten)->get();

        return response()->json($kecamatans);
    }

    public function kelurahancek2(Request $request)
    {
        $id_kecamatan = $request->id_kecamatan;

        $kelurahans = Village::where('district_id', $id_kecamatan)->get();

        return response()->json($kelurahans);
    }

    public function create()
    {
        return view('data.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'origin_provinsi' => 'required',
            'origin_kabupaten' => 'required',
            'origin_kecamatan' => 'required',
            'origin_kelurahan' => 'required',
            'destinasi_provinsi' => 'required',
            'destinasi_kabupaten' => 'required',
            'destinasi_kecamatan' => 'required',
            'destinasi_kelurahan' => 'required',
            'armada' => 'required',
            'tkbm' => 'required',
            'jarak' => 'required',
            'harga' => 'required',
        ]);

        // Mendapatkan nama provinsi, kabupaten, dan kecamatan berdasarkan ID yang dipilih
        $originProvinsi = Province::find($request->origin_provinsi)->name;
        $originKabupaten = Regency::find($request->origin_kabupaten)->name;
        $originKecamatan = District::find($request->origin_kecamatan)->name;
        $originKelurahan = Village::find($request->origin_kelurahan)->name;
        $destinasiProvinsi = Province::find($request->destinasi_provinsi)->name;
        $destinasiKabupaten = Regency::find($request->destinasi_kabupaten)->name;
        $destinasiKecamatan = District::find($request->destinasi_kecamatan)->name;
        $destinasiKelurahan = Village::find($request->destinasi_kelurahan)->name;

        // Membuat objek Data baru
        $data = new ShortTripTruk;
        $data->origin_provinsi = $originProvinsi;
        $data->origin_kabupaten = $originKabupaten;
        $data->origin_kecamatan = $originKecamatan;
        $data->origin_kelurahan = $originKelurahan;
        $data->destinasi_provinsi = $destinasiProvinsi;
        $data->destinasi_kabupaten = $destinasiKabupaten;
        $data->destinasi_kecamatan = $destinasiKecamatan;
        $data->destinasi_kelurahan = $destinasiKelurahan;
        $data->armada = $request->armada;
        $data->tkbm = $request->tkbm;
        $data->jarak = $request->jarak;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('data.index')
            ->with('success', 'Data created successfully.');
    }
    public function index()
    {
        $data = ShortTripTruk::all();

        return view('sewatrukshort', compact('data'));
    }

    public function edit(ShortTripTruk $data)
    {
        return view('data.edit', compact('data'));
    }

    public function update(Request $request, ShortTripTruk $data)
    {
        $validatedData = $request->validate([
            'origin_provinsi' => 'required',
            'origin_kabupaten' => 'required',
            'origin_kecamatan' => 'required',
            'destinasi_provinsi' => 'required',
            'destinasi_kabupaten' => 'required',
            'destinasi_kecamatan' => 'required',
            'armada' => 'required',
            'tkbm' => 'required',
            'harga' => 'required',
        ]);

        $data->update($validatedData);

        return redirect()->route('data.index')
            ->with('success', 'Data updated successfully.');
    }

    public function destroy(ShortTripTruk $data)
    {
        $data->delete();

        return redirect()->route('data.index')
            ->with('success', 'Data deleted successfully.');
    }

    public function cekHarga(Request $request)
    {
        // Ambil data dari permintaan
        $originProvinsi = $request->input('origin_provinsi');
        $originKabupaten = $request->input('origin_kabupaten');
        $originKecamatan = $request->input('origin_kecamatan');
        $originKelurahan = $request->input('origin_kelurahan');
        $armada = $request->input('armada');
        $tkbm = $request->input('tkbm');
        $destinasiProvinsi = $request->input('destinasi_provinsi');
        $destinasiKabupaten = $request->input('destinasi_kabupaten');
        $destinasiKecamatan = $request->input('destinasi_kecamatan');
        $destinasiKelurahan = $request->input('destinasi_kelurahan');
        $whatsapp = $request->input('whatsapp');

        // Query untuk mendapatkan harga dan jarak berdasarkan data yang diberikan
        $result = DB::table('short_trip_pindahan')
            ->where('origin_provinsi', $originProvinsi)
            ->where('origin_kabupaten', $originKabupaten)
            ->where('origin_kecamatan', $originKecamatan)
            ->where('origin_kelurahan', $originKelurahan)
            ->where('armada', $armada)
            ->where('destinasi_provinsi', $destinasiProvinsi)
            ->where('destinasi_kabupaten', $destinasiKabupaten)
            ->where('destinasi_kecamatan', $destinasiKecamatan)
            ->where('destinasi_kelurahan', $destinasiKelurahan)
            ->select('harga', 'jarak')
            ->first();

        if ($result) {
            // Adjust the price based on the number of people
            $adjustedPrice = $result->harga + ($tkbm - 1) * 150000;

            // Simpan data ke database baru
            $newHarga = new OrderPindahanShort;
            $newHarga->origin_provinsi = $originProvinsi;
            $newHarga->origin_kabupaten = $originKabupaten;
            $newHarga->origin_kecamatan = $originKecamatan;
            $newHarga->origin_kelurahan = $originKelurahan;
            $newHarga->armada = $armada;
            $newHarga->tkbm = $tkbm;
            $newHarga->paket = 'default_value';
            $newHarga->destinasi_provinsi = $destinasiProvinsi;
            $newHarga->destinasi_kabupaten = $destinasiKabupaten;
            $newHarga->destinasi_kecamatan = $destinasiKecamatan;
            $newHarga->destinasi_kelurahan = $destinasiKelurahan;
            $newHarga->harga = $adjustedPrice; // Save the adjusted price
            $newHarga->jarak = $result->jarak;
            $newHarga->whatsapp = $whatsapp;
            $newHarga->save();

            return response()->json(['harga' => $adjustedPrice, 'jarak' => $result->jarak, 'id' => $newHarga->id]);
        } else {
            // Simpan data ke database baru dengan harga dan jarak null
            $newHarga = new OrderPindahanShort;
            $newHarga->origin_provinsi = $originProvinsi;
            $newHarga->origin_kabupaten = $originKabupaten;
            $newHarga->origin_kecamatan = $originKecamatan;
            $newHarga->origin_kelurahan = $originKelurahan;
            $newHarga->armada = $armada;
            $newHarga->tkbm = $tkbm;
            $newHarga->paket = 'default_value';
            $newHarga->destinasi_provinsi = $destinasiProvinsi;
            $newHarga->destinasi_kabupaten = $destinasiKabupaten;
            $newHarga->destinasi_kecamatan = $destinasiKecamatan;
            $newHarga->destinasi_kelurahan = $destinasiKelurahan;
            $newHarga->harga = 0;
            $newHarga->jarak = 0;
            $newHarga->whatsapp = $whatsapp;
            $newHarga->save();

            return response()->json(['message' => 'Hubungi Lebih Lanjut', 'id' => $newHarga->id]);
        }
    }


    public function tampil($id)
    {
        $harga = OrderPindahanShort::find($id);
        return view('ordersteppindahanshort', ['harga' => $harga]);
    }
}
