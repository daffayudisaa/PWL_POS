@extends('layouts.template')
@section('content')
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <title>File Upload</title>
    </head>
    <body>
        <hr>
        <form action="{{ url('/file-upload') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3 ml-3 mr-3">
                <label for="namaBaruFile" class="form-label">Nama File</label>
                <input type="text" class="form-control" placeholder="Masukkan Nama Baru Untuk File" id="namaBaruFile" name="namaBaruFile">
                @error('namaBaruFile')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <label for="berkas" class="form-label">Gambar Profile</label>
                <input type="file" class="form-control" id="berkas" name="berkas">
                @error('berkas')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary my-2 ml-3 mr-3">Upload</button>
        </form>
    </body>
@endsection