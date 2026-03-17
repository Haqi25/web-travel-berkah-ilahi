@include('user.layouts.__header')
@include('user.layouts.__navbar')


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Jadwal saat ini</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-info">Silakan pilih jadwal yang tersedia</li>
    </ol>
</div>



<!-- SEARCH BAR -->
<section class="search-bar">
    <div class="container">
        <div class="search-info">
            <span class="route-badge">
                <i class="bi bi-geo-alt-fill"></i> Banjarmasin
                <i class="bi bi-arrow-right"></i> Batulicin
                <i class="bi bi-calendar3 ms-2"></i> 21 Maret 2026
            </span>
            <button class="btn btn-ubah"><i class="bi bi-pencil-square me-1"></i>Ubah</button>
        </div>
    </div>
</section>
<!-- MAIN CONTENT -->
<section class="py-4">
    <div class="container">
        <div class="row g-4">
            <!-- MOBILE FILTER TOGGLE -->
            <div class="col-12 d-lg-none">
                <button class="btn btn-filter-mobile" onclick="document.getElementById('filterSidebar').classList.toggle('show')">
                    <i class="bi bi-funnel-fill"></i> Filter
                </button>
            </div>
            <!-- LEFT SIDEBAR -->
            <div class="col-lg-3">
                <div id="filterSidebar" class="filter-sidebar show">
                    <div class="filter-card">
                        <div class="filter-header">
                            <i class="bi bi-sliders"></i> Filter
                        </div>
                        <div class="filter-section">
                            <h6><i class="bi bi-clock me-1"></i> Waktu Keberangkatan</h6>
                            <div class="form-check filter-check">
                                <input class="form-check-input" type="checkbox" id="pagi" checked>
                                <label class="form-check-label" for="pagi"><i class="bi bi-sunrise"></i> Pagi (06:00 - 11:00)</label>
                            </div>
                            <div class="form-check filter-check">
                                <input class="form-check-input" type="checkbox" id="siang" checked>
                                <label class="form-check-label" for="siang"><i class="bi bi-sun"></i> Siang (11:00 - 15:00)</label>
                            </div>
                            <div class="form-check filter-check">
                                <input class="form-check-input" type="checkbox" id="malam">
                                <label class="form-check-label" for="malam"><i class="bi bi-moon-stars"></i> Malam (18:00 - 23:00)</label>
                            </div>
                        </div>
                        <div class="filter-section">
                            <h6><i class="bi bi-stars me-1"></i> Fasilitas</h6>
                            <div class="form-check filter-check">
                                <input class="form-check-input" type="checkbox" id="ac" checked>
                                <label class="form-check-label" for="ac"><i class="bi bi-snow"></i> AC</label>
                            </div>
                            <div class="form-check filter-check">
                                <input class="form-check-input" type="checkbox" id="shuttle">
                                <label class="form-check-label" for="shuttle"><i class="bi bi-truck"></i> Free Shuttle</label>
                            </div>
                            <div class="form-check filter-check">
                                <input class="form-check-input" type="checkbox" id="singgah">
                                <label class="form-check-label" for="singgah"><i class="bi bi-house-heart"></i> Rumah Singgah</label>
                            </div>
                        </div>
                        <div class="filter-section text-center">
                            <button class="btn btn-sm btn-pilih w-100">Terapkan Filter</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- RIGHT SCHEDULE LIST -->
            <div class="col-lg-9">
                <!-- Sort Bar -->
                <div class="sort-bar">
                    <span class="result-count">Menampilkan <strong>6</strong> Jadwal</span>
                    <div class="d-flex align-items-center gap-2">
                        <label class="text-muted" style="font-size:0.85rem; white-space:nowrap;">Urutkan:</label>
                        <select class="form-select sort-select">
                            <option>Termurah</option>
                            <option>Tercepat</option>
                            <option>Kursi Terbanyak</option>
                        </select>
                    </div>
                </div>
                <!-- Schedule Grid -->
                {{-- <div class="row g-3">
                    <!-- Card 1 -->
                    <div class="col-md-6 col-xl-4 schedule-col">
                        <div class="schedule-card">
                            <div class="card-img-wrap">
                                <img src="https://images.unsplash.com/photo-1570125909232-eb263c188f7e?w=600&q=80" alt="Luxury Van">
                                <span class="seat-badge low">Sisa 2 Kursi</span>
                                <span class="type-badge">Executive</span>
                            </div>
                            <div class="card-body">
                                <div class="route-name">Banjarmasin → Batulicin</div>
                                <div class="departure-time"><i class="bi bi-clock-fill"></i> 06:00 WIB · ~6 Jam</div>
                                <div class="facility-icons">
                                    <span class="facility-tag"><i class="bi bi-snow"></i> AC</span>
                                    <span class="facility-tag"><i class="bi bi-cup-hot"></i> Snack</span>
                                    <span class="facility-tag"><i class="bi bi-wifi"></i> WiFi</span>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="price">Rp 250.000 <small>/kursi</small></div>
                                    <button class="btn btn-pilih">Pilih Kursi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 2 -->
                    <div class="col-md-6 col-xl-4 schedule-col">
                        <div class="schedule-card">
                            <div class="card-img-wrap">
                                <img src="https://images.unsplash.com/photo-1544620347-c4fd4a3d5957?w=600&q=80" alt="Travel Bus">
                                <span class="seat-badge mid">Sisa 5 Kursi</span>
                                <span class="type-badge">Reguler</span>
                            </div>
                            <div class="card-body">
                                <div class="route-name">Banjarmasin → Batulicin</div>
                                <div class="departure-time"><i class="bi bi-clock-fill"></i> 08:30 WIB · ~6.5 Jam</div>
                                <div class="facility-icons">
                                    <span class="facility-tag"><i class="bi bi-snow"></i> AC</span>
                                    <span class="facility-tag"><i class="bi bi-truck"></i> Shuttle</span>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="price">Rp 180.000 <small>/kursi</small></div>
                                    <button class="btn btn-pilih">Pilih Kursi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 3 -->
                    <div class="col-md-6 col-xl-4 schedule-col">
                        <div class="schedule-card">
                            <div class="card-img-wrap">
                                <img src="https://images.unsplash.com/photo-1494515843206-f3117d3f51b7?w=600&q=80" alt="Travel Van">
                                <span class="seat-badge high">Sisa 8 Kursi</span>
                                <span class="type-badge">VIP</span>
                            </div>
                            <div class="card-body">
                                <div class="route-name">Banjarmasin → Batulicin</div>
                                <div class="departure-time"><i class="bi bi-clock-fill"></i> 10:00 WIB · ~5.5 Jam</div>
                                <div class="facility-icons">
                                    <span class="facility-tag"><i class="bi bi-snow"></i> AC</span>
                                    <span class="facility-tag"><i class="bi bi-cup-hot"></i> Snack</span>
                                    <span class="facility-tag"><i class="bi bi-house-heart"></i> Singgah</span>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="price">Rp 300.000 <small>/kursi</small></div>
                                    <button class="btn btn-pilih">Pilih Kursi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 4 -->
                    <div class="col-md-6 col-xl-4 schedule-col">
                        <div class="schedule-card">
                            <div class="card-img-wrap">
                                <img src="https://images.unsplash.com/photo-1557223562-6c77ef16210f?w=600&q=80" alt="Mini Bus">
                                <span class="seat-badge low">Sisa 1 Kursi</span>
                                <span class="type-badge">Executive</span>
                            </div>
                            <div class="card-body">
                                <div class="route-name">Banjarmasin → Batulicin</div>
                                <div class="departure-time"><i class="bi bi-clock-fill"></i> 12:00 WIB · ~6 Jam</div>
                                <div class="facility-icons">
                                    <span class="facility-tag"><i class="bi bi-snow"></i> AC</span>
                                    <span class="facility-tag"><i class="bi bi-wifi"></i> WiFi</span>
                                    <span class="facility-tag"><i class="bi bi-truck"></i> Shuttle</span>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="price">Rp 275.000 <small>/kursi</small></div>
                                    <button class="btn btn-pilih">Pilih Kursi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 5 -->
                    <div class="col-md-6 col-xl-4 schedule-col">
                        <div class="schedule-card">
                            <div class="card-img-wrap">
                                <img src="https://images.unsplash.com/photo-1464219789935-c2d9d9aba644?w=600&q=80" alt="Travel">
                                <span class="seat-badge mid">Sisa 4 Kursi</span>
                                <span class="type-badge">Reguler</span>
                            </div>
                            <div class="card-body">
                                <div class="route-name">Banjarmasin → Batulicin</div>
                                <div class="departure-time"><i class="bi bi-clock-fill"></i> 14:00 WIB · ~6 Jam</div>
                                <div class="facility-icons">
                                    <span class="facility-tag"><i class="bi bi-snow"></i> AC</span>
                                    <span class="facility-tag"><i class="bi bi-house-heart"></i> Singgah</span>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="price">Rp 175.000 <small>/kursi</small></div>
                                    <button class="btn btn-pilih">Pilih Kursi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Card 6 -->
                    <div class="col-md-6 col-xl-4 schedule-col">
                        <div class="schedule-card">
                            <div class="card-img-wrap">
                                <img src="https://images.unsplash.com/photo-1586899028174-e7098604235b?w=600&q=80" alt="Night Travel">
                                <span class="seat-badge high">Sisa 10 Kursi</span>
                                <span class="type-badge">VIP</span>
                            </div>
                            <div class="card-body">
                                <div class="route-name">Banjarmasin → Batulicin</div>
                                <div class="departure-time"><i class="bi bi-clock-fill"></i> 20:00 WIB · ~5.5 Jam</div>
                                <div class="facility-icons">
                                    <span class="facility-tag"><i class="bi bi-snow"></i> AC</span>
                                    <span class="facility-tag"><i class="bi bi-cup-hot"></i> Snack</span>
                                    <span class="facility-tag"><i class="bi bi-wifi"></i> WiFi</span>
                                    <span class="facility-tag"><i class="bi bi-truck"></i> Shuttle</span>
                                </div>
                                <div class="card-footer-custom">
                                    <div class="price">Rp 320.000 <small>/kursi</small></div>
                                    <button class="btn btn-pilih">Pilih Kursi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                  <div class="row g-4">
                <div class="col-md-6 col-lg-4">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/mobil.jpeg')}}" alt="Pantai Angsana" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></button>
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
                <div class="col-md-6 col-lg-4 ">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car.jpeg')}}" loading="lazy" alt="Candi Agung" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></button>
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
                <div class="col-md-6 col-lg-4 ">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car2.jpeg')}}" alt="Pulau Datu" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></button>
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
                <div class="col-md-6 col-lg-4 ">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/mobil.jpeg')}}" alt="Sawah Loksado" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></button>
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
                <div class="col-md-6 col-lg-4 ">
                    <div class="destination-card screenshot-mode">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car.jpeg')}}" alt="Teluk Tamiang" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></button>
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
                <div class="col-md-6 col-lg-4 ">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{asset('img/dummy_car2.jpeg')}}" alt="Tebing Sungai" class="destination-image">
                            <div class="destination-overlay">
                                <button class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></button>
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
        </div>
    </div>
</section>

@include('user.layouts.__footer')
     <script src="{{env('APP_URL')}}/assets/guest/js/animation.js"></script>