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
        Schema::create('hutangs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hutang_id_pelanggan');
            $table->decimal('total_hutang', 10, 2);
            $table->enum('status_pembayaran', ['Belum Lunas', 'Lunas Sebagian', 'Lunas Penuh']);
            $table->timestamps();

            $table->foreign('hutang_id_pelanggan')->references('id')->on('pelanggans');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hutangs');
    }
};
