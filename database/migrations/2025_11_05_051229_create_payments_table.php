<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('payments', function (Blueprint $table) {
            $table->id('id_payment');
            $table->unsignedBigInteger('id_detailorder');
            $table->string('metode_pemb', 50);
            $table->decimal('diskon', 10, 2)->nullable();
            $table->decimal('ongkos_kirim', 10, 2);
            $table->decimal('total_harga', 12, 2);
            $table->timestamps();

            // Foreign Key
            $table->foreign('id_detailorder')->references('id_detailorder')->on('detail_orders')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('payments');
    }
};
