@extends('layouts.master')

@section('content')
<div class="main col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <i class="fas fa-bars mb-2" style="font-size: 2rem; color:#22A168;"></i>
                </button>
            </div>
            <div class="col-11 d-flex justify-content-center">
                <h2 class="fs-1 fw-bold" style="color: #074724;">Event</h2>
            </div>
            <button class="btn-notif d-block d-md-none"><img src="{{ asset('assets/img/global/bell.svg') }}" alt=""></button>
        </div>
        <div class="d-flex justify-content-between align-items-center nav-input-container">
            <button class="btn-notif d-none d-md-block"><img src="./assets/img/global/bell.svg" alt=""></button>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-12 d-flex justify-content-center">
                <div class="point">
                    <p class="text-white text-center">Pointku</p>
                    <h1 class="text-white text-center"><b>15.966</b><small>  Point</small></h1>
                    <a class="text-decoration-none text-white d-flex justify-content-center" href="">Klik dan Cek Riwayat</a>
                </div>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-12 d-flex justify-content-center">
                <div class="fitur-image">
                    <a href="#"> <img class="mx-2" src="{{ asset('assets/img/component/plus.png') }}" alt=""></a>
                    <a href="#"><img class="mx-2" src="{{ asset('assets/img/component/riwayat.png') }}" alt=""></a>                   
                    <a href="#"><img class="mx-2" src="{{ asset('assets/img/component/barcode1.png') }}" alt=""></a>
                    <a href="#"><img class="mx-2" src="{{ asset('assets/img/component/bell.png') }}" alt=""></a>
                </div>
            </div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-10 mt-3">
            <div class="event-main">
                <div class="event-information">
                    <div class="fitur-information mb-5 mt-4">
                        <a href="#"> <img class="mx-2" src="{{ asset('assets/img/component/semua1.png') }}" alt=""></a>
                        <a href="#"><img class="mx-2" src="{{ asset('assets/img/component/tiket_belajar.png') }}" alt=""></a>                   
                        <a href="#"><img class="mx-2" src="{{ asset('assets/img/component/tiket_ewalet.png') }}" alt=""></a>
                    </div>
                </div>
                <div class="gift-card" id="event-card">
                    @foreach ($events as $event)
                        <div class="gift-item mt-3" id="event">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/event/' . $event->image)}}" alt="">

                                <div class="d-block flex-column">
                                    <h2 class="gift-title">{{ $event->title }}</h2>
                                    <a class="text-decoration-none" href=""><span class="button-event">Tukar</span></a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection