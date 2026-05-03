 @extends('admin.layouts.master')
 @section('title', 'Edit')

 @section('content')
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Edit rute</h3>
                 <p class="text-subtitle text-muted">Silahkan Isi Data Rute</p>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <a href="{{ route('routes.index') }}" class="btn btn-warning float-start float-lg-end">
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
                <form class="form" action="{{ route('routes.update', $route->id) }}" method="POST" enctype="multipart/form-data" >
                     @csrf
                    @method('PUT')
                     <div class="form-body">
                         <div class="row">
                             <div class="col-md-6">

                                 <div class="form-group">
                                     <label for="origin">Asal rute</label>
                                     <input type="text" class="form-control" id="origin"
                                         placeholder="Masukkan awalan rute" name="origin" value="{{$route->origin}}" required>
                                 </div>


                                 <div class="form-group">
                                     <label for="plate_number">Tujuan </label>
                                     <input type="text" class="form-control" id="destination"
                                         placeholder="Masukkan Tujuan rute" name="destination" value="{{$route->destination}}"required>
                                 </div>
                             </div>
                             
                             <div class="col-md-6">
                                 <div class="form-group">
                             <label for="price">Harga</label>
                             <input type="number" class="form-control" id="price" placeholder="Masukkan Harga"
                                 name="price" value="{{$route->price}}"
                                 required>
                         </div>
                                 <div class="form-group d-flex justify-content-end">
                                     <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                     <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                     <a href="{{route('vehicles.index')}}" type="submit" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </section>

 @endsection

 