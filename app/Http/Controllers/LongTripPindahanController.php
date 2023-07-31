<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\LongTripPindahan;
use App\Models\OrderPindahanLong;
use Illuminate\Support\Facades\DB;
use App\Models\Village;

class LongTripPindahanController extends Controller
{
    public function kota()
    {
        $provinces = Province::all();
        return view('kota', compact('provinces'));
    }

    public function pindahan()
    {
        $provinces = Province::all();
        return view('pindahanlong', compact('provinces'));
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
            'destinasi_provinsi' => 'required',
            'destinasi_kabupaten' => 'required',
            'destinasi_kecamatan' => 'required',
            'armada' => 'required',
            'tkbm' => 'required',
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
        $data = new LongTripPindahan();
        $data->origin_provinsi = $originProvinsi;
        $data->origin_kabupaten = $originKabupaten;
        $data->origin_kecamatan = $originKecamatan;
        $data->destinasi_provinsi = $destinasiProvinsi;
        $data->destinasi_kabupaten = $destinasiKabupaten;
        $data->destinasi_kecamatan = $destinasiKecamatan;
        $data->armada = $request->armada;
        $data->tkbm = $request->tkbm;
        $data->harga = $request->harga;
        $data->save();

        return redirect()->route('data.index')
            ->with('success', 'Data created successfully.');
    }
    public function index()
    {
        $data = LongTripPindahan::all();

        return view('pindahanlong', compact('data'));
    }

    public function edit(LongTripPindahan $data)
    {
        return view('data.edit', compact('data'));
    }

    public function update(Request $request, LongTripPindahan $data)
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

        return redirect()->route('data.index')
            ->with('success', 'Data updated successfully.');
    }

    public function destroy(LongTripPindahan $data)
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
        $armada = $request->input('armada');
        $tkbm = $request->input('tkbm');
        $destinasiProvinsi = $request->input('destinasi_provinsi');
        $destinasiKabupaten = $request->input('destinasi_kabupaten');
        $destinasiKecamatan = $request->input('destinasi_kecamatan');
        $whatsapp = $request->input('whatsapp');


        // Query untuk mendapatkan harga berdasarkan data yang diberikan
        $harga = DB::table('longtrip_pindahan')
            ->where('origin_provinsi', $originProvinsi)
            ->where('origin_kabupaten', $originKabupaten)
            ->where('origin_kecamatan', $originKecamatan)
            ->where('armada', $armada)
            ->where('destinasi_provinsi', $destinasiProvinsi)
            ->where('destinasi_kabupaten', $destinasiKabupaten)
            ->where('destinasi_kecamatan', $destinasiKecamatan)
            ->value('harga');

        if ($harga) {
            // Adjust the price based on the number of people
            $adjustedPrice = $harga + ($tkbm - 1) * 150000;

            // Simpan data ke database baru
            $newHarga = new OrderPindahanLong;
            $newHarga->origin_provinsi = $originProvinsi;
            $newHarga->origin_kabupaten = $originKabupaten;
            $newHarga->origin_kecamatan = $originKecamatan;
            $newHarga->armada = $armada;
            $newHarga->tkbm = $tkbm;
            $newHarga->paket = 'default_value';
            $newHarga->destinasi_provinsi = $destinasiProvinsi;
            $newHarga->destinasi_kabupaten = $destinasiKabupaten;
            $newHarga->destinasi_kecamatan = $destinasiKecamatan;
            $newHarga->harga = $adjustedPrice; // Save the adjusted price
            $newHarga->whatsapp = $whatsapp;
            $newHarga->save();

            return response()->json(['harga' => $adjustedPrice, 'id' => $newHarga->id]);
        } else {
            // Simpan data ke database baru dengan harga null
            $newHarga = new OrderPindahanLong;
            $newHarga->origin_provinsi = $originProvinsi;
            $newHarga->origin_kabupaten = $originKabupaten;
            $newHarga->origin_kecamatan = $originKecamatan;
            $newHarga->armada = $armada;
            $newHarga->tkbm = $tkbm;
            $newHarga->paket = 'default_value';
            $newHarga->destinasi_provinsi = $destinasiProvinsi;
            $newHarga->destinasi_kabupaten = $destinasiKabupaten;
            $newHarga->destinasi_kecamatan = $destinasiKecamatan;
            $newHarga->harga = 0;
            $newHarga->whatsapp = $whatsapp;
            $newHarga->save();

            return response()->json(['message' => 'Hubungi Lebih Lanjut', 'id' => $newHarga->id]);
        }
    }

    public function tampil($id)
    {
        $harga = OrderPindahanLong::find($id);
        return view('ordersteppindahanlong', ['harga' => $harga]);
    }
}