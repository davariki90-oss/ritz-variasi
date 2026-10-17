<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('kode_booking', 20)->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            $table->foreignId('layanan_id')->nullable()->constrained('layanans')->nullOnDelete();
            $table->foreignId('produk_id')->nullable()->constrained('produks')->nullOnDelete();

            $table->string('nama_pemesan', 100);
            $table->string('no_hp', 20);
            $table->string('merk_mobil', 50);
            $table->string('tipe_mobil', 50);
            $table->string('tahun_mobil', 4);
            $table->string('plat_nomor', 20);

            $table->date('tanggal_booking');
            $table->time('jam_booking');
            $table->text('catatan')->nullable();

            $table->enum('status', [
                'menunggu_konfirmasi',
                'diterima',
                'ditolak',
                'dikerjakan',
                'selesai',
            ])->default('menunggu_konfirmasi');
            $table->string('alasan_tolak', 255)->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
