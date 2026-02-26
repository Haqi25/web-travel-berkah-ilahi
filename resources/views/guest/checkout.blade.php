@include('guest.layouts.__header')
@include('guest.layouts.__navbar')


<!-- Single Page Header start -->
<div class="container-fluid page-header py-5">
    <h1 class="text-center text-white display-6">Checkout</h1>
    <ol class="breadcrumb justify-content-center mb-0">
        <li class="breadcrumb-item active text-info">Silakan isi detail pemesanan</li>
    </ol>
</div>
<!-- Single Page Header End -->
<a href="https://wa.me/6282253553459"
    class="whatsapp-button group rounded-lg flex items-center justify-end gap-2 btn btn-light-green  hover:btn-light-green text-white transition-all duration-300 rounded- shadow-lg hover:shadow-xl overflow-hidden wa-icon"><i
        class="bi bi-whatsapp"></i></a>
<!-- Back to Top -->
<a href="#" class="btn btn-info border-3 border-info rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- Checkout Page Start -->
<div class="container-fluid py-5">
    <div class="container py-5">
        <h1 class="mb-4">Detail Pembayaran</h1>
        <form id= "checkout-form" action="" method="POST">
            @csrf
            <div class="row g-5">
                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Nama Lengkap<sup>*</sup></label>
                                <input type="text" name="fullname" class="form-control" placeholder="Masukka nama"
                                    required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Nomor WhatsApp<sup>*</sup></label>
                                <input type="text" name="phone" class="form-control"
                                    placeholder="Masukkan Nomor WhatsApp Anda" required>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="form-item w-100">
                                <label class="form-label my-3">Pilih kursi<sup>*</sup></label>
                                <select id="" name="" class="form-control"  required style="background-color: #ffffff; !important">
                                    <option value="">-- pilih kursi --</option>
                                    <option value="apple">Apple</option>
                                    <option value="banana">Banana</option>
                                    <option value="orange">Orange</option>
                                    <option value="mango">Mango</option>
                                    
                                </select>
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-md-12 col-lg-12">
                            <div class="form-item">
                                <label class="form-label my-3">Alamat Penjemputan <sup>*</sup></label>
                                <textarea name="notes" class="form-control" spellcheck="false" cols="30" rows="5"
                                    placeholder="Isi alamat penjemputan" required></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="table-responsive">
                            <br><br>
                            <h4 class="mb-4">Detail Pesanan</h4>
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">Gambar</th>
                                        <th scope="col">Menu</th>
                                        <th scope="col">Harga</th>
                                        <th scope="col">Jumlah</th>
                                        <th scope="col">Total</th>
                                    </tr>
                                </thead>
                                <tbody>



                                    <tr>
                                        <th scope="row">
                                            <div class="d-flex align-items-center mt-2">
                                                <img src="" class="img-fluid me-5 rounded-circle"
                                                    style="width: 80px; height: 80px;" alt=""
                                                    onerror="this.onerror=null;this.src='';">
                                            </div>
                                        </th>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                        <td class="py-5"></td>
                                    </tr>


                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>


                <div class="col-md-12 col-lg-6 col-xl-6">
                    <div class="row g-4 align-items-center py-3">
                        <div class="col-lg-12">
                            <div class="bg-light rounded">
                                <div class="p-4">
                                    <h3 class="display-6 mb-4">Total <span class="fw-normal">Pesanan</span></h3>
                                    <div class="d-flex justify-content-between mb-4">
                                        <h5 class="mb-0 me-4">Subtotal</h5>
                                        <p class="mb-0"></p>
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <p class="mb-0 me-4">Pajak (0%)</p>
                                        <div class="">
                                            <p class="mb-0">Rp{{ number_format(0) }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="py-4 mb-4 border-top border-bottom d-flex justify-content-between">
                                    <h4 class="mb-0 ps-4 me-4">Total</h4>
                                    <h5 class="mb-0 pe-4">Rp{{ number_format(0) }}</h5>
                                </div>

                                <div class="py-4 mb-4 d-flex justify-content-between">
                                    <h5 class="mb-0 ps-4 me-4">Metode Pembayaran</h5>
                                    <div class="mb-0 pe-4 mb-3 pe-5">
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input bg-danger border-0"
                                                id="qris" name="payment_method" value="qris">
                                            <label class="form-check-label" for="qris">QRIS</label>
                                        </div>
                                        <div class="form-check">
                                            <input type="radio" class="form-check-input bg-danger border-0"
                                                id="cash" name="payment_method" value="cash">
                                            <label class="form-check-label" for="cash">Tunai</label>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-end">
                                <button type="button" id=""
                                    class="btn border-secondary py-3 text-uppercase text-danger">Konfirmasi
                                    Pesanan</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<!-- Checkout Page End -->
@include('guest.layouts.__footer')
