@extends('layouts.app')


@section('title')
    {{ $judulHalaman ?? 'Daftar Siswa PKL' }}
@endsection



@section('content')


<h2>
    {{ $judulHalaman ?? 'Daftar Siswa PKL' }}
</h2>



<a href="{{ route('siswa.create') }}">
    + Tambah Siswa PKL
</a>


<br><br>



@if(session('success'))

<div style="color: green;">
    {{ session('success') }}
</div>

@endif



<br>



<table border="1" cellpadding="8" cellspacing="0" width="100%">


<thead>

<tr>

<th>No</th>

<th>NIS</th>

<th>Nama Siswa</th>

<th>Kelas</th>

<th>Perusahaan</th>

<th>Periode PKL</th>

<th>Status</th>

<th>Aksi</th>


</tr>

</thead>



<tbody>


@forelse($siswa as $index => $s)


<tr>


<td>
    {{ $siswa->firstItem() + $index }}
</td>



<td>
    {{ $s->nis }}
</td>



<td>
    {{ $s->nama }}
</td>



<td>
    {{ $s->kelas }}
</td>



<td>

@if($s->perusahaan)

    {{ $s->perusahaan->nama_perusahaan }}

@else

    Belum Ada

@endif

</td>




<td>

{{ $s->tanggal_mulai_pkl }}

<br>

<b>s/d</b>

<br>

{{ $s->tanggal_selesai_pkl }}


</td>





<td>


@if(isset($tanggalSekarang))


    @if($tanggalSekarang < $s->tanggal_mulai_pkl)


        <span style="color: blue;">
            Belum Mulai PKL
        </span>



    @elseif(
        $tanggalSekarang >= $s->tanggal_mulai_pkl &&
        $tanggalSekarang <= $s->tanggal_selesai_pkl
    )


        <span style="color: green;">
            Sedang PKL
        </span>



    @else


        <span style="color: gray;">
            Selesai PKL
        </span>



    @endif



@else


    <span>
        Tidak diketahui
    </span>


@endif


</td>






<td>


<a href="{{ route('siswa.show',$s->id) }}">
    Detail
</a>



|

<a href="{{ route('siswa.edit',$s->id) }}">
    Edit
</a>



|



<form
action="{{ route('siswa.destroy',$s->id) }}"
method="POST"
style="display:inline;"
>


@csrf

@method('DELETE')


<button
type="submit"
onclick="return confirm('Yakin ingin menghapus data siswa ini?')"
>

Hapus

</button>


</form>



</td>



</tr>



@empty


<tr>

<td colspan="8" align="center">

Data siswa PKL belum tersedia.

</td>


</tr>



@endforelse



</tbody>



</table>




<br>



{{ $siswa->links() }}



@endsection