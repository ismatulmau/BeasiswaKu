<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pemberi_beasiswa', function (Blueprint $table) {
            $table->string('pemberi_id', 10)->primary();
            $table->unsignedBigInteger('user_id'); // relasi ke users(id)
            $table->string('nama_lembaga', 150);
            $table->string('penanggung_jawab', 100);
            $table->string('email', 100);
            $table->string('no_hp', 20);
            $table->string('situs_web', 150)->nullable();
            $table->text('alamat');
            $table->string('logo', 255)->nullable();
            $table->boolean('terverifikasi')->default(false);
            $table->timestamp('dibuat_tanggal')->useCurrent();
            $table->timestamp('diperbarui_tanggal')->useCurrent()->useCurrentOnUpdate();

            // 🔗 Foreign key ke tabel users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemberi_beasiswa');
    }
};
