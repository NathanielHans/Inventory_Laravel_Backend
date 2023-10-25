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
        Schema::create('barangs', function (Blueprint $table) {
            $table->id();
            $table->string('nama_barang');
            $table->string('merk_type');
            $table->string('status')->default('Baik');
            $table->decimal('harga_beli', 10, 2); // Tambahkan kolom harga_beli
            $table->date('tanggal_pembelian'); // Tambahkan kolom tanggal_pembelian
            $table->unsignedBigInteger('id_ruangan');
            $table->timestamps();

            $table->foreign('id_ruangan')->references('id')->on('ruangans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barangs');
    }
};
