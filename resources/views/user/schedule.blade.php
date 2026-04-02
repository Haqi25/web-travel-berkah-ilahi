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
                    <span class="result-count">Menampilkan <strong>{{$totalSchedules}}</strong> Jadwal</span>
                    <div class="d-flex align-items-center gap-2">
                        <label class="text-muted" style="font-size:0.85rem; white-space:nowrap;">Urutkan:</label>
                        <select class="form-select sort-select">
                            <option>Termurah</option>
                            <option>Tercepat</option>
                            <option>Kursi Terbanyak</option>
                        </select>
                    </div>
                </div>
             
                  <div class="row g-4">
                    @foreach($schedules as $schedule)
                <div class="col-md-6 col-lg-4">
                    <div class="destination-card">
                        <div class="destination-image-wrapper">
                            <img src="{{ asset('img/'. $schedule->vehicle->image) }}" alt="Pantai Angsana" class="destination-image">
                            <div class="destination-overlay">
                               <a href="{{ route('checkout', $schedule->id) }}" class="btn btn-light">Booking Jadwal <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <h3 class="destination-name">{{$schedule->route->origin}} - {{$schedule->route->destination}}</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i> {{$schedule->departure_time->format('d M Y | H:i')}}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> 1 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
               @endforeach
            </div>
              
            </div>
        </div>
    </div>
</section>

@include('user.layouts.__footer')
     <script src="{{env('APP_URL')}}/assets/guest/js/animation.js"></script>