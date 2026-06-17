@include('guest.layouts.__header')


<div>

    
</div>
<div class="invoice-page">

   
    <div id="printRef">

        <div class="invoice-header"></div>

        {{-- Card --}}
        <div class="invoice-container">
            <div class="invoice-card">

                {{-- Booking Code --}}
                <div class="invoice-booking-code">
                    <small>Kode Booking</small>
                    <div class="code">
                        {{ $order->booking_code }}
                        {{-- {{ $invoice['bookingCode'] }} --}}
                    </div>
                </div>

                <div class="invoice-body">


                    <div class="invoice-route">
                        <span class="dot"></span>

                        {{ $order->schedule->route->origin }}
                        <span class="arrow">→</span>

                        {{ $order->schedule->route->destination }}
                    </div>
                    <div class="invoice-time">

                        {{ $order->schedule->departure_time->format('d M Y | H:i') }}
                    </div>


                    <hr class="invoice-divider">
                   
                    <div class="invoice-details">
                        <div class="invoice-detail-item">
                            <label>Penumpang</label>

                            {{ $order->customer_name }}
                        </div>
                        <div class="invoice-detail-item">
                            <label>Telepon</label>

                            {{ $order->customer_phone }}
                        </div>
                        <div class="invoice-detail-item">
                            <label>Kursi</label>
                            @foreach($order->details as $detail)
                            <span><strong>{{ $detail->seat_number }}</strong></span>
                            @endforeach
                        </div>
                        <div class="invoice-detail-item">
                            <label>Metode pembayaran</label>

                            {{ $order->payment_method }}

                        </div>
                        @if ($order->payment_method == 'cash')
                        @else
                            <div class="invoice-detail-item">
                                <label>
                                    Channel
                                </label>
                                {{ $order->schedule->vehicle->name }}
                            </div>
                        @endif




                        <div class="invoice-detail-item">
                            <label>
                                Alamat Penjemputan
                            </label>
                            {{ $order->pickup_address }}
                        </div>
                    </div>

                    <hr class="invoice-divider">

                    {{-- Total & Status --}}
                    <div class="invoice-total-row">
                        <div class="invoice-total">
                            <label>Total</label>
                            <div class="amount">

                                Rp{{ number_format($order->total_price, 0, ',', '.') }} </div>
                        </div>
                      
                        <livewire:invoice-status :orderId="$order->id"/>
                    </div>

                    
                    <hr class="invoice-divider">

                    {{-- Buttons --}}
                    <div class="invoice-actions">
                        <button class="invoice-btn download" onclick="handleDownloadPdf()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4" />
                                <polyline points="7 10 12 15 17 10" />
                                <line x1="12" y1="15" x2="12" y2="3" />
                            </svg>
                            
                            Download PDF
                        </button>

                        <a class="invoice-btn whatsapp" href="https://wa.me/+6282253553459">
                            <i class="bi bi-whatsapp"></i> Chat via WhatsApp
                        </a>
                               
                    
                        @if($order->status == 'PAID' || $order->status == 'done' || $order->status == 'cancelled')
                        <a href="{{ url('/') }}" class="invoice-btn">
                            Kembali ke Beranda
                        </a>
                        @else
                        <a href="{{ route('payment', $order->booking_code) }}" class="invoice-btn">
                            Ubah Pembayaran
                        </a>
                  
                
                  
                        @endif
                    </div>

                </div>
            </div>
        </div>
        {{-- // 'invoice-{{ $invoice['bookingCode'] }}.pdf' --}}
    </div>{{-- end printRef --}}
   <script>
    function handleDownloadPdf() {
        // 1. Pilih elemen invoice yang ingin didownload
        const element = document.querySelector('.invoice-card');

        // 2. Sembunyikan bagian tombol aksi sementara agar tidak ikut tercetak di PDF
        const actions = document.querySelector('.invoice-actions');
        if (actions) actions.style.display = 'none';

        // 3. Konfigurasi opsional untuk file PDF-nya
        const options = {
            margin:       0.5,
            filename:     'Invoice-{{ $order->booking_code }}.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 2 }, // Mengatur ketajaman text/gambar
            jsPDF:        { unit: 'in', format: 'letter', orientation: 'portrait' }
        };

        // 4. Proses pembuatan PDF dan kembalikan tombol aksi setelah selesai
        html2pdf().set(options).from(element).save().then(() => {
            if (actions) actions.style.display = 'flex'; // Munculkan kembali tombolnya
        });
    }
</script>
