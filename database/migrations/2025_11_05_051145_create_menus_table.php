<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
{
    Schema::create('menus', function (Blueprint $table) {
        $table->id('id_menu');
        $table->unsignedBigInteger('id_seller');
        $table->string('nama_menu');
        $table->integer('harga');
        $table->integer('stok')->default(0);
        $table->string('gambar_menu')->nullable();
        $table->timestamps();

        $table->foreign('id_seller')->references('id_seller')->on('sellers')->onDelete('cascade');
    });
}

    public function down(): void {
        Schema::dropIfExists('menus');
    }
};
