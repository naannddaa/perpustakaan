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
        Schema::create('bukus', function (Blueprint $table){
            $table->id(); // Primary key otomatis
            $table->text('judul');
            $table->text('pengarang');
            $table->date('tgl_pembelian');
            $table->integer('jumlah');
            $table->enum('status', ['tersedia', 'tidak_tersedia']);
            $table->timestamps();
        });
    }
    public function down(): void
    {
        Schema::dropIfExists('bukus');
    }
};
