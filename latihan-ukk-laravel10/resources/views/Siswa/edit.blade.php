@extends('layouts.app')


@section('title')
    Edit Siswa PKL
@endsection



@section('content')


<h2>
    Edit Data Siswa PKL
</h2>



<form action="{{ route('siswa.update',$siswa->id) }}" method="POST">


@csrf

@method('PUT')



<label>
    NIS
</label>

<br>

<input 
type="text"
name="nis"
value="{{ $siswa->nis }}"
>

<br><br>




<label>
    Nama Siswa
</label>

<br>

<input 
type="text"
name="nama"
value="{{ $siswa->nama }}"
>

<br><br>




<label>
    Kelas
</label>

<br>

<input 
type="text"
name="kelas"
value="{{ $siswa->kelas }}"
>

<br><br>




<label>
    Tanggal Mulai PKL
</label>

<br>

<input 
type="date"
name="tanggal_mulai_pkl"
value="{{ $siswa->tanggal_mulai_pkl }}"
>

<br><br>




<label>
    Tanggal Selesai PKL
</label>

<br>

<input 
type="date"
name="tanggal_selesai_pkl"
value="{{ $siswa->tanggal_selesai_pkl }}"
>

<br><br>




<label>
    Perusahaan PKL
</label>

<br>


<select name="perusahaan_id">


<option value="">
    -- Pilih Perusahaan --
</option>



@foreach($perusahaan as $p)


<option 
value="{{ $p->id }}"

@if($p->id == $siswa->perusahaan_id)

selected

@endif

>

{{ $p->nama_perusahaan }}

</option>


@endforeach


</select>



<br><br>



<button type="submit">

Update Data

</button>



<a href="{{ route('siswa.index') }}">

Kembali

</a>



</form>


@endsection