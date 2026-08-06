@extends('layouts.app')


@section('title')
    Detail Siswa PKL
@endsection



@section('content')


<h2>
    Detail Siswa PKL
</h2>



<table border="1" cellpadding="8" cellspacing="0">


<tr>
    <th>NIS</th>
    <td>
        {{ $siswa->nis }}
    </td>
</tr>



<tr>
    <th>Nama Siswa</th>
    <td>
        {{ $siswa->nama }}
    </td>
</tr>



<tr>
    <th>Kelas</th>
    <td>
        {{ $siswa->kelas }}
    </td>
</tr>



<tr>
    <th>Perusahaan PKL</th>
    <td>

        {{ $siswa->perusahaan->nama_perusahaan ?? 'Belum Ada' }}

    </td>
</tr>



<tr>
    <th>Bidang Usaha</th>
    <td>

        {{ $siswa->perusahaan->bidang_usaha ?? '-' }}

    </td>
</tr>



<tr>
    <th>Tanggal Mulai PKL</th>
    <td>

        {{ $siswa->tanggal_mulai_pkl }}

    </td>
</tr>



<tr>
    <th>Tanggal Selesai PKL</th>
    <td>

        {{ $siswa->tanggal_selesai_pkl }}

    </td>
</tr>



<tr>
    <th>Status PKL</th>
    <td>


@if(now() < $siswa->tanggal_mulai_pkl)

    <span style="color:blue;">
        Belum Mulai PKL
    </span>


@elseif(
    now() >= $siswa->tanggal_mulai_pkl &&
    now() <= $siswa->tanggal_selesai_pkl
)

    <span style="color:green;">
        Sedang PKL
    </span>


@else

    <span style="color:gray;">
        Selesai PKL
    </span>


@endif


    </td>
</tr>


</table>



<br>



<a href="{{ route('siswa.edit',$siswa->id) }}">
    Edit Data
</a>


|

<a href="{{ route('siswa.index') }}">
    Kembali
</a>



@endsection