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
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal_transaksi');
            $table->unsignedBigInteger('id_pelanggan')->nullable();
            $table->integer('total_harga', 10, 2);
            $table->enum("pembayaran", ["Cash", "Hutang", "Campur"]);
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('id_pelanggan')->references('id')->on('pelanggans')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
