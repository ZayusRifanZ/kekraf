@extends('layouts.app')

@section('content')
<div class="page-content page-auth">
    <section class="kekraf-login" data-aos="fade-up">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <h5 class="text-center">{{ __('Verifikasi Alamat Email Anda') }}</h5>
        
                        <div class="card-body">
                            @if (session('resent'))
                                <div class="alert alert-success" role="alert">
                                    {{ __('Link verifikasi baru telah dikirim ke alamat email Anda.') }}
                                </div>
                            @endif
        
                            {{ __('Sebelum melanjutkan, harap periksa email Anda untuk link verifikasi.') }}
                            {{ __('Jika Anda tidak menerima email') }},
                            <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                                @csrf
                                <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __('klik di sini untuk dapatkan link verifikasi') }}</button>.
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
