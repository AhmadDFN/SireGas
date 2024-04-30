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
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pembayaran_id_hutang');
            $table->integer('jumlah_pembayaran');
            $table->date('tanggal_pembayaran');
            $table->timestamps();

            $table->foreign('pembayaran_id_hutang')->references('id')->on('hutangs');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
