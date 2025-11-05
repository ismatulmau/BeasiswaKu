<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BeasiswaModel extends Model
{
    use HasFactory;

    protected $table = 'beasiswa';
    protected $primaryKey = 'beasiswa_id';
    public $incrementing = false; // karena id bukan auto increment
    protected $keyType = 'string';

    protected $fillable = [
        'beasiswa_id',
        'pemberi_id',
        'judul_beasiswa',
        'deskripsi',
        'negara',
        'jenis',
        'jenjang',
        'bidang_studi',
        'persyaratan',
        'manfaat',
        'batas_pendaftaran',
        'tautan_pendaftaran',
        'status',
        'dibuat_tanggal',
        'diperbarui_tanggal',
    ];

    public $timestamps = false;

    // Relasi ke pemberi beasiswa
    public function pemberi()
    {
        return $this->belongsTo(PemberiBeasiswaModel::class, 'pemberi_id', 'pemberi_id');
    }
}
