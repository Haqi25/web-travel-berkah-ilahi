 @extends('admin.layouts.master')
 @section('title', 'Edit')

 @section('content')
     <div class="page-title">
         <div class="row">
             <div class="col-12 col-md-6 order-md-1 order-last">
                 <h3>Edit Mobil</h3>
                 <p class="text-subtitle text-muted">Silahkan Isi Data Mobil</p>
             </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <a href="{{ route('vehicles.index') }}" class="btn btn-warning float-start float-lg-end">
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
                 <form class="form" action="{{ route('vehicles.update', $vehicle->id) }}" method="POST"
                     enctype="multipart/form-data">
                     @csrf
                     @method('PUT')
                     <div class="form-body">
                         <div class="row">
                             <div class="col-md-6">

                                 <div class="form-group">
                                     <label for="name">Nama Mobil</label>
                                     <input type="text" class="form-control" id="name"
                                         placeholder="Masukkan nama mobil" name="name" value="{{ $vehicle->name }}"
                                         required>
                                 </div>

                                 <div class="form-group">
                                     <label for="image">Gambar</label>
                                     <input type="file" class="form-control" id="image" name="image"
                                         accept="image/*" value="{{ $vehicle->image }}">
                                     <label>Gambar Saat Ini</label><br>

                                     @if ($vehicle->image)
                                         <img src="{{ asset('storage/' . $vehicle->image) }}" width="150" class="mb-2">
                                     @else
                                         <p>Tidak ada gambar</p>
                                     @endif
                                 </div>

                                 <div class="form-group">
                                     <label for="plate_number">Plat Nomor</label>
                                     <input type="text" class="form-control" id="plate_number"
                                         value="{{ $vehicle->plate_number }}" placeholder="Masukkan Plat Nomor"
                                         name="plate_number" required>
                                 </div>
                             </div>
                             <div class="col-md-6">
                                 <div class="category">
                                     <label for="capacity">Kapasitas mobil</label>
                                     <select class="form-select" id="capacity" name="capacity" required>
                                         <option value="4"selected>4</option>


                                         <option value="5">5</option>
                                         <option value="6">6</option>
                                         <option value="7">7</option>
                                         <option value="8">8</option>
                                         <option value="9">9</option>
                                         <option value="10">10</option>
                                         <option value="11">11</option>
                                         <option value="12">12</option>

                                     </select>
                                 </div>
                                 <div class="category">
                                     <label for="status">Status Mobil</label>
                                     <select class="form-select" id="status" name="status" required>
                                         <option value="AVAILABLE" selected>AVAILABLE</option>

                                         <option value="IN_USE">IN_USE</option>
                                         <option value="MAINTENANCE">MAINTENANCE</option>



                                     </select>
                                 </div>
                                 <div class="form-group">
                                     <label for="seat_layout">Tata letak kursi</label>
                                     <input type="text" class="form-control" id="seat_layout"
                                         placeholder="Masukkan tata letak kursi:contoh 2-3-3-4" name="seat_layout"
                                         value="{{ $vehicle->seat_layout }}" required>
                                 </div>
                                 <div class="form-group d-flex justify-content-end">
                                     <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                     <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                     <a href="{{ route('vehicles.index') }}" type="submit"
                                         class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </form>
             </div>
         </div>
     </section>

 @endsection
