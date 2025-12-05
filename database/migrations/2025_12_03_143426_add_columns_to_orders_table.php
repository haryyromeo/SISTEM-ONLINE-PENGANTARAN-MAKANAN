<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    public function up(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->unsignedBigInteger('id_seller')->after('id_customer');
            $table->unsignedBigInteger('id_menu')->change();
            $table->integer('jumlah')->after('id_menu');
            $table->string('alamat', 255)->after('jumlah');
            $table->decimal('total_harga', 15, 2)->after('alamat');
            $table->decimal('biaya_pengiriman', 15, 2)->default(10000)->after('total_harga');
            $table->decimal('biaya_layanan', 15, 2)->default(500)->after('biaya_pengiriman');
            $table->decimal('total_keseluruhan', 15, 2)->after('biaya_layanan');
        });
    }

    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->dropColumn([
                'id_seller',
                'jumlah',
                'alamat',
                'total_harga',
                'biaya_pengiriman',
                'biaya_layanan',
                'total_keseluruhan'
            ]);
        });
    }
}
