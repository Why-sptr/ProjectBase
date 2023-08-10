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
            $table->string('destinasi_provinsi');
            $table->string('destinasi_kabupaten');
            $table->enum('armada',['pickup','L300','CDE Bak','CDE Box','CDD Bak','CDD Box','CDD Long Box','Fuso Bak','Fuso Box','tronton bak/3away','tronton wing box/build up']);
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

