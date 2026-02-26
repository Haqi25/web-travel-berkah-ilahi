@include('guest.layouts.__header')
@include('guest.layouts.__navbar')


   <div class="invoice-page">

    {{-- Wrapper yang akan di-print/download --}}
    <div id="printRef">

      <div class="invoice-header"></div>

        {{-- Card --}}
        <div class="invoice-container" >
            <div class="invoice-card">
                
                {{-- Booking Code --}}
                <div class="invoice-booking-code">
                    <small>Kode Booking</small>
                    <div class="code">
                        ORD-1131313-1213
                        {{-- {{ $invoice['bookingCode'] }} --}}
                    </div>
                </div>

                <div class="invoice-body">

                    {{-- Route --}}
                    {{-- @if($schedule) --}}
                        <div class="invoice-route">
                            <span class="dot"></span>
                            {{-- {{ $schedule['origin'] }} --}}
                            Banjarmasin
                            <span class="arrow">→</span>
                            {{-- {{ $schedule['destination'] }} --}}
                            Geronggang
                        </div>
                        <div class="invoice-time">
                            {{-- {{ $schedule['departureTime'] }} – {{ $schedule['arrivalTime'] }} · {{ $schedule['vehicleType'] }} --}}
                            12.00 - 13.00
                        </div>
                    {{-- @endif --}}

                    <hr class="invoice-divider">

                    {{-- Details Grid --}}
                    <div class="invoice-details">
                        <div class="invoice-detail-item">
                            <label>Penumpang</label>
                            {{-- <span>{{ $invoice['passengerName'] }}</span> --}}
                            Baihawi
                        </div>
                        <div class="invoice-detail-item">
                            <label>Telepon</label>
                            {{-- <span>{{ $invoice['phone'] }}</span> --}}
                            089112332
                        </div>
                        <div class="invoice-detail-item">
                            <label>Kursi</label>
                            2
                            {{-- <span>{{ $invoice['seat'] }}</span> --}}
                        </div>
                        <div class="invoice-detail-item">
                            <label>Pembayaran</label>
                            {{-- <span style="text-transform: capitalize;">{{ $invoice['paymentMethod'] }}</span> --}}
                            cash

                        </div>
                    </div>

                    <hr class="invoice-divider">

                    {{-- Total & Status --}}
                    <div class="invoice-total-row">
                        <div class="invoice-total">
                            <label>Total</label>
                            <div class="amount">
                                {{-- {{ $formattedPrice }} --}}
                             Rp{{ number_format(100000, 0, ',', '.') }}                       </div>
                        </div>
                        <span class="invoice-status  success
                        {{-- {{ $invoice['status'] === 'Verifikasi' ? 'verifikasi' : 'success' }} --}}
                         "
                         >
                         pembayaran berhasil
                            {{-- {{ $invoice['status'] }} --}}
                        </span>
                    </div>

                    <hr class="invoice-divider">

                    {{-- Buttons --}}
                    <div class="invoice-actions">
                        <button class="invoice-btn download" onclick="handleDownloadPdf()">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24"
                                 fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                 stroke-linejoin="round">
                                <path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/>
                                <polyline points="7 10 12 15 17 10"/>
                                <line x1="12" y1="15" x2="12" y2="3"/>
                            </svg>
                            Download PDF
                        </button>
                        <a href="{{ url('/') }}" class="invoice-btn">
                            Kembali ke Beranda
                        </a>
                    </div>

                </div>
            </div>
        </div>
{{-- // 'invoice-{{ $invoice['bookingCode'] }}.pdf' --}}
    </div>{{-- end printRef --}}
<script>
    function handleDownloadPdf() {
        const element = document.getElementById('printRef');
        const header = element.querySelector('.invoice-header')
        const actions = element.querySelector('.invoice-actions');
        if(header) actions.style.display = 'none';
        if (actions) actions.style.display = 'none';
        const opt = {
            margin: 0,
            filename: 
            
            'invoice.ORD-HAWi.pdf'
            
            ,
            image: { type: 'jpeg', quality: 0.98 },
            html2canvas: { scale: 2 },
            jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' }
        };
        html2pdf()
            .set(opt)
            .from(element)
            .save()
            .finally(() => {
                
                if (actions) actions.style.display = '';
                if (header) actions.style.display = '';
            })
    }
</script>

@include('guest.layouts.__footer')