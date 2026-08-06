<?php

namespace App\Http\Controllers;


use App\Models\Perusahaan;
use Illuminate\Http\Request;



class PerusahaanController extends Controller
{


    /**
     * Menampilkan daftar perusahaan PKL
     */
    public function index()
    {

        $judulHalaman = "Daftar Perusahaan Mitra PKL";


        $perusahaan = Perusahaan::withCount('siswa')
            ->latest()
            ->get();



        return view(
            'perusahaan.index',
            compact(
                'judulHalaman',
                'perusahaan'
            )
        );

    }




    /**
     * Menampilkan detail perusahaan
     */
    public function show($id)
    {

        $perusahaan = Perusahaan::with('siswa')
            ->findOrFail($id);



        return view(
            'perusahaan.show',
            compact('perusahaan')
        );

    }


}