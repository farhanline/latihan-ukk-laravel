@extends('layouts.app')



@section('title')

Detail Perusahaan

@endsection




@section('content')



<h2>
Detail Perusahaan PKL
</h2>



<table border="1" cellpadding="8">



<tr>

<th>
Nama Perusahaan
</th>


<td>
{{ $perusahaan->nama_perusahaan }}
</td>


</tr>




<tr>

<th>
Bidang Usaha
</th>


<td>
{{ $perusahaan->bidang_usaha }}
</td>


</tr>



</table>



<br>



<h3>
Daftar Siswa PKL
</h3>



<table border="1" cellpadding="8">



<tr>

<th>
NIS
</th>

<th>
Nama
</th>

<th>
Kelas
</th>


</tr>



@forelse($perusahaan->siswa as $s)



<tr>


<td>
{{ $s->nis }}
</td>


<td>
{{ $s->nama }}
</td>


<td>
{{ $s->kelas }}
</td>


</tr>



@empty


<tr>

<td colspan="3">

Belum ada siswa PKL.

</td>


</tr>



@endforelse



</table>



<br>



<a href="{{ route('perusahaan.index') }}">

Kembali

</a>



@endsection