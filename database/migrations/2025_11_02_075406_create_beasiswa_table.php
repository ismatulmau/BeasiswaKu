<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Jalankan migrasi.
     */
    public function up(): void
    {
        Schema::create('beasiswa', function (Blueprint $table) {
            $table->string('beasiswa_id', 10)->primary();
            $table->string('pemberi_id', 10);
            $table->string('judul_beasiswa', 150);
            $table->text('deskripsi');
            $table->string('negara', 100);
            $table->enum('jenis', ['Dalam Negeri', 'Luar Negeri']);
            $table->enum('jenjang', ['SD', 'SMP', 'SMA/SMK', 'Kuliah']);
            $table->string('bidang_studi', 100)->nullable();
            $table->text('persyaratan');
            $table->text('manfaat');
            $table->date('batas_pendaftaran');
            $table->string('tautan_pendaftaran', 255)->nullable();
            $table->enum('status', ['Aktif', 'Nonaktif', 'Menunggu Verifikasi'])->default('Menunggu Verifikasi');
            $table->timestamp('dibuat_tanggal')->useCurrent();
            $table->timestamp('diperbarui_tanggal')->useCurrent()->useCurrentOnUpdate();

            // relasi ke tabel pemberi
            $table->foreign('pemberi_id')->references('pemberi_id')->on('pemberi_beasiswa')->onDelete('cascade');
        });
    }

    /**
     * Batalkan migrasi.
     */
    public function down(): void
    {
        Schema::dropIfExists('beasiswa');
    }
};
