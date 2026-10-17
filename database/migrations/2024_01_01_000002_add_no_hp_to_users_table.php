<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Menambahkan kolom no_hp ke tabel users bawaan Laravel.
     * Tabel users, password_reset_tokens, dan sessions sudah otomatis
     * dibuat oleh migration default Laravel (0001_01_01_000000_create_users_table.php),
     * jadi kita hanya menambah kolom yang kita butuhkan.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('no_hp', 20)->after('email');
        });
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('no_hp');
        });
    }
};
