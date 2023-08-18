<?php

namespace App\Http\Controllers;

use App\Models\OrderPindahanLong;
use App\Models\OrderPindahanShort;
use App\Models\User;
use App\Models\OrderSewaTrukLong;
use App\Models\OrderSewaTrukShort;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class KeranjangController extends Controller
{
    public function showKeranjangTrukLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukLongs()
                ->where('status', 'keranjang')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('keranjang/riwayattruklong', compact('keranjangOrders'));
        } else {
            return view('keranjang/riwayattruklong');
        }
    }

    public function showKeranjangTrukShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukShorts()
                ->where('status', 'keranjang')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('keranjang/riwayattrukshort', compact('keranjangOrders'));
        } else {
            return view('keranjang/riwayattrukshort');
        }
    }

    public function showKeranjangPindahanLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanLongs()
                ->where('status', 'keranjang')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('keranjang/riwayatpindahanlong', compact('keranjangOrders'));
        } else {
            return view('keranjang/riwayatpindahanlong');
        }
    }
    public function showKeranjangPindahanShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanShorts()
                ->where('status', 'keranjang')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('keranjang/riwayatpindahanshort', compact('keranjangOrders'));
        } else {
            return view('keranjang/riwayatpindahanshort');
        }
    }

    public function showOrderTrukLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukLongs()
                ->where('status', 'menunggu')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/ordertruklong', compact('keranjangOrders'));
        } else {
            return view('order/ordertruklong');
        }
    }

    public function showKonfirmasiTrukLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukLongs()
                ->where('status', 'konfirmasi')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/konfirmasitruklong', compact('keranjangOrders'));
        } else {
            return view('order/konfirmasitruklong');
        }
    }

    public function showProsesTrukLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukLongs()
                ->where('status', 'proses')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/prosestruklong', compact('keranjangOrders'));
        } else {
            return view('order/prosestruklong');
        }
    }
    public function showSelesaiTrukLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukLongs()
                ->whereIn('status', ['selesai', 'cancel'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/selesaitruklong', compact('keranjangOrders'));
        } else {
            return view('order/selesaitruklong');
        }
    }


    public function uploadImage(Request $request, $id)
    {
        $orderId = $request->input('orderId');
        $keranjangOrders = OrderSewaTrukLong::findOrFail($orderId);

        // Proses upload gambar dan simpan ke direktori yang sesuai
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('bukti'), $namaGambar);

            // Simpan informasi gambar ke dalam data order
            $keranjangOrders->gambar = $namaGambar;
            $keranjangOrders->status = 'konfirmasi';
            $keranjangOrders->save();

            // Mengirim notifikasi ke nomor Telegram
            $telegramBotToken = '6355786875:AAHOL89jXFChVEKR2FNcUIipEvSQC36ONug';
            $telegramChatId = '-997905830'; // Ganti dengan ID chat Telegram yang sesuai

            $message = "Bukti pembayaran berhasil diupload untuk Order ID: " . $keranjangOrders->id . "\n"
                . "--------------------------\n"
                . "Origin Provinsi: " . $keranjangOrders->origin_provinsi . "\n"
                . "Origin Kabupaten: " . $keranjangOrders->origin_kabupaten . "\n"
                . "Origin Kecamatan: " . $keranjangOrders->origin_kecamatan . "\n"
                . "--------------------------\n"
                . "Destinasi Provinsi: " . $keranjangOrders->destinasi_provinsi . "\n"
                . "Destinasi Kabupaten: " . $keranjangOrders->destinasi_kabupaten . "\n"
                . "Destinasi Kecamatan: " . $keranjangOrders->destinasi_kecamatan . "\n"
                . "--------------------------\n"
                . "Armada: " . $keranjangOrders->armada . "\n"
                . "Whatsapp: " . $keranjangOrders->whatsapp . "\n"
                . "GetWa: https://wa.me/" . $keranjangOrders->whatsapp . "\n"
                . "--------------------------\n"
                . "Harga: " . $keranjangOrders->harga . "\n"
                . "Status Pesanan: " . $keranjangOrders->status;

            $response = Http::post("https://api.telegram.org/bot$telegramBotToken/sendMessage", [
                'chat_id' => $telegramChatId,
                'text' => $message,
            ]);
        }

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Bukti berhasil diupload.');
    }

    public function showOrderTrukShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukShorts()
                ->where('status', 'menunggu')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/ordertrukshort', compact('keranjangOrders'));
        } else {
            return view('order/ordertrukshort');
        }
    }

    public function showKonfirmasiTrukShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukShorts()
                ->where('status', 'konfirmasi')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/konfirmasitrukshort', compact('keranjangOrders'));
        } else {
            return view('order/konfirmasitrukshort');
        }
    }

    public function showProsesTrukShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukShorts()
                ->where('status', 'proses')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/prosestrukshort', compact('keranjangOrders'));
        } else {
            return view('order/prosestrukshort');
        }
    }
    public function showSelesaiTrukShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderSewaTrukShorts()
                ->whereIn('status', ['selesai', 'cancel'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/selesaitrukshort', compact('keranjangOrders'));
        } else {
            return view('order/selesaitrukshort');
        }
    }


    public function uploadImageTrukShort(Request $request, $id)
    {
        $orderId = $request->input('orderId');
        $keranjangOrders = OrderSewaTrukShort::findOrFail($orderId);

        // Proses upload gambar dan simpan ke direktori yang sesuai
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('bukti'), $namaGambar);

            // Simpan informasi gambar ke dalam data order
            $keranjangOrders->gambar = $namaGambar;
            $keranjangOrders->status = 'konfirmasi';
            $keranjangOrders->save();

             // Mengirim notifikasi ke nomor Telegram
             $telegramBotToken = '6355786875:AAHOL89jXFChVEKR2FNcUIipEvSQC36ONug';
             $telegramChatId = '-997905830'; // Ganti dengan ID chat Telegram yang sesuai
 
             $message = "Bukti pembayaran berhasil diupload untuk Order ID: " . $keranjangOrders->id . "\n"
                 . "--------------------------\n"
                 . "Origin Provinsi: " . $keranjangOrders->origin_provinsi . "\n"
                 . "Origin Kabupaten: " . $keranjangOrders->origin_kabupaten . "\n"
                 . "Origin Kecamatan: " . $keranjangOrders->origin_kecamatan . "\n"
                 . "Origin Kelurahan: " . $keranjangOrders->origin_kelurahan . "\n"
                 . "--------------------------\n"
                 . "Destinasi Provinsi: " . $keranjangOrders->destinasi_provinsi . "\n"
                 . "Destinasi Kabupaten: " . $keranjangOrders->destinasi_kabupaten . "\n"
                 . "Destinasi Kecamatan: " . $keranjangOrders->destinasi_kecamatan . "\n"
                 . "Destinasi Kelurahan: " . $keranjangOrders->destinasi_kelurahan . "\n"
                 . "--------------------------\n"
                 . "Armada: " . $keranjangOrders->armada . "\n"
                 . "Whatsapp: " . $keranjangOrders->whatsapp . "\n"
                 . "GetWa: https://wa.me/" . $keranjangOrders->whatsapp . "\n"
                 . "--------------------------\n"
                 . "Harga: " . $keranjangOrders->harga . "\n"
                 . "Status Pesanan: " . $keranjangOrders->status;
 
             $response = Http::post("https://api.telegram.org/bot$telegramBotToken/sendMessage", [
                 'chat_id' => $telegramChatId,
                 'text' => $message,
             ]);
        }

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Bukti berhasil diupload.');
    }

    public function showOrderPindahanLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanLongs()
                ->where('status', 'menunggu')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/orderpindahanlong', compact('keranjangOrders'));
        } else {
            return view('order/orderpindahanlong');
        }
    }

    public function showKonfirmasiPindahanLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanLongs()
                ->where('status', 'konfirmasi')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/konfirmasipindahanlong', compact('keranjangOrders'));
        } else {
            return view('order/konfirmasipindahanlong');
        }
    }

    public function showProsesPindahanLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanLongs()
                ->where('status', 'proses')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/prosespindahanlong', compact('keranjangOrders'));
        } else {
            return view('order/prosespindahanlong');
        }
    }
    public function showSelesaiPindahanLong()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanLongs()
                ->whereIn('status', ['selesai', 'cancel'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/selesaipindahanlong', compact('keranjangOrders'));
        } else {
            return view('order/selesaipindahanlong');
        }
    }


    public function uploadImagePindahanLong(Request $request, $id)
    {
        $orderId = $request->input('orderId');
        $keranjangOrders = OrderPindahanLong::findOrFail($orderId);

        // Proses upload gambar dan simpan ke direktori yang sesuai
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('bukti'), $namaGambar);

            // Simpan informasi gambar ke dalam data order
            $keranjangOrders->gambar = $namaGambar;
            $keranjangOrders->status = 'konfirmasi';
            $keranjangOrders->save();

             // Mengirim notifikasi ke nomor Telegram
             $telegramBotToken = '6355786875:AAHOL89jXFChVEKR2FNcUIipEvSQC36ONug';
             $telegramChatId = '-997905830'; // Ganti dengan ID chat Telegram yang sesuai
 
             $message = "Bukti pembayaran berhasil diupload untuk Order ID: " . $keranjangOrders->id . "\n"
                 . "--------------------------\n"
                 . "Origin Provinsi: " . $keranjangOrders->origin_provinsi . "\n"
                 . "Origin Kabupaten: " . $keranjangOrders->origin_kabupaten . "\n"
                 . "Origin Kecamatan: " . $keranjangOrders->origin_kecamatan . "\n"
                 . "--------------------------\n"
                 . "Destinasi Provinsi: " . $keranjangOrders->destinasi_provinsi . "\n"
                 . "Destinasi Kabupaten: " . $keranjangOrders->destinasi_kabupaten . "\n"
                 . "Destinasi Kecamatan: " . $keranjangOrders->destinasi_kecamatan . "\n"
                 . "--------------------------\n"
                 . "Armada: " . $keranjangOrders->armada . "\n"
                 . "Helper: " . $keranjangOrders->tkbm . "\n"
                 . "Whatsapp: " . $keranjangOrders->whatsapp . "\n"
                 . "GetWa: https://wa.me/" . $keranjangOrders->whatsapp . "\n"
                 . "--------------------------\n"
                 . "Harga: " . $keranjangOrders->harga . "\n"
                 . "Status Pesanan: " . $keranjangOrders->status;
 
             $response = Http::post("https://api.telegram.org/bot$telegramBotToken/sendMessage", [
                 'chat_id' => $telegramChatId,
                 'text' => $message,
             ]);
        }

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Bukti berhasil diupload.');
    }

    public function showOrderPindahanShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanShorts()
                ->where('status', 'menunggu')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/orderpindahanshort', compact('keranjangOrders'));
        } else {
            return view('order/orderpindahanshort');
        }
    }

    public function showKonfirmasiPindahanShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanShorts()
                ->where('status', 'konfirmasi')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/konfirmasipindahanshort', compact('keranjangOrders'));
        } else {
            return view('order/konfirmasipindahanshort');
        }
    }

    public function showProsesPindahanShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanShorts()
                ->where('status', 'proses')
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/prosespindahanshort', compact('keranjangOrders'));
        } else {
            return view('order/prosespindahanshort');
        }
    }
    public function showSelesaiPindahanShort()
    {
        $user_id = auth()->user()->id;

        $user = User::find($user_id);

        if ($user) {
            $keranjangOrders = $user->orderPindahanShorts()
                ->whereIn('status', ['selesai', 'cancel'])
                ->orderBy('created_at', 'desc')
                ->get();

            return view('order/selesaipindahanshort', compact('keranjangOrders'));
        } else {
            return view('order/selesaipindahanshort');
        }
    }


    public function uploadImagePindahanShort(Request $request, $id)
    {
        $orderId = $request->input('orderId');
        $keranjangOrders = OrderPindahanShort::findOrFail($orderId);

        // Proses upload gambar dan simpan ke direktori yang sesuai
        if ($request->hasFile('gambar')) {
            $gambar = $request->file('gambar');
            $namaGambar = time() . '.' . $gambar->getClientOriginalExtension();
            $gambar->move(public_path('bukti'), $namaGambar);

            // Simpan informasi gambar ke dalam data order
            $keranjangOrders->gambar = $namaGambar;
            $keranjangOrders->status = 'konfirmasi';
            $keranjangOrders->save();

             // Mengirim notifikasi ke nomor Telegram
             $telegramBotToken = '6355786875:AAHOL89jXFChVEKR2FNcUIipEvSQC36ONug';
             $telegramChatId = '-997905830'; // Ganti dengan ID chat Telegram yang sesuai
 
             $message = "Bukti pembayaran berhasil diupload untuk Order ID: " . $keranjangOrders->id . "\n"
                 . "--------------------------\n"
                 . "Origin Provinsi: " . $keranjangOrders->origin_provinsi . "\n"
                 . "Origin Kabupaten: " . $keranjangOrders->origin_kabupaten . "\n"
                 . "Origin Kecamatan: " . $keranjangOrders->origin_kecamatan . "\n"
                 . "Origin Kelurahan: " . $keranjangOrders->origin_kelurahan . "\n"
                 . "--------------------------\n"
                 . "Destinasi Provinsi: " . $keranjangOrders->destinasi_provinsi . "\n"
                 . "Destinasi Kabupaten: " . $keranjangOrders->destinasi_kabupaten . "\n"
                 . "Destinasi Kecamatan: " . $keranjangOrders->destinasi_kecamatan . "\n"
                 . "Destinasi Kelurahan: " . $keranjangOrders->destinasi_kelurahan . "\n"
                 . "--------------------------\n"
                 . "Armada: " . $keranjangOrders->armada . "\n"
                 . "Helper: " . $keranjangOrders->tkbm . "\n"
                 . "Whatsapp: " . $keranjangOrders->whatsapp . "\n"
                 . "GetWa: https://wa.me/" . $keranjangOrders->whatsapp . "\n"
                 . "--------------------------\n"
                 . "Harga: " . $keranjangOrders->harga . "\n"
                 . "Status Pesanan: " . $keranjangOrders->status;
 
             $response = Http::post("https://api.telegram.org/bot$telegramBotToken/sendMessage", [
                 'chat_id' => $telegramChatId,
                 'text' => $message,
             ]);
        }

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return back()->with('success', 'Bukti berhasil diupload.');
    }
}
