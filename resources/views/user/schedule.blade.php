@include('user.layouts.__header')
@include('user.layouts.__navbar')


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Jadwal saat ini</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-info">Silakan pilih jadwal yang tersedia</li>
    </ol>
</div>
@php
    $activeSchedules = $schedules->whereNotIn('status', ['FINISHED', 'NONACTIVE']);
@endphp

@if ($activeSchedules->isEmpty())


    <div class="container py-5">
        <h1 class="section-title ">Tidak ada jadwal saat ini</h1>

    </div>
@else
    <!-- MAIN CONTENT -->
    <section class="py-4">
        <div class="container">
            <div class="row g-4">
                <!-- MOBILE FILTER TOGGLE -->
                <div class="col-12 d-lg-none">
                    <button class="btn btn-filter-mobile"
                        onclick="document.getElementById('filterSidebar').classList.toggle('show')">
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
                                    <label class="form-check-label" for="pagi"><i class="bi bi-sunrise"></i> Pagi
                                        (06:00 - 11:00)</label>
                                </div>
                                <div class="form-check filter-check">
                                    <input class="form-check-input" type="checkbox" id="siang" checked>
                                    <label class="form-check-label" for="siang"><i class="bi bi-sun"></i> Siang
                                        (11:00 - 15:00)</label>
                                </div>
                                <div class="form-check filter-check">
                                    <input class="form-check-input" type="checkbox" id="malam">
                                    <label class="form-check-label" for="malam"><i class="bi bi-moon-stars"></i>
                                        Malam (18:00 - 23:00)</label>
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
                        <span class="result-count">Menampilkan <strong>{{ $totalSchedules }}</strong> Jadwal</span>
                        {{-- <div class="d-flex align-items-center gap-2">
                            <label class="text-muted" style="font-size:0.85rem; white-space:nowrap;">Urutkan:</label>
                            <select class="form-select sort-select">
                                <option>Termurah</option>
                                <option>Tercepat</option>
                              
                            </select>
                        </div> --}}
                    </div>

                    <div class="row g-4">
                        @foreach ($schedules as $schedule)
                           <div class="col-md-6 col-lg-6 jadwal-item" data-time="{{ $schedule->departure_time->format('H:i') }}">
                                <div class="destination-card">
                                    <div class="destination-image-wrapper">
                                        <img src="{{ asset('storage/' . $schedule->vehicle->image) }} "
                                            alt="Pantai Angsana" class="destination-image">
                                        <div class="destination-overlay">
                                            <a href="{{ route('checkout', $schedule->id) }}"
                                                class="btn btn-light">Booking Jadwal <i
                                                    class="bi bi-chevron-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="card-body ">
                                        <h3 class="destination-name">{{ $schedule->route->origin }} -
                                            {{ $schedule->route->destination }}</h3>
                                        <p class="text-muted"><i class="bi bi-clock"></i>
                                            {{ $schedule->departure_time->format('d M Y | H:i') }}</p>
                                        <div
                                            class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                            <span
                                                class="destination-price">Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</span>
                                            {{-- <span class="text-muted"><i class="bi bi-clock"></i> 1 Hari</span> --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>

                </div>

            </div>

        </div>

@endif
</section>

<!-- Footer -->
@include('user.layouts.__footer')
<script src="{{env('APP_URL')}}/assets/guest/js/animation.js"></script>
    <script>
        document.querySelector('.btn-pilih').addEventListener('click', function() {
            // 1. Ambil status checkbox
            const filterPagi = document.getElementById('pagi').checked;
            const filterSiang = document.getElementById('siang').checked;
            const filterMalam = document.getElementById('malam').checked;

            // 2. Ambil semua item jadwal
            const items = document.querySelectorAll('.jadwal-item');

            items.forEach(item => {
                const timeStr = item.getAttribute('data-time'); // Ambil jam, misal "08:30"
                const hour = parseInt(timeStr.split(':')[0]); // Ambil angka jamnya saja

                let isVisible = false;

                // Logika rentang waktu
                if (filterPagi && (hour >= 6 && hour < 11)) {
                    isVisible = true;
                } else if (filterSiang && (hour >= 11 && hour < 15)) {
                    isVisible = true;
                } else if (filterMalam && (hour >= 18 && hour <= 23)) {
                    isVisible = true;
                }

                // Jika tidak ada filter yang dipilih, tampilkan semua (Opsional)
                if (!filterPagi && !filterSiang && !filterMalam) {
                    isVisible = true;
                }

                // 3. Tampilkan atau sembunyikan dengan animasi
                if (isVisible) {
                    item.classList.remove('d-none'); // Munculkan (pakai class Bootstrap)
                    item.classList.add('d-block');
                } else {
                    item.classList.remove('d-block');
                    item.classList.add('d-none'); // Sembunyikan (pakai class Bootstrap)
                }
            });
        });
    </script>
</footer>
