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


<a href="{{ route('perusahaan.index') }}">
Kembali
</a>


@endsection