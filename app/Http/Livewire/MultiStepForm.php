<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderSewaTrukLong;

class MultiStepForm extends Component
{

    public $origin_provinsi;
    public $origin_kabupaten;
    public $origin_kecamatan;
    public $destinasi_provinsi;
    public $destinasi_kabupaten;
    public $destinasi_kecamatan;
    public $armada;
    public $harga;
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
    public $orderId;
    public $order;
    public $isUpdatingOrder;


    public $totalSteps = 3;
    public $currentStep = 1;

    public function mount()
    {
        $this->currentStep = 1;
    }
    public function render()
    {
        return view('livewire.multi-step-form');
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
                'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
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
                'armada' => 'required|string|in:PickUp,CDD,CDE,Fuso,Long,Box',
                'rencana_kirim' => 'required|date',
            ]);
        }
    }
     public function updateorder()
     {
         $order = OrderSewaTrukLong::find($this->orderId);

         if (!$order) {
             return response()->json(['message' => 'Order not found'], 404);
         }

         //Validasi input yang diperlukan
         $validatedData = $this->validate([
             'origin_provinsi' => 'required|string',
             'origin_kabupaten' => 'required|string',
             'origin_kecamatan' => 'required|string',
             'destinasi_provinsi' => 'required|string',
             'destinasi_kabupaten' => 'required|string',
             'destinasi_kecamatan' => 'required|string',
             'armada' => 'required|string|in:PickUp,CDD,CDE,Fuso,Long,Box',
             'harga' => 'required|integer',
             'whatsapp' => 'required|string',
             'nama' => 'required|string',
             'email' => 'required|email',
             'jenis_kelamin' => 'required|string|in:laki-laki,perempuan',
             'home_provinsi' => 'required|string',
             'home_kabupaten' => 'required|string',
             'home_kecamatan' => 'required|string',
             'detail_alamat_home' => 'required|string',
             'detail_alamat_origin' => 'required|string',
             'detail_alamat_destinasi' => 'required|string',
             'rencana_kirim' => 'required|date',
         ]);

        // Update data order
         $order->update($validatedData);

         return response()->json(['message' => 'Order updated successfully'], 200);
     }
}
    
