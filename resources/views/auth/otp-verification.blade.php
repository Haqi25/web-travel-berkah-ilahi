@include('user.layouts.__header')



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
                              
                            
                                <form method="POST" action="{{ route('verify.otp.store') }}">
                                    @csrf
                                    <div class="d-flex align-items-center mb-3 pb-1">
                                        <img src="/img/travel-logo-2.svg" alt="Logo"
                                            style="width: 50px; height: auto;" class="me-2 rounded">
                                        <span class="h1 fw-bold mb-0 text-info">Travel Berkah Ilahi</span>
                                    </div>

                                    <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Kami Telah mengirim
                                        kode OTP ke email  <span class="text-primary">{{session('login_email')}}</span> silahkan cek Kode OTP </h5>

                                    <div data-mdb-input-init class="form-outline mb-4">
                                        <input type="text" id="form2Example17"
                                            class="form-control form-control-lg text-center fw-bold" name="otp"
                                            placeholder="------" inputmode="numeric" pattern="[0-9]*" maxlength="6"
                                            autocomplete="one-time-code" required
                                            style="letter-spacing: 0.5rem; font-size: 1.5rem;" />
                                        <label class="form-label" for="form2Example17">Kode OTP (6 Digit)</label>
                                    </div>


                                    @error('otp')
                                        <div class="text-danger small mt-2">
                                            {{ $message }}
                                        </div>
                                    @enderror

                                      @if (session('message'))
                                    <div class="mb-4 font-medium text-sm text-danger">
                                        {{ session('message') }}
                                    </div>
                                @endif


                                    <div class="pt-1 mb-4">
                                        <button data-mdb-button-init data-mdb-ripple-init
                                            class="btn btn-info btn-lg btn-block">Verifikasi OTP</button>
                                    </div>


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
    <form method="POST" action="{{route('verify.otp.store')}}">
        @csrf
        
        <div>
            @if (session('message'))
    <div class="mb-4 font-medium text-sm text-red-600">
        {{ session('message') }}
    </div>
@endif
            <x-input-label for="otp" :value="__('OTP CODE')" />
            <x-text-input id="otp" class="block mt-1 w-full" type="text" name="otp" required autofocus />
          
            <x-input-error :messages="$errors->get('otp')" class="mt-2" />
        </div>
        <div class="flex items-center justify-center mt-4">
            <x-primary-button>
                {{ __('Validate OTP CODE') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout> --}}
