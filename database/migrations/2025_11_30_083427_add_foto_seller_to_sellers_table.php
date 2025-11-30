<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
   public function up()
{
    Schema::table('sellers', function (Blueprint $table) {
        $table->string('foto_seller')->nullable()->after('password_seller');
    });
}

public function down()
{
    Schema::table('sellers', function (Blueprint $table) {
        $table->dropColumn('foto_seller');
    });
}
};
