@extends('admin.layouts.master')
@section('content')
@section('title', 'Dashboard')
@section('css')

@endsection

@section('content')

    <div class="page-heading">

        <h3>Selamat Datang, {{ Auth::user()->name }} sebagai {{ Auth::user()->role->role_name }}</h3>
    </div>

    @if (Auth::user()->role->role_name == 'driver')
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Akun</h4>
            </div>
            <div class="card-body">
                Silahkan Ubah password untuk login pertama kali dengan mengklik tombol dibawah ini
            </div>
            <div class="card-body">
                <a href="{{ route('editPassword') }}" class="btn btn-primary">Ubah Password</a>
            </div>
        </div>
    @else
        <div class="page-content">
            <section class="row">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon purple mb-2">
                                                <i class="iconly-boldWallet"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Pesanan Hari Ini</h6>
                                            <h6 class="font-extrabold mb-0">{{ $totalBookingNow }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue">
                                                <i class="iconly-boldBuy"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Pendapatan Hari Ini</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ 'Rp' . number_format($totalIncomeNow, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon green mb-2">
                                                <i class="iconly-boldFolder"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Total Booking</h6>
                                            <h6 class="font-extrabold mb-0">{{ $totalBooking }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-lg-3 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5">
                                    <div class="row">
                                        <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                            <div class="stats-icon blue mb-2">
                                                <i class="iconly-boldProfile"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h6 class="text-muted font-semibold">Total Pendapatan</h6>
                                            <h6 class="font-extrabold mb-0">
                                                {{ 'Rp' . number_format($totalIncome, 0, ',', '.') }}</h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        </div>
    @endif
@endsection
@section('script')
@endsection
