@extends('admin.layouts.master')
@section('title', 'Daftar Rute')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Rute</h3>
                <p class="text-subtitle text-muted">Berbagai pilihan rute</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('routes.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah rute
                </a>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-body">
                @if (session('success'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <p><i class="bi bi-check-circle-fill"></i> {{ session('success') }}</p>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Asal - Tujuan</th>
                            <th>Harga</th>
                            <th class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($routes as $route)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                               {{$route->origin}} - {{$route->destination}}
                            </td>
                            
                            <td> {{ 'Rp'. number_format($route->price, 0, ',','.') }}</td>
                         
                          
                            <td>
                                <a href="{{route('routes.edit', $route->id)}}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                 <form action="{{ route('routes.destroy', $route->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menghapus rute ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                            
                         
                        </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>
@endsection

@section('script')
<script src="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{env('APP_URL')}}/assets/admin/static/js/pages/simple-datatables.js"></script>
@endsection