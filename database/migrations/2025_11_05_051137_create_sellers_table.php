<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('sellers', function (Blueprint $table) {
            $table->id('id_seller');
            $table->string('nama_seller');
            $table->text('alamat_seller');
            $table->string('telp_seller', 20);
            $table->string('email_seller')->unique();
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('sellers');
    }
};
