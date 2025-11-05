<?php

namespace App\Http\Controllers\Pemberi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BeasiswaModel;
use Illuminate\Support\Str;

class BeasiswaController extends Controller
{
    /**
     * Menampilkan daftar beasiswa milik pemberi.
     */
    public function index()
    {
        $dataBeasiswa = BeasiswaModel::orderBy('dibuat_tanggal', 'desc')->get();
        return view('pemberi.beasiswa.index', compact('dataBeasiswa'));
    }

    /**
     * Menampilkan form tambah beasiswa.
     */
    public function create()
    {
        return view('pemberi.beasiswa.create');
    }

    /**
     * Simpan data beasiswa baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pemberi_id' => 'required',
            'judul_beasiswa' => 'required|max:150',
            'deskripsi' => 'required',
            'negara' => 'required',
            'jenis' => 'required',
            'jenjang' => 'required',
            'persyaratan' => 'required',
            'manfaat' => 'required',
            'batas_pendaftaran' => 'required|date',
        ]);

        BeasiswaModel::create([
            'beasiswa_id' => Str::random(10),
            'pemberi_id' => $request->pemberi_id,
            'judul_beasiswa' => $request->judul_beasiswa,
            'deskripsi' => $request->deskripsi,
            'negara' => $request->negara,
            'jenis' => $request->jenis,
            'jenjang' => $request->jenjang,
            'bidang_studi' => $request->bidang_studi,
            'persyaratan' => $request->persyaratan,
            'manfaat' => $request->manfaat,
            'batas_pendaftaran' => $request->batas_pendaftaran,
            'tautan_pendaftaran' => $request->tautan_pendaftaran,
            'status' => 'Menunggu Verifikasi',
        ]);

        return redirect()->route('pemberi.beasiswa.index')->with('success', 'Beasiswa berhasil ditambahkan!');
    }

    /**
     * Menampilkan detail beasiswa.
     */
    public function show($id)
    {
        $beasiswa = BeasiswaModel::findOrFail($id);
        return view('pemberi.beasiswa.show', compact('beasiswa'));
    }

    /**
     * Form edit beasiswa.
     */
    public function edit($id)
    {
        $beasiswa = BeasiswaModel::findOrFail($id);
        return view('pemberi.beasiswa.edit', compact('beasiswa'));
    }

    /**
     * Update data beasiswa.
     */
    public function update(Request $request, $id)
    {
        $beasiswa = BeasiswaModel::findOrFail($id);

        $beasiswa->update($request->all());

        return redirect()->route('pemberi.beasiswa.index')->with('success', 'Data beasiswa berhasil diperbarui!');
    }

    /**
     * Hapus data beasiswa.
     */
    public function destroy($id)
    {
        $beasiswa = BeasiswaModel::findOrFail($id);
        $beasiswa->delete();

        return redirect()->route('pemberi.beasiswa.index')->with('success', 'Beasiswa berhasil dihapus!');
    }
}
