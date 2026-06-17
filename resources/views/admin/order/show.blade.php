@extends('admin.layouts.master')
@section('title', 'Detail Booking')

@section('css')
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/style.css">
<link rel="stylesheet" href="{{env('APP_URL')}}/assets/admin/compiled/css/table-datatable.css">
@endsection

@section('content')

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Detail Booking</h3>
                <p class="text-subtitle text-muted">Informasi Detail Booking yang Masuk</p>
            </div>
             <div class="col-12 col-md-6 order-md-2 order-first">
                 <a href="{{ route('orders') }}" class="btn btn-warning float-start float-lg-end">
                     <i class="bi bi-arrow-left"></i>
                     Kembali
                     </i>
                 </a>
             </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Kode Booking: {{$order->booking_code}} </h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>Dibuat Pada: {{ $order->created_at->format('d-m-Y H:i') }} </p>
                        <p>Nama Pelanggan: {{$order->customer_name}}</p>
                        <p>Status Pembayaran:
                            <span class="badge {{ $order->status == 'PAID' ? 'bg-success' : ($order->status == 'done' ? 'bg-success' : ($order->status == 'pending' ? 'bg-warning' : ($order->status == 'cancelled' ? 'bg-primary' : 'bg-danger'))) }}">
                                {{ $order->status }}
                            </span>
                            </span>
                        </p>
                       @if($order->payment_method == 'transfer')
                       <p>Bukti Pembayaran : </p>
                         <a href="{{ asset('storage/' . $order->payment_proof) }}"
       target="_blank">
                        <img src="{{ asset('storage/' . $order->payment_proof) }}" alt="Bukti Pembayaran" class="img-fluid">
                        </a>
                        @endif
                    </div>
                    <div class="col-md-6">
                      
                        <p>No. Kursi:  @foreach($order->details as $detail)
                            <span><strong>{{ $detail->seat_number }}</strong></span>
                            @endforeach </p>
                   
                         
                        <p>Metode Pembayaran: {{$order->payment_method}}</p>
                        <p>Alamat:{{$order->pickup_address}} </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h4>Booking yang dipesan</h4>
            </div>
            <div class="card-body">
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            
                            <th>Awal - Tujuan</th>
                            <th>Gambar Mobil</th>
                            <th>Nama Mobil</th>
                            <th>Nama Driver</th>
                            <th>Plat Nomor</th>
                            <th>Invoice</th>

                        </tr>
                    </thead>
                    <tbody>
                   
                        <tr>

                           
                            <td>
                            {{$order->schedule->route->origin}} - {{$order->schedule->route->destination}}
                            </td>
                            <td>
                                  <img src="{{ asset('storage/'. $order->schedule->vehicle->image) }}" width="200" class="img-fluid rounded-top" alt="" onerror="this.onerror=null;this.src='{{  $order->schedule->vehicle->image}}';">
                            </td>
                            <td>
                                {{$order->schedule->vehicle->name}}
                            </td>
                            <td>
                                {{$order->schedule->driver->user->name ?? 'N/A'}}
                            </td>
                             <td>
                                {{$order->schedule->vehicle->plate_number}}
                             </td>
                             <td>
                                <span class="btn btn-primary ">
                                    <a href="{{route('success', $order->booking_code)}}" class="text-white">Lihat Invoice</a>
                                </span>
                             </td>
                        </tr>

                       
                    </tbody>
                    
                  
                </table>
            </div>
        </div>

    </section>
</div>

@endsection

@section('script')
<script src="{{env('APP_URL')}}/assets/admin/extensions/simple-datatables/umd/simple-datatables.js"></script>
<script src="{{env('APP_URL')}}/assets/admin/static/js/pages/simple-datatables.js"></script>
@endsection
