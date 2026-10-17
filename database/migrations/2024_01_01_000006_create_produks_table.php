<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('produks', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_produk_id')->constrained('kategori_produks')->cascadeOnDelete();
            $table->string('nama_produk', 100);
            $table->text('deskripsi')->nullable();
            $table->decimal('harga', 12, 2)->default(0);
            $table->integer('stok')->default(0);
            $table->string('foto')->nullable();
            $table->enum('status', ['tersedia', 'habis'])->default('tersedia');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('produks');
    }
};
