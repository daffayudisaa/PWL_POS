@extends('m_user/template')
@section('content')
    <div class="row mt-5 mb-5">
        <div class="col-lg-12 margin-tb d-flex justify-content-between w-full">
            <div class="w-full">
                <h2>CRUD user</h2>
            </div>
            <div class="">
                <a class="btn btn-success" href="{{ route('m_user.create') }}"> Input User</a>
            </div>
        </div>
    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered ">
        <tr>
            <th width="20px" class="text-center">User Id</th>
            <th width="150px" class="text-center">Level Id</th>
            <th width="200px"class="text-center">Username</th>
            <th width="200px"class="text-center">Nama</th>
            <th width="150px"class="text-center">Password</th>
            <th class="text-center">Action</th>
        </tr>
        @foreach ($useri as $m_user)
            <tr>
                <td>{{ $m_user->user_id }}</td>
                <td>{{ $m_user->level_id }}</td>
                <td>{{ $m_user->username }}</td>
                <td>{{ $m_user->name }}</td>
                <td>{{ $m_user->password }}</td>
                <td class="text-center">
                    <form action="{{ route('m_user.destroy', $m_user->user_id) }}" method="POST" class="d-flex w-full gap-2 px-3">
                        <a class="btn btn-info btn-sm" href="{{ route('m_user.show', $m_user->user_id) }}">Show</a> 
                        <a class="btn btn-primary btn-sm" href="{{ route('m_user.edit', $m_user->user_id) }}">Edit</a>  
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
