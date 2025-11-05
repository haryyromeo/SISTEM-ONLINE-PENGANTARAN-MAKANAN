<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('detail_orders', function (Blueprint $table) {
            $table->id('id_detailorder');
            $table->unsignedBigInteger('id_menu');
            $table->unsignedBigInteger('id_order');
            $table->integer('total_orderan');
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_menu')->references('id_menu')->on('menus')->onDelete('cascade');
            $table->foreign('id_order')->references('id_order')->on('orders')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('detail_orders');
    }
};
