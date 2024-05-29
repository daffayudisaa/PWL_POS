@extends('layouts.template')
@section('content')
    <head>
        <title>File Preview</title>
    </head>
    <body>
        <hr>
        <table class="table table-bordered table-striped table-hover tablesm">
            <tr>
                <th>Nama File</th>
                <td>{{ $namaFile }}</td>
            </tr>
            <tr>
                <th>Lokasi File</th>
                <td>{{ $path }}</td>
            </tr> 
        </table>
        <h3>Preview Gambar</h3>
        <div class="d-flex justify-content-center">
            <img src="{{ asset('storage/'.$path) }}" width='750px'>
        </div>
    </body>
@endsection
