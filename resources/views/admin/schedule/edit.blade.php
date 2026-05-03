 @extends('admin.layouts.master')
 @section('title', 'Edit')

 @section('content')
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Edit Jadwal</h3>
                 <p class="text-subtitle text-muted">Silahkan Isi Data Jadwal</p>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <a href="{{ route('scheduleList.index') }}" class="btn btn-warning float-start float-lg-end">
                     <i class="bi bi-arrow-left"></i>
                     Kembali
                     </i>
                 </a>
             </div>
         </div>
     </div>
     <section class="section">
         <div class="card">

             <div class="card-body">
                 @if ($errors->any())
                     <div class="alert alert-danger alert-dismissible fade show" role="alert">
                         <h5 class="alert-heading">Submit Error!</h5>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                         <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                     </div>
                 @endif
                 <form class="form" action="{{ route('scheduleList.update', $schedule->id) }}" method="POST">
                     @csrf
                     @method('PUT')
                     <div class="form-body">
                         <div class="row">
                             <div class="col-md-6">
                                 <div class="category">
                                     <label for="category">Pilih Rute</label>
                                     <select class="form-select" id="route_id" name="route_id" required>
                                         <option value="{{$schedule->route_id}}"  selected>{{$schedule->route->origin}} - {{$schedule->route->destination}}, Harga : {{$schedule->route->price}}</option>
                                        @foreach ($routes as $route)
    <option value="{{ $route->id }}" 
        {{ old('route_id', $schedule->route_id) == $route->id ? 'selected' : '' }}>
        {{ $route->origin }} - {{ $route->destination }}, 
        Harga: {{ number_format($route->price, 0, ',', '.') }}
    </option>
@endforeach
                                     </select>
                                 </div>
                                 <div class="category">
                                     <label for="category">Pilih Mobil</label>
                                     <select class="form-select" id="vehicle" name="vehicle_id" required>
                                         <option value="{{$schedule->vehicle_id}}" selected>{{$schedule->vehicle->name}} - {{$schedule->vehicle->plate_number}}, Kapasitas : {{$schedule->vehicle->capacity}}</option>
                                        @foreach ($vehicles as $vehicle)
    <option value="{{ $vehicle->id }}" 
        {{ old('vehicle_id', $schedule->vehicle_id) == $vehicle->id ? 'selected' : '' }}>
        {{ $vehicle->name }} - {{ $vehicle->plate_number }} 
        ({{ $vehicle->capacity }} kursi)
    </option>
@endforeach
                                     </select>
                                 </div>



                                 <div class="form-group">
                                     <label for="departure_time">Tanggal keberangkatan</label>
                                     <input type="datetime-local" name="departure_time" value="{{$schedule->departure_time}}"
                                         min="{{ now()->format('Y-m-d\TH:i') }}" class="form-control" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="category">
                                     <label for="category">Sopir</label>
                                     <select class="form-select" id="driver_id" name="driver_id" required>
                                         <option value="{{$schedule->vehicle_id}}"  selected>{{$schedule->driver->user->name}} - {{$schedule->driver->license_number}}</option>
                                       @foreach ($drivers as $driver)
    <option value="{{ $driver->id }}" 
        {{ old('driver_id', $schedule->driver_id) == $driver->id ? 'selected' : '' }}>
        {{ $driver->user?->name ?? '-' }} - {{ $driver->license_number }}
    </option>
@endforeach
                                     </select>
                                 </div>
                                    <div class="category">
                                     <label for="category">Status</label>
                                     <select class="form-select" id="status" name="status" required>
                                      
                                            
                                             <option value="ACTIVE" selected>Aktif</option>
                                             <option value="NONACTIVE">Nonaktif</option>
                                              <option value="FINISHED">Selesai</option>
                                              
                                      
                                     </select>
                                 </div>
                                 <div class="form-group"></div>
                                 <div class="form-group d-flex justify-content-end">
                                     <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                     <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                     <a href="{{route('scheduleList.index')}}" type="submit" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </section>

 @endsection
