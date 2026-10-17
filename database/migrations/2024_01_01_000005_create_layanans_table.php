<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('layanans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_layanan_id')->constrained('kategori_layanans')->cascadeOnDelete();
            $table->string('nama_layanan', 100);
            $table->text('deskripsi')->nullable();
            $table->string('estimasi_waktu', 50)->nullable();
            $table->decimal('harga_mulai', 12, 2)->default(0);
            $table->string('foto')->nullable();
            $table->enum('status', ['aktif', 'nonaktif'])->default('aktif');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('layanans');
    }
};
