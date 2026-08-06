@extends('layouts.app')


@section('title')
Tambah Siswa PKL
@endsection



@section('content')


<h2>
Tambah Data Siswa PKL
</h2>



<form action="{{ route('siswa.store') }}" method="POST">

@csrf


<table border="1" cellpadding="8">


<tr>

<td>
NIS
</td>

<td>
<input type="text" name="nis">
</td>

</tr>



<tr>

<td>
Nama Siswa
</td>

<td>
<input type="text" name="nama">
</td>

</tr>



<tr>

<td>
Kelas
</td>

<td>
<input type="text" name="kelas">
</td>

</tr>



<tr>

<td>
Tanggal Mulai PKL
</td>

<td>
<input type="date" name="tanggal_mulai_pkl">
</td>

</tr>



<tr>

<td>
Tanggal Selesai PKL
</td>

<td>
<input type="date" name="tanggal_selesai_pkl">
</td>

</tr>




<tr>

<td>
Perusahaan
</td>


<td>


<select name="perusahaan_id">


<option value="">
-- Pilih Perusahaan --
</option>



@foreach($perusahaan as $p)

<option value="{{ $p->id }}">

{{ $p->nama_perusahaan }}

</option>


@endforeach



</select>


</td>

</tr>




<tr>

<td></td>

<td>

<button type="submit">
Simpan
</button>


<a href="{{ route('siswa.index') }}">
Kembali
</a>


</td>

</tr>



</table>



</form>



@endsection