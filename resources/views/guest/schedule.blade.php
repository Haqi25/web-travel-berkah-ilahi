@include('guest.layouts.__header')
@include('guest.layouts.__navbar')

<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Jadwal saat ini</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-info">Silakan pilih jadwal yang tersedia</li>
    </ol>
</div>
<!-- Single Page Header End -->
<a href="https://wa.me/6282253553459"
    class="whatsapp-button group rounded-lg flex items-center justify-end gap-2 btn btn-light-green  hover:btn-light-green text-white transition-all duration-300 rounded- shadow-lg hover:shadow-xl overflow-hidden wa-icon"><i
        class="bi bi-whatsapp"></i></a>
<!-- Back to Top -->
<a href="#" class="btn btn-info border-3 border-info rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>


     <!-- card start -->
         <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <h1 class="mb-4 block">Silahkan pilih jadwal yang tersedia</h1>
              <div class="row g-4">
                    <div class="col-lg-12">
                        <div class="row g-3">
                            <div class="col-lg">
                                <div class="row g-4 justify-content-center">
                                   
                                     @foreach($schedules as $schedule)
                                     
                                    <div class="col-md-6 col-lg-6 col-xl-4 block">
                                         
                                        <div class="rounded position-relative fruite-item">
                                            <div class="fruite-img ">
                                           
                                                   <img src="{{ asset('img/'. $schedule->vehicle->image) }}" class="img-fluid w-100 rounded-top" alt="" onerror="this.onerror=null;this.src='#';">
                                            </div>
                                       <div class="text-white bg-secondary px-3 py-1 rounded position-absolute bg-info" style="top: 10px; left: 10px;">
                                            {{$schedule->vehicle->name}}
                                    </div>
                                    
                                    
                                            <div class="p-4 border border-info border-top-0 rounded-bottom">
                                                <h4>{{$schedule->route->origin}} - {{$schedule->route->destination}}</h4>
                                                <p class="text-limited">{{$schedule->departure_time->format('d M Y | H:i')}}</p>
                                                <div class="d-flex justify-content-between flex-lg-wrap">
                                                    <p class="text-dark fs-5 fw-bold mb-0">Rp{{ number_format($schedule->route->price, 0, ',', '.') }}</p>
                                                   
                                                    <a  onclick="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa fa-shopping-cart  me-2 text-primary"></i> Checkout sekarang</a>
                                                    
                                                </div>
                                                  
                                            </div>
                                                                                 
                                        </div>

                                    </div>
                                    
                                  @endforeach

                               <div class=" d-xl-flex flex-shrink-0 align-items-center justify-content-center mt-4">
                    <a href="{{route('home')}}" class="btn btn-info rounded-pill px-4 text-white"><i class="fa fa-arrow-left   me-2"></i>Kembali Ke Beranda</a>
                </div>
</a>       
        
                            </div>
                        </div>
                     
                    </div>
            </div>
        </div>
            </div>
         </div>
        <!-- card end -->
{{-- <div class="container-fluid py-5">
    <h4 class="text-center">
        Tidak Ada Jadwal Tersedia
    </h4>
</div> --}}

@include('guest.layouts.__footer')
