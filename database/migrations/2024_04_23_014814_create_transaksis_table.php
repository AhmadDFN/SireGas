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
            $table->string("trans_nota");
            $table->date('trans_tanggal');
            $table->unsignedBigInteger('trans_id_pelanggan')->nullable();
            $table->integer('trans_gtotal');
            $table->integer('trans_ppn');
            $table->enum("pembayaran", ["Cash", "Hutang", "Campur"]);
            $table->text('catatan')->nullable();
            $table->timestamps();

            $table->foreign('trans_id_pelanggan')->references('id')->on('pelanggans')->onDelete('set null');
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
