@extends('user.master')

@section('content')
  <!-- Destinations Section -->
    <section class="section-py ">
        <div class="container">
            <h2 class="section-title slide-in-up">Rute perjalaan saat ini</h2>
            <p class="section-subtitle">Jelajahi keindahan Kalimantan Selatan bersama kami</p>

            <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="destination-card slide-in-down ">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/mobil.jpeg')}}" alt="Pantai Angsana" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body ">
                            <h3 class="destination-name">Banjarmasin - Balikpapan</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i> 21 maret | 06:00 - 12:00</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp 250.000</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> 1 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 slide-in-down">
                    <div class="destination-card ">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car.jpeg')}}" loading="lazy" alt="Candi Agung" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="destination-name">Banjarmasin - Samarinda</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i> 22 Maret | 07:30 - 14:00</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp 280.000</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> Half Day</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 slide-in-down">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car2.jpeg')}}" alt="Pulau Datu" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="destination-name">Banjarbaru - Banjarmasin</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i> 23 Maret | 05.00 - 06.00</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp 50.000</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> 2 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 slide-in-up">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/mobil.jpeg')}}" alt="Sawah Loksado" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="destination-name">Martapura - Banjarmasin</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i> 25 Maret | 08:00 - 10:00</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp 45.000</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> 1 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 slide-in-up">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car.jpeg')}}" alt="Teluk Tamiang" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="destination-name">Banjarmasin - Palangkaraya</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i>09:00 - 15:30</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp 300.000</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> 1 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-4 slide-in-up">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car2.jpeg')}}" alt="Tebing Sungai" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></button>
                            </div>
                        </div>
                        <div class="card-body">
                            <h3 class="destination-name">Martapura - Banjarbaru</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i> 27 Maret | 08:00 - 10:00</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp 200.000</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> Half Day</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Schedule Section -->
    <section id="schedule" class="schedule-section section-py">
        <div class="container">
            <h2 class="section-title fade-in-section">Jadwal Keberangkatan</h2>
            <p class="section-subtitle fade-in-section">Jadwal perjalanan reguler kami</p>

            <div class="table-responsive table-bordered  fade-in-section  ">
                <table class="table table-hover mb-0  "> 
                    <thead>
                        <tr>
                            <th>Rute</th>
                            <th>Berangkat</th>
                            <th>Tiba</th>
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="fw-bold text-primary">Banjarmasin - Balikpapan</td>
                            <td>06:00</td>
                            <td>12:00</td>
                            <td class="fw-bold">Rp 250.000</td>
                            <td><span class="status-badge status-available">Tersedia</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Banjarmasin - Samarinda</td>
                            <td>07:30</td>
                            <td>14:00</td>
                            <td class="fw-bold">Rp 280.000</td>
                            <td><span class="status-badge status-available">Tersedia</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Banjarbaru - Banjarmasin</td>
                            <td>05:00</td>
                            <td>06:00</td>
                            <td class="fw-bold">Rp 50.000</td>
                            <td><span class="status-badge status-available">Tersedia</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Martapura - Banjarmasin</td>
                            <td>08:00</td>
                            <td>09:30</td>
                            <td class="fw-bold">Rp 45.000</td>
                            <td><span class="status-badge status-unavailable">Penuh</span></td>
                        </tr>
                        <tr>
                            <td class="fw-bold text-primary">Banjarmasin - Palangkaraya</td>
                            <td>09:00</td>
                            <td>15:30</td>
                            <td class="fw-bold">Rp 300.000</td>
                            <td><span class="status-badge status-available">Tersedia</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    @endsection