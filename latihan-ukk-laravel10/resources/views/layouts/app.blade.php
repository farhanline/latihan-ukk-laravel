<!DOCTYPE html>
<html lang="id">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <title>
        @yield('title', 'Sistem E-PKL')
    </title>


    <style>

        body {
            font-family: Arial, sans-serif;
            margin: 30px;
            background-color: #f8f9fa;
        }


        header {
            background-color: #0d6efd;
            color: white;
            padding: 15px;
            border-radius: 8px;
        }


        nav {
            margin: 20px 0;
        }


        nav a {

            text-decoration: none;
            color: #0d6efd;
            margin-right: 10px;

        }


        main {

            background: white;
            padding: 20px;
            border-radius: 8px;

        }


        table {

            width: 100%;
            border-collapse: collapse;

        }


        table th {

            background-color: #0d6efd;
            color:white;

        }


        table th,
        table td {

            border:1px solid #ddd;
            padding:8px;

        }


        footer {

            margin-top:30px;
            text-align:center;
            color:#666;

        }


    </style>


</head>



<body>



<header>

    <h1>
        Sistem Informasi Praktik Kerja Lapangan
    </h1>


    <p>
        SMK - E-PKL
    </p>


</header>




<nav>


    <a href="{{ url('/') }}">
        Home
    </a>


    |


    <a href="{{ route('siswa.index') }}">
        Data Siswa
    </a>


    |


    <a href="{{ route('perusahaan.index') }}">
        Perusahaan
    </a>



</nav>



<hr>




<main>


    {{-- Pesan sukses / error --}}

    @include('partials.alert')



    {{-- Isi halaman --}}

    @yield('content')



</main>




<footer>


    <hr>


    <p>

        &copy; {{ date('Y') }}

        SMK - Sistem Informasi E-PKL

    </p>


</footer>




</body>

</html>