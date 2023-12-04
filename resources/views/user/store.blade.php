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
                <h2 class="fs-1 fw-bold" style="color: #074724;">E-Toko</h2>
            </div>
            <button class="btn-notif d-block d-md-none"><img src="{{ asset('assets/img/global/bell.svg') }}" alt=""></button>
        </div>
        <div class="d-flex justify-content-between align-items-center nav-input-container">
            <button class="btn-notif d-none d-md-block"><img src="{{ asset('assets/img/global/bell.svg')}}" alt=""></button>
        </div>
    </div>

    <div class="content" style="margin-left: 4rem;">
        <!-- search bar -->
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                <div class="nav-input-group">
                    <input type="text" class="nav-input" placeholder="Cari Produk UMKM Luarbiasa">
                    <button class="btn-nav-input"><img src="{{ asset('assets/img/global/search.svg')}}" alt=""></button>
                </div>
            </div>
        </div>
        <!-- owl section bar -->
        <div class="row">
            <div class="col-12">
                <h1 id="kategori">Kategori</h1>
            </div>
        </div>
        <div class="row">
            @foreach ($stores as $store)
            <div class="col-xl-3">
                <div class="store-card">
                    <div class="store-item d-flex flex-column align-items-start justify-content-between">
                        <div class="position-absolute px-3 py-1 fs-5 top-0 left-0 fw-bold text-center text-white" style="background-color:rgba(255, 255, 255, 0.7);z-index:1; border-radius:0.5rem;
                        "><span style="color:#074724;">{{ $store->prize }},-</span></div>
                        <img src="{{ asset('storage/store/' . $store->image)}}" alt="">
                        <div class="position-absolute d-flex align-items-center justify-content-center fs-5 w-100 fw-bold bottom-0 " style="z-index: 1;background-color:rgba(255, 255, 255, 0.7);height:30%; border-radius:5rem; text-align:center;"><span class="mh-100" style="color:#074724;">{{ $store->title }}</span></div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>
@endsection