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
            <div class="col-12 d-flex justify-content-center">
                <h2 class="fs-1 fw-bold" style="color: #074724;">Serahkan Sampah</h2>
            </div>
            <button class="btn-notif d-block d-md-none"><img src="{{ asset('assets/img/global/bell.svg') }}" alt=""></button>
        </div>
        <div class="d-flex justify-content-between align-items-center nav-input-container">
            <button class="btn-notif d-none d-md-block"><img src="./assets/img/global/bell.svg" alt=""></button>
        </div>
    </div>
    <div class="content">
        <div class="row">
            <div class="col-6 mt-2 d-flex justify-content-end">
                <img width="239px" height="215px" src="{{ asset('assets/img/component/lingkaran.png') }}" alt="">
            </div>
            <div class="col-6 mt-3">
                <h2 class="checkout-title">Limbah Paling Banyak<br> Ditukarkan</h2>
                <div class="list-checkout">
                    <div class="list-item"><img src="{{ asset('assets/img/component/rank1.png') }}" alt=""><p>Sampah Plastik</p></div>
                    <div class="list-item"><img src="{{ asset('assets/img/component/rank2.png') }}" alt=""><p>Sampah Kertas</p></div>
                    <div class="list-item"><img src="{{ asset('assets/img/component/rank3.png') }}" alt=""><p>Sampah Besi</p></div>
                    <div class="list-item"><img src="{{ asset('assets/img/component/rank4.png') }}" alt=""><p>Sampah Elektronik</p></div>
                </div>
            <div></div>
        </div>
        <div class="row d-flex justify-content-center mt-3">
            <div class="col-10 mt-3">
            <div class="checkout-main">
                <div class="checkout-information">
                    <div class="information">
                        <h2>Informasi Sampah</h2>
                        <p>Pilih jenis dan masukkan perkiraan berat sampah, <br>tidak ada batasan berat minimal</p>
                    </div>
                </div>
                <div class="checkout-card">
                    @foreach ($lists as $list)
                        @if ($list->id % 2 != 0)
                            <div class="checkout-item1">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="checkout-icons box">
                                        <i class="fas fa-recycle text-white"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="checkout-body">{{ $list->name }}</h2>
                                    </div>
                                </div>
                                {{-- sementara --}}
                                <button type="button" data-target="#orderSampah{{ $list->id }}" data-toggle="modal" class="d-flex btn-checkout1 align-items-end">
                                    <span>Pilih</span>
                                </button>
                            </div>
                        @else
                            <div class="checkout-item2">
                                <div class="d-flex justify-content-start align-items-center">
                                    <div class="checkout-icons box">
                                        <i class="fas fa-recycle text-white"></i>
                                    </div>
                                    <div class="d-flex flex-column justify-content-between align-items-start">
                                        <h2 class="checkout-body">{{ $list->name }}</h2>
                                    </div>
                                </div>
                                <button type="button" data-target="#orderSampah{{ $list->id }}" data-toggle="modal" class="d-flex btn-checkout2 align-items-end">
                                    <span>Pilih</span>
                                </button>
                            </div>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>

    </div>
</div>
@endsection