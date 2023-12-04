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
            <button class="btn-notif d-block d-md-none"><img src="{{ asset('assets/img/global/bell.svg') }}" alt=""></button>
        </div>
        <div class="d-flex justify-content-between align-items-center nav-input-container">
            <button class="btn-notif d-none d-md-block"><img src="./assets/img/global/bell.svg" alt=""></button>
        </div>
    </div>
    <div class="content">
        <div class="row d-flex justify-content-center">
            <div class="col-8 d-flex justify-content-center py-3" style="background-image: url('/assets/img/component/BG RIWAYAT TRANSAKSI.png');background-size:cover;border-radius:3rem;">
                <div class="d-block">
                    <h1 class="mt-3 text-start fw-bold">Riwayat Transaksi</h1>  
                    <div class="mt-3" style="height: 33rem; overflow-y:scroll;">
                        @foreach ($orders as $order)
                            <div class="d-flex align-items-start mt-4">
                                <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="60px">
                                <div class="d-flex flex-column mx-4">
                                    <div class=""><span>Transaksi {{$order->listsampah->name}} {{ $order->quantity }} kg dari {{ auth()->user()->username }} sebesar {{ $order->total }}</span></div>
                                    <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                                    <p class="text-secondary d-flex justify-content-end" style="font-size: 0.7rem;">{{ strftime('%A %d %B %Y, %H:%M', $order->created_at->getTimestamp()) }}</p>
                                </div>
                            </div>
                        @endforeach
                        {{-- <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div>
                        <div class="d-flex align-items-start mt-4">
                            <img class="img-fluid mb-auto" src="{{ asset('assets/img/component/profil_full.png') }}" alt="" height="60px" width="50px">
                            <div class="d-flex flex-column mx-4">
                                <div class=""><span>Transaksi dari user Milhamp</span></div>
                                <div class="text-success" style="font-size: 0.9rem;"><span>Transaksi telah di terima</span></div>
                            </div>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>
@endsection