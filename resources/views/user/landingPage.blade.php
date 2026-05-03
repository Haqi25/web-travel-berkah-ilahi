@extends('user.master')

@section('content')
  <!-- Destinations Section -->
    <section class="section-py ">
        <div class="container">
            <h2 class="section-title slide-in-up">Rute perjalaan saat ini</h2>
            @php
    $activeSchedules = $schedules->whereNotIn('status', ['FINISHED', 'NONACTIVE']);
@endphp
            @if($activeSchedules->isEmpty())
    <p class="section-subtitle">Tidak ada jadwal yang aktif</p>
@else
          
     
            <p class="section-subtitle">Jelajahi keindahan Kalimantan Selatan bersama kami</p>
        
            <div class="row g-4">
                 @foreach($schedules as $schedule)
                <div class="col-md-6 col-lg-4">
                    <div class="destination-card slide-in-down ">
                        <div class="destination-image-wrapper">
                            <img src="{{ asset('storage/'. $schedule->vehicle->image) }}" alt="Pantai Angsana" class="destination-image">
                            <div class="destination-overlay">
                                <a href="{{ route('schedules') }}" class="btn btn-light">Lihat Detail <i class="bi bi-chevron-right"></i></a>
                            </div>
                        </div>
                        <div class="card-body ">
                            <h3 class="destination-name">{{$schedule->route->origin}} - {{$schedule->route->destination}}</h3>
                            <p class="text-muted"><i class="bi bi-clock"></i>{{$schedule->departure_time->format('d M Y | H:i')}}</p>
                            <div class="d-flex justify-content-between align-items-center mt-3 pt-3 border-top">
                                <span class="destination-price">Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</span>
                                <span class="text-muted"><i class="bi bi-clock"></i> 1 Hari</span>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @endif
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
                           
                            <th>Harga</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($schedules as $schedule)
                        <tr>
                            <td class="fw-bold text-primary">{{$schedule->route->origin}} - {{$schedule->route->destination}}</td>
                            <td>{{$schedule->departure_time}}</td>
                         
                            <td class="fw-bold">Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</td>
                            <td><span class="status-badge status-available">{{$schedule->status}}</span></td>
                        </tr>
                        @endforeach
                    
                    </tbody>
                </table>
           
            </div>
        </div>
    </section>
     
    @endsection