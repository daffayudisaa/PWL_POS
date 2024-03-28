@extends('adminlte::page')
@section('title', 'General Form')
@section('content_header')
    <h1>Form M_User</h1>
@stop
@section('content')
    <!-- general form elements disabled -->
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">M_User Tabel</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <form>
                <div class="row">
                    <div class="col">
                        <!-- text input -->
                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" class="form-control" placeholder="Masukkan Username">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <!-- textarea -->
                        <div class="form-group">
                            <label>Nama</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama">
                        </div>
                    </div>
                </div>
                <div class="row">
                  <div class="col">
                      <!-- textarea -->
                      <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" placeholder="Masukkan Password">
                      </div>
                  </div>
              </div>
                <div class="row">
                    <div class="col">
                        <!-- select -->
                        <div class="form-group">
                            <label>Level ID</label>
                            <select class="form-control">
                                <option>1</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                                <option>5</option>
                            </select>
                        </div>
                    </div>
                </div>

                <a class="btn btn-primary" href="">Tambah</a>
            </form>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
    <!-- general form elements disabled -->
@stop
@section('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/css/admin_custom.css"> --}}
@stop
@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");
    </script>
@stop
