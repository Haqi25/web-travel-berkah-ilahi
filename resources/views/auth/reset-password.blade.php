<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Travel Berkah Ilahi | Reset Password</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta name="description"
        content="Travel Berkah Ilahi - Melayani rute Banjarmasin, Sungai Danau, Angsana, Batulicin, Siayuh, hingga Geronggang. Kepuasan anda adalah kebahagiaan kami.">

    <meta name="keywords"
        content="travel banjarmasin, travel batulicin, travel sungai danau, travel angsana, travel geronggang, berkah ilahi">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="Icon" type="image/svg" class="rounded-lg" href="/img/travel-logo-2.svg">

    {{-- <link href="{{ asset('assets/guest/css/style.css') }}" rel="stylesheet"> --}}
    {{-- <link href="{{env('APP_URL')}}/assets/admin/css/login.css" rel="stylesheet"> --}}

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
        integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY=" crossorigin="" />


    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</head>


<section class="vh-100" style="background-color: #0b499b">
    <div class="container py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
                <div class="card" style="border-radius: 1rem;">
                    <div class="row g-0">
                        <div class="col-md-6 col-lg-5 d-none d-md-block">
                            <img src="{{ env('APP_URL') }}/img/travel-logo-2.png" alt="login form" class="img-fluid"
                                style="border-radius: 1rem 0 0 1rem; height: 100%; width: auto;" />
                        </div>
                        <div class="col-md-6 col-lg-7 d-flex align-items-center">
                            <div class="card-body p-4 p-lg-5 text-black">
                                <form method="POST" action="{{ route('password.store') }}">
                                    @csrf

                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="/img/travel-logo-2.svg" alt="Logo"
                                            style="width: 50px; height: auto;" class="me-2 rounded">
                                        <span class="h1 fw-bold mb-0 text-info">Travel Berkah Ilahi</span>

                                   
                                        <input type="hidden" name="token" value="{{ $request->route('token') }}">
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Masukkan Password Baru
                                    </h5>

                                  
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="email" id="email" class="form-control form-control-lg"
                                            name="email" value="{{ old('email', $request->email) }}" 
                                            placeholder="Masukkan email" />
                                        <label class="form-label" for="email">Email address</label>
                                    </div>

            
                                    <div data-mdb-input-init class="form-outline mb-4">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <input type="password" id="password" class="form-control form-control-lg"
                                            name="password" placeholder="Masukkan password baru" />
                                        <label class="form-label" for="password">Password Baru</label>
                                    </div>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="password" id="password_confirmation"
                                            class="form-control form-control-lg" name="password_confirmation"
                                            placeholder="Konfirmasi Password Baru" />
                                        <label class="form-label" for="password_confirmation">Konfirmasi Password
                                            Baru</label>
                                    </div>

                                    <div class="pt-1 mb-4">
                                        <button type="submit" class="btn btn-info btn-lg btn-block">Reset
                                            Password</button>
                                    </div>

                                    <a href="{{ route('login') }}" class="small text-muted">Kembali ke login</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


















{{-- <x-guest-layout>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">
       

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-primary-button>
                {{ __('Reset Password') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
