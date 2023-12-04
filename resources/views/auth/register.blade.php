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
                <div class="carousel-inner">
                    <ol class="carousel-indicators">
                      <li data-target="#carouselFitur" data-slide-to="0" class="active"></li>
                      <li data-target="#carouselFitur" data-slide-to="1"></li>
                      <li data-target="#carouselFitur" data-slide-to="2"></li>
                    </ol>
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
        </div>
    </div>
    <h3 class="text-dark mt-5 fw-bold">Mari cintai ligkungan dan dompetmu</h3>
</div>
<div class="w-50 d-flex align-items-center justify-content-center">
    <div id="body-login" class="container container-login animated fadeIn">
        @include('layouts.partials.alerts')
        <div class="title d-block text-center">
            <h1 class="fw-extrabold">Daftar Sekarang</h1>
            <h5 class="fw-bold">Sudah punya akun Go-Waste? <a href="/" style="text-decoration: none" class="text-success">Login</a></h5>
        </div>
        <div class="login-form">
            <form action="{{ route('register.process') }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="username" class="placeholder"><b>Username</b></label>
                    <input id="username" name="username" type="text" class="form-control @error('username') is-invalid @enderror" required value="{{ old('username') }}" autocomplete="off" autofocus>
                    @error('username')
                        <div class="text-danger float-left">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email" class="placeholder"><b>Email</b></label>
                    <input id="email" name="email" type="email" class="form-control @error('email') is-invalid @enderror" required value="{{ old('email') }}" autocomplete="off">
                    @error('email')
                        <div class="text-danger float-left">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="role" class="placeholder"><b>Role</b></label><br>
                    <select class="col form-control" id="role" name="role_id">
                        @foreach ($roles as $role)
                            @if ($role->id != 1)
                                <option value="{{ $role->id }}">{{ $role->name }}</option>  
                            @endif
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="password" class="placeholder"><b>Password</b></label>
                    <div class="position-relative">
                        <input id="password" name="password" type="password" class="form-control @error('password') is-invalid @enderror" required>
                        <div class="show-password">
                            <i class="icon-eye"></i>
                        </div>
                    </div>
                    @error('password')
                        <div class="text-danger float-left">{{ $message }}</div>
                    @enderror
                </div>
                <div class="form-group form-action-d-flex">
                    <button type="submit" class="btn btn-secondary bg-success border-0 mt-3 mt-sm-0 fw-bold col">Sign Up</button>
                </div>
                <div class="form-group text-center">
                    <h5>Butuh bantuan?</h5>
                    <h5>Hubungi <a href="" id="cs" class="text-success">Go Waste Care</a></h5>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
