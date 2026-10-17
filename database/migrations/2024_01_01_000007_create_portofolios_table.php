<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('portofolios', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_layanan_id')->nullable()->constrained('kategori_layanans')->nullOnDelete();
            $table->string('judul', 150);
            $table->text('deskripsi')->nullable();
            $table->string('foto_sebelum')->nullable();
            $table->string('foto_sesudah')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('portofolios');
    }
};
