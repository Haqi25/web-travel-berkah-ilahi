@extends('admin.layouts.master')
@section('content')
@section('title', 'Dashboard')
@section('css')

@endsection

@section('content')

    <div class="page-heading">
        <h3>Selamat Datang, {{ Auth::user()->name }} sebagai {{ Auth::user()->role->role_name }}</h3>
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">

                    <p class="text-subtitle text-muted">Silahkan mengubah password pada halaman ini</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <a href="{{ route('dashboard') }}" class="btn btn-warning">
                                <i class="bi bi-arrow-left"></i>

                                Kembali</a>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title">Ubah Password</h5>
                        </div>

                        <div class="card-body">
                            <form action="{{ route('password.update') }}" method="POST">
                                @csrf
                                @method('put')

                              
                                <div class="form-group my-2">
                                    <label for="current_password" class="form-label">Password saat ini</label>
                                    <input type="password" name="current_password" id="current_password"
                                        class="form-control {{ $errors->updatePassword->has('current_password') ? 'is-invalid' : '' }}"
                                        placeholder="Masukkan Password saat ini">
                                    @if ($errors->updatePassword->has('current_password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->updatePassword->first('current_password') }}
                                        </div>
                                    @endif
                                </div>

            
                                <div class="form-group my-2">
                                    <label for="password" class="form-label">Password Baru</label>
                                    <input type="password" name="password" id="password"
                                        class="form-control {{ $errors->updatePassword->has('password') ? 'is-invalid' : '' }}"
                                        placeholder="Masukkan Password yang baru">
                                    @if ($errors->updatePassword->has('password'))
                                        <div class="invalid-feedback">
                                            {{ $errors->updatePassword->first('password') }}
                                        </div>
                                    @endif
                                </div>

                     
                                <div class="form-group my-2">
                                    <label for="password_confirmation" class="form-label">Konfirmasi Password Baru</label>
                                    <input type="password" name="password_confirmation" id="password_confirmation"
                                        class="form-control" placeholder="Masukkan Konfirmasi Password">
                                </div>

                                <div class="form-group my-2 d-flex justify-content-end align-items-center">
                               
                                    @if (session('status') === 'password-updated')
                                        <span class="text-success me-3">Password berhasil diperbarui!</span>
                                    @endif

                                    <button type="submit" class="btn btn-primary">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>


            </div>
        </section>

    </div>






@endsection
@section('script')
@endsection
