@extends('layouts.app')

{{--Customixe Layout Sections--}}

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manager Kategori</div>
            <div class="card-body"> {{ $dataTable->table() }}
            <a class="btn btn-primary" href={{url("/kategori/create")}}>Tambah Kategori</a>
        </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{ $dataTable->scripts() }}
@endpush