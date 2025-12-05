<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id('id_order');

            // FK ke customers
            $table->unsignedBigInteger('id_customer');
            $table->foreign('id_customer')
                  ->references('id_customer')
                  ->on('customers')
                  ->onDelete('cascade');

            // FK ke menus
            $table->unsignedBigInteger('id_menu');
            $table->foreign('id_menu')
                  ->references('id_menu')
                  ->on('menus')
                  ->onDelete('cascade');

            // DATA ORDER
            $table->integer('jumlah');                    // jumlah pesanan
            $table->string('alamat');                    // alamat pengiriman
            $table->integer('total_harga');              // harga awal
            $table->integer('biaya_pengiriman');         // ongkir
            $table->integer('biaya_layanan');            // biaya admin
            $table->integer('total_keseluruhan');        // total akhir

            $table->date('tanggal_order');               // tanggal
            $table->string('status_order', 50);          // pending / selesai
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
