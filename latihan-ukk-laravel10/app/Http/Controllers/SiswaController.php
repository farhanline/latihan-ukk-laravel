<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Carbon\Carbon;

class SiswaController extends Controller
{

    /**
     * Jumlah data setiap halaman
     */
    protected $perPage = 10;



    /**
     * Menampilkan daftar siswa PKL
     */
   public function index()
{

    $judulHalaman = "Daftar Siswa PKL";


    $siswa = Siswa::with('perusahaan')
        ->latest()
        ->paginate(10);



    $tanggalSekarang = Carbon::now();



    return view(
        'siswa.index',
        compact(
            'judulHalaman',
            'siswa',
            'tanggalSekarang'
        )
    );

}





    /**
     * Menampilkan form tambah siswa
     */
    public function create()
    {

        $perusahaan = Perusahaan::orderBy(
                'nama_perusahaan'
            )
            ->get();



        return view(
            'siswa.create',
            compact('perusahaan')
        );

    }





    /**
     * Menyimpan data siswa baru
     */
    public function store(Request $request)
    {

        $validated = $request->validate([


            'nis' => [
                'required',
                'unique:siswas,nis'
            ],


            'nama' => [
                'required',
                'string',
                'max:100'
            ],


            'kelas' => [
                'required',
                'string',
                'max:30'
            ],


            'tanggal_mulai_pkl' => [
                'required',
                'date'
            ],


            'tanggal_selesai_pkl' => [
                'required',
                'date',
                'after:tanggal_mulai_pkl'
            ],


            'perusahaan_id' => [
                'required',
                'exists:perusahaans,id'
            ]


        ]);




        Siswa::create($validated);



        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa PKL berhasil ditambahkan.'
            );

    }







    /**
     * Menampilkan detail satu siswa
     */
    public function show(Siswa $siswa)
    {

        $siswa->load('perusahaan');



        return view(
            'siswa.show',
            compact('siswa')
        );

    }







    /**
     * Menampilkan form edit siswa
     */
    public function edit(Siswa $siswa)
    {

        $perusahaan = Perusahaan::orderBy(
                'nama_perusahaan'
            )
            ->get();



        return view(
            'siswa.edit',
            compact(
                'siswa',
                'perusahaan'
            )
        );

    }







    /**
     * Memperbarui data siswa
     */
    public function update(
        Request $request,
        Siswa $siswa
    )
    {


        $validated = $request->validate([


            'nis' => [
                'required',
                'unique:siswas,nis,' . $siswa->id
            ],


            'nama' => [
                'required',
                'string',
                'max:100'
            ],


            'kelas' => [
                'required',
                'string',
                'max:30'
            ],


            'tanggal_mulai_pkl' => [
                'required',
                'date'
            ],


            'tanggal_selesai_pkl' => [
                'required',
                'date',
                'after:tanggal_mulai_pkl'
            ],


            'perusahaan_id' => [
                'required',
                'exists:perusahaans,id'
            ]


        ]);




        $siswa->update($validated);




        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                'Data siswa PKL berhasil diperbarui.'
            );

    }








    /**
     * Menghapus data siswa
     */
    public function destroy(Siswa $siswa)
    {

        $nama = $siswa->nama;


        $siswa->delete();



        return redirect()
            ->route('siswa.index')
            ->with(
                'success',
                "Data siswa {$nama} berhasil dihapus."
            );

    }


}