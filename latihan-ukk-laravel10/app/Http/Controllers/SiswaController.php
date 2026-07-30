<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;
use App\Models\Perusahaan;


class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
 $siswa = Siswa::with('perusahaan')->latest()->paginate(10);
 return view('siswa.index', compact('siswa'));
}
public function create()
{
 $perusahaan = Perusahaan::all();
 return view('siswa.create', compact('perusahaan'));
}
public function store(Request $request)
{
 $validated = $request->validate([
 'nis' => 'required|unique:siswas,nis',
 'nama' => 'required|string|max:100',
 'kelas' => 'required|string|max:30',
 'tanggal_mulai_pkl' => 'required|date',
 'tanggal_selesai_pkl' => 'required|date|after:tanggal_mulai_pkl',
 'perusahaan_id' => 'required|exists:perusahaans,id',
 ]);
 Siswa::create($validated);
 return redirect()->route('siswa.index')
 ->with('success', 'Data siswa PKL berhasil ditambahkan.');
}
public function edit(Siswa $siswa)
{
 $perusahaan = Perusahaan::all();
 return view('siswa.edit', compact('siswa', 'perusahaan'));
}
public function update(Request $request, Siswa $siswa)
{
 $validated = $request->validate([
 'nis' => 'required|unique:siswas,nis,' . $siswa->id,
 'nama' => 'required|string|max:100',
 'kelas' => 'required|string|max:30',
 'tanggal_mulai_pkl' => 'required|date',
 'tanggal_selesai_pkl' => 'required|date|after:tanggal_mulai_pkl',
 'perusahaan_id' => 'required|exists:perusahaans,id',
 ]);
 $siswa->update($validated);
 return redirect()->route('siswa.index')
 ->with('success', 'Data siswa PKL berhasil diperbarui.');
}
public function destroy(Siswa $siswa)
{
 $siswa->delete();
 return redirect()->route('siswa.index')
 ->with('success', 'Data siswa PKL berhasil dihapus.');
}
}
