@extends('layouts.app')


@section('title')
Detail Siswa
@endsection



@section('content')

<h2>
Detail Siswa PKL
</h2>


<table border="1" cellpadding="8">

<tr>
    <td>NIS</td>
    <td>
        {{ $siswa->nis }}
    </td>
</tr>


<tr>
    <td>Nama</td>
    <td>
        {{ $siswa->nama }}
    </td>
</tr>


<tr>
    <td>Kelas</td>
    <td>
        {{ $siswa->kelas }}
    </td>
</tr>


<tr>
    <td>Perusahaan</td>
    <td>
        {{ $siswa->perusahaan->nama_perusahaan ?? 'Belum Ada' }}
    </td>
</tr>


</table>


<br>


<a href="{{ route('siswa.index') }}">
Kembali
</a>


@endsection