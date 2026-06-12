@extends('admin.layouts.master')
@section('title', 'Daftar Jadwal')

@section('css')
<link rel="stylesheet" href="{{ asset('assets/admin/extensions/simple-datatables/style.css') }}">
<link rel="stylesheet" href="{{ asset('assets/admin/compiled/css/table-datatable.css') }}">
@endsection

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Daftar Jadwal</h3>
                <p class="text-subtitle text-muted">Berbagai pilihan rute destinasi</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <a href="{{ route('scheduleList.create') }}" class="btn btn-primary float-start float-lg-end">
                    <i class="bi bi-plus"></i>
                    Tambah jadwal
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
                            <th>Gambar Mobil</th>
                            <th>Awal</th>
                            <th>Tujuan</th>
                            <th>Waktu Keberangkatan</th>
                            <th>Harga</th>
                            <th>Nama Sopir</th>
                            <th>Status</th>
                            <th  colspan="2" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($schedules as $schedule)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                              <img src="{{ asset('storage/' . (optional($schedule->vehicle)->image ?? '')) }}"
     width="60"
     class="img-fluid rounded-top"
     alt=""
     onerror="this.onerror=null;this.src='{{ optional($schedule->vehicle)->image ?? '' }}';">
                            </td>
                            <td>{{ $schedule->route->origin ?? '' }}</td>
                            <td>{{  $schedule->route->destination ?? '' }}</td>
                            <td>{{$schedule->departure_time->format('d M Y | H:i')}}</td>
                            <td>
                              
                           {{ $schedule->route?->price ? 'Rp' . number_format($schedule->route->price, 0, ',', '.') : '-' }}
                            </td>
                            <td>
                              
                                {{$schedule->driver->user->name ?? '-'}}
                            </td>
                            <td>
                               {{$schedule->status}}
                            <td>
                                 <a href="{{ route('scheduleList.edit', $schedule->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil"></i> Ubah
                                </a>
                                <td>
                                  @if ($schedule->status == 'ACTIVE')
                                    <form action="{{ route('status.nonactive', $schedule->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="is_active" value="0">
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah anda yakin ingin menonaktifkan menu ini?')">
                                            <i class="bi bi-x"></i> Nonaktifkan
                                        </button>
                                    </form>
                              
                                </td>
                            </td>
                               @elseif($schedule->status == 'NONACTIVE')
                                    <form action="{{ route('status.active', $schedule->id) }}" method="POST">
                                        @csrf
                                        <input type="hidden" name="is_active" value="1">
                                        <button type="submit" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin ingin mengaktifkan menu ini?')">
                                            <i class="bi bi-check"></i> Aktifkan
                                        </button>
                                    </form>
                                @endif
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