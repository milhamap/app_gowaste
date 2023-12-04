@extends('layouts.auth')

@section('content')
<div class="login-aside w-50 d-flex flex-column align-items-center text-center">
    <div class="logo row justify-conten-center">
        <div class="col">
            <img src="/assets/img/component/logo.png" width="60%" alt="">
        </div>
    </div>
    <div class="image row justify-conten-center">
        <div class="col">
            <div id="carouselFitur" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                  <li data-target="#carouselFitur" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselFitur" data-slide-to="1"></li>
                  <li data-target="#carouselFitur" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item">
                        <img width="45%" src="/assets/img/component/fitur%20transaksi.png" alt="Third slide">
                    </div>
                    <div class="carousel-item active">
                        <img width="49.4%" src="/assets/img/component/fitur%20maps.png" alt="First slide">
                    </div>
                    <div class="carousel-item">
                        <img width="62%" src="/assets/img/component/fitur%20ewallet.png" alt="Second slide">
                    </div>
                </div>
            </div>
            {{-- <img src="/assets/img/component/fitur%20maps.png" width="50%" alt=""> --}}
        </div>
    </div>
    <h3 class="text-dark mt-5 fw-bold">Mari cintai ligkungan dan dompetmu</h3>
</div>
<div class="w-50 d-flex align-items-center justify-content-center">
    <div id="body-login" class="container container-login animated fadeIn">
        @include('layouts.partials.alerts')
        <div class="title">
            <h1 class="d-inline fw-extrabold">Masuk</h1>
            <a href="/register" id="daftar" class="d-inline float-right text-dark fw-bold text-success">Daftar</a>
        </div>
        <div class="login-form">
            <form action="{{ route('login.process') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="email"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}" autocomplete="off">
                    @error('email')
                        <small class="text-danger float-left">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="password"><b>Password</b></label>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    @error('password')
                        <small class="text-danger float-left">{{ $message }}</small>
                    @enderror
                </div>
                <div class="form-group form-action-d-flex">
                    <button type="submit" class="btn btn-secondary bg-success border-0 mt-3 mt-sm-0 fw-bold col">Sign In</button>
                </div>
                <div class="form-group text-center mb-3">
                    <h5>Butuh bantuan?</h5>
                    <h5>Hubungi <a href="" id="cs" class="text-success">Go Waste Care</a></h5>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
