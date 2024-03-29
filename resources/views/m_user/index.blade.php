@extends('layouts.app')

{{--Customixe Layout Sections--}}

@section('subtitle', 'M_User')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'M_User')

@section('content')
    <div class="card">
            <div class="card-header">Manage User</div>
            <div class="card-body"> {{ $dataTable->table() }}
            <a class="btn btn-primary" href={{url("/m_user/create")}}>Tambah Kategori</a>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush