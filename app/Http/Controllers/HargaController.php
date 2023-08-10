<?php

namespace App\Http\Controllers;

use App\Models\OrderSewaTrukLong;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class HargaController extends Controller
{
    public function cekHarga(Request $request)
    {
        // Check if the user is logged in
        if (Auth::check()) {
            // Retrieve the user ID
            $userId = Auth::id();
    
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
    
            // Simpan data ke database baru
            $newHarga = new OrderSewaTrukLong;
            $newHarga->user_id = $userId; // Associate user ID
            $newHarga->origin_provinsi = $originProvinsi;
            $newHarga->origin_kabupaten = $originKabupaten;
            $newHarga->origin_kecamatan = $originKecamatan;
            $newHarga->armada = $armada;
            $newHarga->destinasi_provinsi = $destinasiProvinsi;
            $newHarga->destinasi_kabupaten = $destinasiKabupaten;
            $newHarga->destinasi_kecamatan = $destinasiKecamatan;
            
            if ($harga !== null) {
                $newHarga->harga = $harga;
            } else {
                $newHarga->harga = 0;
                $newHarga->whatsapp = $whatsapp;
                $newHarga->save();
    
                return response()->json(['message' => 'Hubungi Lebih Lanjut', 'id' => $newHarga->id]);
            }
            
            $newHarga->whatsapp = $whatsapp;
            $newHarga->save();
    
            return response()->json(['harga' => $newHarga->harga, 'id' => $newHarga->id]);
        } else {
            // User is not logged in, handle accordingly
            return response()->json(['message' => 'User not logged in']);
        }
    }

    public function tampil($id)
    {
        $harga = OrderSewaTrukLong::find($id);
        return view('orderstep', ['harga' => $harga]);
    }

    

    public function updateorder(Request $request, $id)
    {
        $order = OrderSewaTrukLong::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        // Validasi input yang diperlukan
        $validatedData = $request->validate([
            'origin_provinsi' => 'nullable|string',
            'origin_kabupaten' => 'nullable|string',
            'origin_kecamatan' => 'nullable|string',
            'destinasi_provinsi' => 'nullable|string',
            'destinasi_kabupaten' => 'nullable|string',
            'destinasi_kecamatan' => 'nullable|string',
            'armada' => 'nullable|string|in:PickUp,CDD,CDE,Fuso,Long,Box',
            'harga' => 'nullable|integer',
            'whatsapp' => 'nullable|string',
            'nama' => 'nullable|string',
            'email' => 'nullable|email',
            'jenis_kelamin' => 'nullable|string|in:laki-laki,perempuan',
            'home_provinsi' => 'nullable|string',
            'home_kabupaten' => 'nullable|string',
            'home_kecamatan' => 'nullable|string',
            'detail_alamat_home' => 'nullable|string',
            'detail_alamat_origin' => 'nullable|string',
            'detail_alamat_destinasi' => 'nullable|string',
            'rencana_kirim' => 'nullable|date',
        ]);

        // Update data order
        $order->fill($validatedData);
        $order->save();

        return response()->json(['message' => 'Order updated successfully'], 200);
    }
}
