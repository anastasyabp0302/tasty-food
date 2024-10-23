<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->dropColumn('images'); // Hapus kolom images
            $table->string('image')->after('id'); // Tambahkan kolom image
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('galleries', function (Blueprint $table) {
            $table->string('images')->after('id'); // Kembalikan kolom images jika rollback
            $table->dropColumn('image'); // Hapus kolom image jika rollback
        });
    }
};
