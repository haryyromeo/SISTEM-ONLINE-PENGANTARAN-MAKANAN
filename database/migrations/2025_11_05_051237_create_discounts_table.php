<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('discounts', function (Blueprint $table) {
            $table->id('id_diskon');
            $table->unsignedBigInteger('id_detailorder');
            $table->unsignedBigInteger('id_seller');
            $table->decimal('total_diskon', 10, 2);
            $table->timestamps();

            // Foreign Keys
            $table->foreign('id_detailorder')->references('id_detailorder')->on('detail_orders')->onDelete('cascade');
            $table->foreign('id_seller')->references('id_seller')->on('sellers')->onDelete('cascade');
        });
    }

    public function down(): void {
        Schema::dropIfExists('discounts');
    }
};
