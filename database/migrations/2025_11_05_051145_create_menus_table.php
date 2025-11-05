<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('menus', function (Blueprint $table) {
            $table->id('id_menu');
            $table->unsignedBigInteger('id_customer')->nullable();
            $table->unsignedBigInteger('id_seller');
            $table->string('nama_menu');
            $table->decimal('harga_menu', 10, 2);
            $table->integer('stok_menu');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_customer')->references('id_customer')->on('customers')->onDelete('cascade');
            $table->foreign('id_seller')->references('id_seller')->on('sellers')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('menus');
    }
};
