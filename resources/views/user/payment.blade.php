@include('user.layouts.__header')
@include('user.layouts.__navbar')


<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Pembayaran</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-info">Pilih metode pembayaran dan konfirmasi pesanan Anda</li>
    </ol>
</div>


<div class="container py-4  ">
       <form id="payment-form" method="POST" action="{{ route('paymentForm', $order->booking_code) }} " enctype="multipart/form-data">
         @method('PATCH')
          @csrf
    <div class="row g-4">
    <div class="col-lg-4  mx-auto ">
           <div class="summary-sticky">
                <div class="summary-card">
                    <h5><i class="fas fa-receipt me-2"></i>Ringkasan Pesanan</h5>
                    <div class="summary-route">
                        <div class="d-flex align-items-center justify-content-between mb-2">
                            <div>
                                <div class="route-label">Dari</div>
                                <div class="route-value">{{ $order->schedule->route->origin }}</div>
                            </div>
                            <span class="route-arrow"><i class="fas fa-arrow-right"></i></span>
                            <div class="text-end">
                                <div class="route-label">Tujuan</div>
                                <div class="route-value">{{ $order->schedule->route->destination }}</div>
                            </div>
                        </div>
                        <hr class="my-2" style="border-color:#d0e8f5;">
                        <div class="d-flex justify-content-between">
                            <div>
                                <div class="route-label">Tanggal</div>
                                <div class="route-value" style="font-size:.85rem;">
                                    {{ $order->schedule->departure_time->format('d M Y') }}</div>
                            </div>
                            <div class="text-end">
                                <div class="route-label">Waktu</div>
                                <div class="route-value" style="font-size:.85rem;">
                                    {{ $order->schedule->departure_time->format('H:i') }}</div>
                            </div>
                        </div>
                    </div>
                    <div class="mb-2">
                        <div class="route-label mb-1"><b>Kursi Dipilih</b></div>
                        <div class="fw-bold" id="selected-seats-display" style="color:var(--sea-blue);">
                              @foreach($order->details as $detail)
                                {{ $detail->seat_number }}
                              @endforeach
                        </div>
                        <div class="route-label mb-1"><b>Alamat Penjemputan</b></div>
                        <div class="fw-bold" id="selected-seats-display" style="color:var(--sea-blue);">
                              {{ $order->pickup_address }}
                        </div>
                    </div>
                    <hr>
                    <div class="price-row">
                        <span>Harga Tiket</span>
                        <span id="price-ticket">Rp,{{ number_format($order->schedule->route->price, 0, ',', '.') }}</span>
                    </div>
                     <div class="price-row">
                        <span>Nama Mobil</span>
                        <span id="price-ticket">{{ $order->schedule->vehicle->name }}</span>
                    </div>
                       
                   
                  
                  
                    <div class="price-row total">
                        <span>Total Pembayaran</span>
                        <span id="price-total">   Rp{{ number_format($order->total_price, 0, ',', '.') }}</span>
                    </div>
                 

                    <div class="secure-badge">
                        <i class="fas fa-lock me-1"></i> Transaksi aman & terenkripsi
                    </div>
                </div>
            </div>
    </div>
     <div class="col-lg-4 mx-auto ">
        <div class="section-card">
        @if ($errors->any())
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <h5 class="alert-heading">Submit Error!</h5>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif
                    <h5><i class="fas fa-credit-card"></i> Metode Pembayaran</h5>
                    <div class="d-flex flex-column gap-3">
                     
                        <label class="payment-option" id="pay-cash" onclick="selectPayment('cash')">
                            <input class="form-check-input mt-0" type="radio" name="payment_method" value="cash"
                                checked>
                            <div class="payment-icon cash"><i class="fas fa-money-bill-wave"></i></div>
                            <div>
                                <div class="fw-bold" style="font-size:.95rem;">Bayar Tunai (Cash)</div>
                                <div class="text-muted" style="font-size:.8rem;">Bayar langsung saat keberangkatan
                                </div>
                            </div>
                        </label>
                        <label class="payment-option" id="pay-transfer" onclick="selectPayment('transfer')">
                            <input class="form-check-input mt-0" type="radio" name="payment_method" value="transfer">
                            <div class="payment-icon digital"><i class="fas fa-qrcode"></i></div>
                            <div>
                                <div class="fw-bold" style="font-size:.95rem;">Transfer Bank</div>
                                <div class="text-muted" style="font-size:.8rem;">BCA 1234567890 a.n. Travel Berkah Ilahi</div>
                            </div>
                            
                        </label>
                        <div id="transfer-proof" class="mt-3 d-none">
    <label class="upload-box">
        <i class="bi bi-upload icon-upload"></i>
         
        <br></br>
        <span class="text-color">Upload Bukti Transfer Format: JPG, PNG</span>
       <img id="preview-image"
         class="img-fluid rounded mt-3 d-none"
         style="max-height:200px;">
        <input
            type="file"
            id="payment_proof"
            name="payment_proof"
            class="form-control d-none"
            accept="image/*">
 
    </label>

</div>

                    </div>
                       <button class="btn-confirm mt-3" onclick="confirmBooking()">
                        <i class="fas fa-check-circle me-2"></i>Konfirmasi Pembayaran
                    </button>
                </div>
         
    </div>
    </div>
       </form>
</div>

<script>
    document.querySelectorAll('input[name="payment_method"]')
    .forEach(radio => {
        radio.addEventListener('change', function(){

            const proof = document.getElementById('transfer-proof');

            if(this.value === 'transfer'){
                proof.classList.remove('d-none');
            } else{
                proof.classList.add('d-none');
            }
        });
    });
   document.getElementById('payment_proof')
.addEventListener('change', function () {

    const file = this.files[0];
    const preview = document.getElementById('preview-image');

    if (file) {
        preview.src = URL.createObjectURL(file);
        preview.classList.remove('d-none');

        document.querySelector('.icon-upload')
            .classList.add('d-none');
    }
});
</script>

<style>
    .upload-box {
        background : #f0f8fd;;
        border : 2px dashed #0077B6;
        width: 100%;
        padding : 20px;
        text-align : center;
        cursor : pointer;
        color : #6c757d;
        transition : background-color 0.3s, border-color 0.3s;
        border-radius : 5px;
    }
    .icon-upload {
        font-size : 2rem;
        color : #0077B6;
    }
    .text-color {
        color : #0077B6;
    }

    
    </style>
@include('user.layouts.__footer')
<script src="{{ env('APP_URL') }}/assets/guest/js/animation.js"></script>