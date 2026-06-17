@include('user.layouts.__header')
@include('user.layouts.__navbar')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout Pemesanan</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-info">Lengkapi data untuk menyelesaikan pemesanan tiket Anda</li>
    </ol>
</div>


<!-- Main Content -->
<div class="container py-4">
    <div class="row g-4">
        <!-- Left Column -->
        <div class="col-lg-8">
            <!-- Data Penumpang -->
              @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <h5 class="alert-heading">Submit Error!</h5>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            <button type="button" class="btn-close" data-bs-dismiss="alert"
                                aria-label="Close"></button>
                        </div>
                    @endif
   <form id="" method="POST" action="{{ route('bookingForm') }}">
                @csrf
                <div class="section-card">
                    <h5><i class="fas fa-user-edit"></i> Data Penumpang</h5>
                  
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id" value="{{ $schedule->id }}" required>
                        <label class="form-label" required>Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="customer_name" class="form-control"
                                placeholder="Masukkan nama lengkap" required>

                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon (WhatsApp)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                            <input type="tel" class="form-control" placeholder="08xxxxxxxxxx" name="customer_phone"
                                required>
                        </div>
                    </div>
                    <div class="mb-0">
                        <div class="d-flex justify-content-between">
                            <label class="form-label">Alamat Penjemputan</label>
                            <a href="javascript:void(0)" onclick="getLocation()" class="text-primary small"
                                style="text-decoration: none;">
                                <i class="fas fa-crosshairs"></i> Gunakan Lokasi Saya
                            </a>
                        </div>

                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea id="address_input" name="pickup_address" class="form-control" required
                                placeholder="Masukkan alamat lengkap (Nama Jalan, No Rumah, Patokan)"></textarea>
                        </div>

                        <input type="hidden" id="pickup_latitude" name="pickup_latitude">
                        <input type="hidden" id="pickup_longitude" name="pickup_longitude">

                        <small id="location_status" class="text-muted" style="font-size: 0.75rem;"></small>
                    </div>
                </div>
                <!-- Pilih Kursi -->
                <div class="section-card">
                    <h5><i class="fas fa-chair"></i> Pilih Kursi</h5>
                    <div class="seat-map-wrapper">
                        <div class="seat-map-wrapper">
                            <div class="seat-map-header"><i class="fas fa-user-tie"></i> Supir</div>


                           <livewire:seat-picker  :scheduleId="$schedule->id" :capacity="$schedule->vehicle->capacity" :pricePerSeat="$schedule->route->price" />

                        </div>

                        <div class="seat-legend mt-3">
                            <span><span class="dot dot-available"></span> Tersedia</span>
                            <span><span class="dot dot-selected"></span> Dipilih</span>
                            <span><span class="dot dot-occupied"></span> Terisi</span>
                        </div>
                    </div>

                </div>
              
        </div>

        <!-- Right Column -->
        <div class="col-lg-4">
            <div class="summary-sticky">
                <div class="summary-card">
                    <h5><i class="fas fa-receipt me-2"></i>Ringkasan Pesanan</h5>
                    <div class="summary-route">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <div class="route-label">Dari</div>
                                <div class="route-value">{{ $schedule->route->origin }}</div>
                            </div>
                            <span class="route-arrow"><i class="fas fa-arrow-right"></i></span>
                            <div class="text-end">
                                <div class="route-label">Tujuan</div>
                                <div class="route-value">{{ $schedule->route->destination }}</div>
                            </div>
                        </div>
                        <hr class="my-2" style="border-color:#d0e8f5;">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="route-label">Tanggal</div>
                                <div class="route-value" style="font-size:.85rem;">
                                    {{ $schedule->departure_time->format('d M Y') }}</div>
                            </div>
                            <div class="text-end">
                                <div class="route-label">Waktu</div>
                                <div class="route-value" style="font-size:.85rem;">
                                    {{ $schedule->departure_time->format('H:i') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="route-label mb-1">Kursi Dipilih</div>
                        <div class="fw-bold" id="selected-seats-display" style="color:var(--sea-blue);">
                            -
                        </div>
                    </div>
                    <hr>
                    <div class="price-row">
                        <span>Harga Tiket</span>
                        <span id="price-ticket"> Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="price-row">
                        <input type="checkbox" id="agree-terms" name="terms_accepted" required>
                        <label for="agree-terms" class="mb-2"> Saya Setuju dengan <a href="/terms-and-conditions">Syarat & ketentuan </a> dan <a href="/privacy-policy">Kebijakan Privasi</a></label>
                    </div>
                  
                  
                    <div class="price-row total">
                        <span>Total Pembayaran</span>
                        <span id="price-total"> Rp.0</span>
                    </div>
                    <button class="btn-confirm mt-3" onclick="confirmBooking()">
                        <i class="fas fa-check-circle me-2"></i>Lanjut ke Pembayaran
                    </button>

                    <div class="secure-badge">
                        <i class="fas fa-lock me-1"></i> Transaksi aman & terenkripsi
                    </div>
                </div>
            </div>
        </div>
    </form>
    </div>
</div>











@include('user.layouts.__footer')
<script src="{{ env('APP_URL') }}/assets/guest/js/animation.js"></script>
<script>
    
    let timeout = null;
    document.getElementById('address_input').addEventListener('keyup', function() {
        clearTimeout(timeout);
        let address = this.value;

      
        timeout = setTimeout(function() {
            if (address.length > 10) { 
                fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${address}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.length > 0) {
                            document.getElementById('pickup_latitude').value = data[0].lat;
                            document.getElementById('pickup_longitude').value = data[0].lon;
                            document.getElementById('location_status').innerText =
                                " Koordinat lokasi ditemukan otomatis";
                        }
                    });
            }
        }, 1000);
    });

    function getLocation() {
        const status = document.getElementById('location_status');
        const addressInput = document.getElementById('address_input'); 

        if (navigator.geolocation) {
            status.innerText = "Sedang mengambil lokasi...";

            navigator.geolocation.getCurrentPosition(function(position) {
                const lat = position.coords.latitude;
                const lng = position.coords.longitude;

                document.getElementById('pickup_latitude').value = lat;
                document.getElementById('pickup_longitude').value = lng;

              
                fetch(`https://nominatim.openstreetmap.org/reverse?format=jsonv2&lat=${lat}&lon=${lng}`)
                    .then(response => response.json())
                    .then(data => {
                        if (data.display_name) {
                          
                            addressInput.value = data.display_name;
                            status.innerText = "Lokasi berhasil ditemukan!";
                        }
                    })
                    .catch(err => {
                        status.innerText = " Koordinat didapat, tapi gagal ambil nama jalan.";
                    });

            }, function(error) {
                status.innerText = " Gagal mengambil lokasi. Pastikan GPS aktif.";
            });
        } else {
            alert("Geolocation tidak didukung oleh browser ini.");
        }
    }

    function toggleSeat(element) {
       
        if (element.classList.contains('occupied')) return;

        const previouslySelected = document.querySelector('.seat.selected');
        if (previouslySelected && previouslySelected !== element) {
            previouslySelected.classList.remove('selected');
        }

       
        element.classList.toggle('selected');

        const seatNumber = element.innerText;
        const input = document.getElementById('selected_seat_input');

        if (element.classList.contains('selected')) {
            input.value = seatNumber;
        } else {
            input.value = "";
        }
    }

    document.addEventListener('livewire:init', () => {
    Livewire.on('seatUpdated', (data) => {
        // Kursi
        document.getElementById('selected-seats-display').innerText =
            data.seats.length ? data.seats.join(', ') : '-';

        // Total harga
        document.getElementById('price-total').innerText =
            'Rp' + new Intl.NumberFormat('id-ID').format(data.total);
    });
});
</script>
