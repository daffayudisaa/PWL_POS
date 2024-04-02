<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Laravel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* Ganti warna teks menjadi putih */
        body {
            color: white !important;
        }

        /* Ganti warna latar belakang menjadi biru langit */
        /* body { */
            /* background-color: #87CEEB !important; */
        /* } */

        /* Ganti warna latar belakang container menjadi putih */
        .container {
            /* background-color: white !important; */
            /* color: #333 !important; */
            border-radius: 10px;
            padding: 20px;
            margin-top: 50px;
        }
    </style>
</head>

<body>
    <div class="container">
        @yield('content')
    </div>

    {{-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script> --}}
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
