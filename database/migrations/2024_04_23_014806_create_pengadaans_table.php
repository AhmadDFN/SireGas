<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pengadaans', function (Blueprint $table) {
            $table->id();
            $table->string("pengadaan_id_produk");
            $table->date("pengadaan_tanggal");
            $table->integer("pengadaan_jumlah");
            $table->integer("pengadaan_harga");
            $table->integer("pengadaan_total");
            $table->string("pengadaan_catatan")->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengadaans');
    }
};
