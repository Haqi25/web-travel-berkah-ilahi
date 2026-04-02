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
                 <form id="" action="{{route('payment')}}" method="POST">
                    @csrf
                <div class="section-card">
                    <h5><i class="fas fa-user-edit"></i> Data Penumpang</h5>
                    <div class="mb-3">
                        <input type="hidden" id="id" name="id" value="{{$schedule->id}}" required>
                        <label class="form-label" required>Nama Lengkap</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" name="name"      class="form-control" placeholder="Masukkan nama lengkap" required>
                            
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nomor Telepon (WhatsApp)</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                            <input type="tel" class="form-control" placeholder="08xxxxxxxxxx"
                            name="phone"
                             required>
                        </div>
                    </div>
                    <div class="mb-0">
                        <label class="form-label">Alamat Penjemputan</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>
                            <textarea class="form-control" required rows="3" placeholder="Masukkan alamat lengkap penjemputan"></textarea>
                        </div>
                    </div>
                </div>
                <!-- Pilih Kursi -->
                <div class="section-card">
                    <h5><i class="fas fa-chair"></i> Pilih Kursi</h5>
                    <div class="seat-map-wrapper">
                        <div class="seat-map-header">
                            <i class="fas fa-steering-wheel me-1"></i> DEPAN (Sopir)
                        </div>
                        <div class="seat-row">
                            <div class="seat occupied">1</div>
                            <div class="seat" onclick="toggleSeat(this)">2</div>
                            <div class="aisle"></div>
                            <div class="seat occupied">3</div>
                            <div class="seat" onclick="toggleSeat(this)">4</div>
                        </div>
                        <div class="seat-row">
                            <div class="seat" onclick="toggleSeat(this)">5</div>
                            <div class="seat" onclick="toggleSeat(this)">6</div>
                            <div class="aisle"></div>
                            <div class="seat occupied">7</div>
                            <div class="seat" onclick="toggleSeat(this)">8</div>
                        </div>
                        <div class="seat-row">
                            <div class="seat" onclick="toggleSeat(this)">9</div>
                            <div class="seat occupied">10</div>
                            <div class="aisle"></div>
                            <div class="seat" onclick="toggleSeat(this)">11</div>
                            <div class="seat" onclick="toggleSeat(this)">12</div>
                        </div>
                        <div class="seat-legend">
                            <span><span class="dot dot-available"></span> Tersedia</span>
                            <span><span class="dot dot-selected"></span> Dipilih</span>
                            <span><span class="dot dot-occupied"></span> Terisi</span>
                        </div>
                    </div>
                </div>
                <!-- Metode Pembayaran -->
                <div class="section-card">
                    <h5><i class="fas fa-credit-card"></i> Metode Pembayaran</h5>
                    <div class="d-flex flex-column gap-3">
                        <label class="payment-option " id="pay-cash" onclick="selectPayment('cash')">
                            <input class="form-check-input mt-0" type="radio" name="payment" value="cash" checked>
                            <div class="payment-icon cash"><i class="fas fa-money-bill-wave"></i></div>
                            <div>
                                <div class="fw-bold" style="font-size:.95rem;">Bayar Tunai (Cash)</div>
                                <div class="text-muted" style="font-size:.8rem;">Bayar langsung saat keberangkatan</div>
                            </div>
                        </label>
                        <label class="payment-option" id="pay-transfer" onclick="selectPayment('transfer')">
                            <input class="form-check-input mt-0" type="radio" name="payment" value="transfer">
                            <div class="payment-icon digital"><i class="fas fa-qrcode"></i></div>
                            <div>
                                <div class="fw-bold" style="font-size:.95rem;">Transfer Bank / E-Wallet</div>
                                <div class="text-muted" style="font-size:.8rem;">Otomatis via Payment Gateway (QRIS, BCA, BRI, dll)</div>
                            </div>
                        </label>
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
                                    <div class="route-value">{{$schedule->route->origin}}</div>
                                </div>
                                <span class="route-arrow"><i class="fas fa-arrow-right"></i></span>
                                <div class="text-end">
                                    <div class="route-label">Tujuan</div>
                                    <div class="route-value">{{$schedule->route->destination}}</div>
                                </div>
                            </div>
                            <hr class="my-2" style="border-color:#d0e8f5;">
                            <div class="d-flex justify-content-between">
                                <div>
                                    <div class="route-label">Tanggal</div>
                                    <div class="route-value" style="font-size:.85rem;">{{$schedule->departure_time->format('d M Y')}}</div>
                                </div>
                                <div class="text-end">
                                    <div class="route-label">Waktu</div>
                                    <div class="route-value" style="font-size:.85rem;">{{$schedule->departure_time->format('H:i')}}</div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="route-label mb-1">Kursi Dipilih</div>
                            <div class="fw-bold" id="selected-seats-display" style="color:var(--sea-blue);">Belum dipilih</div>
                        </div>
                        <hr>
                        <div class="price-row">
                            <span>Harga Tiket</span>
                            <span id="price-ticket">Rp 0</span>
                        </div>
                        <div class="price-row">
                            <span>Biaya Layanan</span>
                            <span>Rp 0</span>
                        </div>
                        <div class="price-row total">
                            <span>Total Pembayaran</span>
                            <span id="price-total">Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</span>
                        </div>
                        <button class="btn-confirm mt-3" onclick="confirmBooking()">
                            <i class="fas fa-check-circle me-2"></i>Konfirmasi Pembayaran
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
 <script src="{{env('APP_URL')}}/assets/guest/js/animation.js"></script>














