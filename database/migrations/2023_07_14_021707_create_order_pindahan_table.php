<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_pindahan_long', function (Blueprint $table) {
            $table->id();
            $table->string('origin_provinsi')->nullable();
            $table->string('origin_kabupaten')->nullable();
            $table->string('origin_kecamatan')->nullable();
            $table->string('destinasi_provinsi')->nullable();
            $table->string('destinasi_kabupaten')->nullable();
            $table->string('destinasi_kecamatan')->nullable();
            $table->enum('armada',['PickUp','CDD','CDE','Fuso','Long','Box'])->nullable();
            $table->enum('tkbm',['1 Orang','2 Orang','3 Orang','4 Orang','5 Orang','6 Orang'])->nullable();
            $table->unsignedBigInteger('harga')->nullable();
            $table->string('whatsapp')->nullable();
            $table->string('nama')->nullable();
            $table->string('email')->nullable();
            $table->string('home_provinsi')->nullable();
            $table->string('home_kabupaten')->nullable();
            $table->string('home_kecamatan')->nullable();
            $table->text('detail_alamat_home')->nullable();
            $table->text('detail_alamat_origin')->nullable();
            $table->text('detail_alamat_destinasi')->nullable();
            $table->date('rencana_kirim')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_pindahan_long');
        
    }
    
};
