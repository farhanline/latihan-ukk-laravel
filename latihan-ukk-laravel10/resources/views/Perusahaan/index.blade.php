@extends('layouts.app')


@section('title')
Daftar Perusahaan PKL
@endsection

@section('content')
<h2>
    Daftar Perusahaan Mitra PKL
</h2>
<table border="1" cellpadding="8" cellspacing="0">

<thead>

<tr>

<th>
Nama Perusahaan
</th>


<th>
Bidang Usaha
</th>


<th>
Aksi
</th>

</tr>

</thead>
<tbody>
@forelse($perusahaan as $p)
<tr>
<td>
    {{ $p->nama_perusahaan }}
</td>

<td>
    {{ $p->bidang_usaha }}
</td>

<td>

<a href="{{ route('perusahaan.show',$p->id) }}">
    Detail
</a>

</td>

</tr>
@empty
<tr>

<td colspan="3">

Belum ada data perusahaan.

</td>
</tr>
@endforelse
</tbody>
</table>
@endsection