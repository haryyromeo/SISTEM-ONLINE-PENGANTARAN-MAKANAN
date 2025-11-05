<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('drivers', function (Blueprint $table) {
            $table->id('id_driver');
            $table->unsignedBigInteger('id_detailorder');
            $table->string('nama_driver');
            $table->string('telp_driver', 20);
            $table->string('status_driver', 50);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_detailorder')->references('id_detailorder')->on('detail_orders')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('drivers');
    }
};
