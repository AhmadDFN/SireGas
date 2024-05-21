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
        Schema::create('detail_transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('detail_id_transaksi');
            $table->unsignedBigInteger('detail_id_produk');
            $table->decimal('detail_jumlah', 10, 2);
            $table->decimal('detail_harga', 10, 2);
            $table->decimal('detail_total_harga', 10, 2);
            $table->timestamps();

            $table->foreign('detail_id_transaksi')->references('id')->on('transaksis')->onDelete('cascade');
            // $table->foreign('detail_id_produk')->references('id')->on('produks');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_transaksis');
    }
};
