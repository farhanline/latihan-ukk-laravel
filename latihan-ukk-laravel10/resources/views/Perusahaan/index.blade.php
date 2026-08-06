@extends('layouts.app')


@section('title')

{{ $judulHalaman }}

@endsection




@section('content')


<h2>
    {{ $judulHalaman }}
</h2>




<a href="{{ route('siswa.index') }}">
    Kembali ke Data Siswa
</a>



<br><br>




<table border="1" cellpadding="8" cellspacing="0">


<thead>

<tr>

<th>No</th>

<th>Nama Perusahaan</th>

<th>Bidang Usaha</th>

<th>Jumlah Siswa PKL</th>

<th>Aksi</th>


</tr>


</thead>



<tbody>



@forelse($perusahaan as $index => $p)



<tr>


<td>
    {{ $index + 1 }}
</td>



<td>
    {{ $p->nama_perusahaan }}
</td>



<td>
    {{ $p->bidang_usaha }}
</td>



<td>
    {{ $p->siswa_count }}
    Siswa
</td>



<td>

<a href="{{ route('perusahaan.show',$p->id) }}">
    Detail
</a>


</td>


</tr>



@empty


<tr>

<td colspan="5">

Belum ada data perusahaan.

</td>

</tr>


@endforelse



</tbody>


</table>



@endsection