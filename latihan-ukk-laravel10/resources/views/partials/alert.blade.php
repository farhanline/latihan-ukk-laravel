@if(session('success'))

<div style="
    background-color:#d4edda;
    color:#155724;
    padding:10px;
    margin:10px 0;
    border-radius:5px;
">

    {{ session('success') }}

</div>

@endif