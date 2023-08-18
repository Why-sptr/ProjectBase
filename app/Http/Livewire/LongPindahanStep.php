<?php

namespace App\Http\Livewire;

use App\Models\OrderPindahanLong;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LongPindahanStep extends Component
{

    public $origin_provinsi;
    public $origin_kabupaten;
    public $origin_kecamatan;
    public $destinasi_provinsi;
    public $destinasi_kabupaten;
    public $destinasi_kecamatan;
    public $armada;
    public $tkbm;
    public $harga = null;
    public $whatsapp;
    public $nama;
    public $email;
    public $jenis_kelamin;
    public $home_provinsi;
    public $home_kabupaten;
    public $home_kecamatan;
    public $detail_alamat_home;
    public $detail_alamat_origin;
    public $detail_alamat_destinasi;
    public $rencana_kirim;
    public $paket;
    public $status;
    public $harga_id;


    public $totalSteps = 4;
    public $currentStep = 1;

    public function mount($harga, $harga_id)
    {
        $this->currentStep = 1;
        $this->harga = $harga;
        $this->harga_id = $harga_id;
        $this->nama = $harga->nama;
        $user = Auth::user();
        if ($user) {
            $this->email = $user->email;
        }
        $this->whatsapp = $harga->whatsapp;
        $this->tkbm = $harga->tkbm;
        $this->home_provinsi = $harga->home_provinsi;
        $this->home_kabupaten = $harga->home_kabupaten;
        $this->home_kecamatan = $harga->home_kecamatan;
        $this->detail_alamat_home = $harga->detail_alamat_home;
        $this->detail_alamat_origin = $harga->detail_alamat_origin;
        $this->detail_alamat_destinasi = $harga->detail_alamat_destinasi;
        $this->origin_provinsi = $harga->origin_provinsi;
        $this->origin_kabupaten = $harga->origin_kabupaten;
        $this->origin_kecamatan = $harga->origin_kecamatan;
        $this->destinasi_provinsi = $harga->destinasi_provinsi;
        $this->destinasi_kabupaten = $harga->destinasi_kabupaten;
        $this->destinasi_kecamatan = $harga->destinasi_kecamatan;
        $this->armada = $harga->armada;
        $this->status = $harga->status;
        $this->paket = $harga->paket;
        $this->rencana_kirim = $harga->rencana_kirim;
    }
    public function render()
    {
        return view('livewire.long-pindahan-step');
    }


    public function increaseStep()
    {
        $this->resetErrorBag();
        $this->validateData();
        $this->currentStep++;
        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    public function decreaseStep()
    {
        $this->resetErrorBag();
        $this->currentStep--;
        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validate([
                'whatsapp' => 'required|string',
                'nama' => 'required|string',
                'email' => 'required|email',
                'status' => 'required',
            ]);
        } elseif ($this->currentStep == 2) {
            $this->validate([
                'home_provinsi' => 'required|string',
                'home_kabupaten' => 'required|string',
                'home_kecamatan' => 'required|string',
                'detail_alamat_home' => 'required|string',
            ]);
        } elseif ($this->currentStep == 3) {
            $this->validate([
                'origin_provinsi' => 'required|string',
                'origin_kabupaten' => 'required|string',
                'origin_kecamatan' => 'required|string',
                'destinasi_provinsi' => 'required|string',
                'destinasi_kabupaten' => 'required|string',
                'destinasi_kecamatan' => 'required|string',
                'detail_alamat_origin' => 'required|string',
                'detail_alamat_destinasi' => 'required|string',
                'armada' => 'required|string|in:pickup,L300,CDE Bak,CDE Box,CDD Bak,CDD Box,CDD Long Box,Fuso Bak,Fuso Box,tronton bak/3away,tronton wing box/build up',
                'rencana_kirim' => 'required|date',
                'paket' => 'required|string',
            ]);
        } elseif ($this->currentStep == 4) {
            $this->validate([
                'origin_provinsi' => 'required|string',
                'origin_kabupaten' => 'required|string',
                'origin_kecamatan' => 'required|string',
                'destinasi_provinsi' => 'required|string',
                'destinasi_kabupaten' => 'required|string',
                'destinasi_kecamatan' => 'required|string',
                'detail_alamat_origin' => 'required|string',
                'detail_alamat_destinasi' => 'required|string',
                'tkbm' => 'required|string',
                'armada' => 'required|string|in:pickup,L300,CDE Bak,CDE Box,CDD Bak,CDD Box,CDD Long Box,Fuso Bak,Fuso Box,tronton bak/3away,tronton wing box/build up',
                'rencana_kirim' => 'required|date',
            ]);
        }
    }

    public function hitungHarga()
    {
        // Fetch the previous price from the database based on $harga_id
        $previousPrice = OrderPindahanLong::where('id', $this->harga_id)->value('harga');

        if ($previousPrice === null || $previousPrice === 0) {
            // If no previous price or previous price is 0, set $harga to 0
            $this->harga = 0;
        } else {
            // If a previous price is found, use it
            $this->harga = $previousPrice;
        }

        // Calculate the price based on the selected package
        if ($this->paket == 1) {
            // If paket 1 is selected, add 200,000 to the previous price
            $this->harga += 200000;
        } elseif ($this->paket == 2) {
            // If paket 2 is selected, add 500,000 to the previous price
            $this->harga += 500000;
        }
    }
    public function updateorder()
    {

        OrderPindahanLong::where('id', $this->harga_id)->update([
            'nama' => $this->nama,
            'email' => $this->email,
            'whatsapp' => $this->whatsapp,
            'home_provinsi' => $this->home_provinsi,
            'home_kabupaten' => $this->home_kabupaten,
            'home_kecamatan' => $this->home_kecamatan,
            'detail_alamat_home' => $this->detail_alamat_home,
            'detail_alamat_origin' => $this->detail_alamat_origin,
            'detail_alamat_destinasi' => $this->detail_alamat_destinasi,
            'origin_provinsi' => $this->origin_provinsi,
            'origin_kabupaten' => $this->origin_kabupaten,
            'origin_kecamatan' => $this->origin_kecamatan,
            'destinasi_provinsi' => $this->destinasi_provinsi,
            'destinasi_kabupaten' => $this->destinasi_kabupaten,
            'destinasi_kecamatan' => $this->destinasi_kecamatan,
            'armada' => $this->armada,
            'tkbm' => $this->tkbm,
            'paket' => $this->paket,
            'status' => 'menunggu',
            'rencana_kirim' => $this->rencana_kirim,
            'harga' => $this->harga,
        ]);

        // Panggil fungsi hitungHarga untuk menghitung harga berdasarkan paket yang dipilih
        $this->hitungHarga();
        $this->nama = NULL;
        $this->email = NULL;
        $this->whatsapp = NULL;
        $this->home_provinsi = NULL;
        $this->home_kabupaten = NULL;
        $this->home_kecamatan = NULL;
        $this->detail_alamat_home = NULL;
        $this->detail_alamat_origin = NULL;
        $this->detail_alamat_destinasi = NULL;
        $this->origin_provinsi = NULL;
        $this->origin_kabupaten = NULL;
        $this->origin_kecamatan = NULL;
        $this->destinasi_provinsi = NULL;
        $this->destinasi_kabupaten = NULL;
        $this->destinasi_kecamatan = NULL;
        $this->armada = NULL;
        $this->tkbm = NULL;
        $this->paket = NULL;
        $this->status = NULL;
        $this->rencana_kirim = NULL;

        redirect()->route('pindahan')->with('success', 'Terima Kasih Atas Pesanan Anda, CS Kami Akan Segera Menghubungi Anda');
    }
}
