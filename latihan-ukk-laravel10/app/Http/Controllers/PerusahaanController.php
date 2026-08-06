<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;

class PerusahaanController extends Controller
{

    /**
     * Menampilkan daftar perusahaan
     */
    public function index()
    {
        $perusahaan = Perusahaan::latest()->paginate(10);

        return view(
            'perusahaan.index',
            compact('perusahaan')
        );
    }



    /**
     * Menampilkan detail perusahaan
     */
    public function show($id)
    {
        $perusahaan = Perusahaan::findOrFail($id);


        return view(
            'perusahaan.show',
            compact('perusahaan')
        );
    }

}
