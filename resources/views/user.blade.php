<html>
    <head>
        <title>Data User</title>
    </head>
    <body>
        <h1>Data User</h1>
        <a href={{url ("/user/tambah")}}>+ Tambah User</a>
        <table border="1" cellpadding="2" cellspacing="0">
            <tr>
                {{-- <th>Jumlah Pengguna</th> --}}
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
                <td>Aksi</td>
            </tr>
            @foreach($data as $d)
            <tr>
                {{-- <td>{{$data}}</td> --}}
                <td>{{$d->user_id}}</td>
                <td>{{$d->username}}</td>
                <td>{{$d->name}}</td>
                <td>{{$d->level_id}}</td>
                <td><a href="{{ url('/user/ubah/'.$d->user_id) }}">Ubah</a> | 
                    <a href="{{ url('/user/hapus/'.$d->user_id) }}">Hapus</a></td>
            </tr>
            @endforeach
        </table>
    </body>
</html>