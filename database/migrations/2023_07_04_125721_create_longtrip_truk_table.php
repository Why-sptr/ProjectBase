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
        Schema::create('longtrip_truk', function (Blueprint $table) {
            $table->id();
            $table->string('origin_provinsi');
            $table->string('origin_kabupaten');
            $table->string('origin_kecamatan');
            $table->string('destinasi_provinsi');
            $table->string('destinasi_kabupaten');
            $table->string('destinasi_kecamatan');
            $table->enum('armada',['PickUp','CDD','CDE','Fuso','Long','Box']);
            $table->unsignedBigInteger('harga');
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
        Schema::dropIfExists('longtrip_truk');
    }
};
