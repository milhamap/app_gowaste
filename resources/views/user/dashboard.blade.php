@extends('user.layouts.master')

@section('content')
<div class="main col-xl-9">
    <div class="nav">
        <div class="d-flex justify-content-between align-items-center w-100 mb-3 mb-md-0">
            <div class="d-flex justify-content-start align-items-center">
                <button id="toggle-navbar" onclick="toggleNavbar()">
                    <i class="fas fa-bars mb-2" style="font-size: 2rem; color:#22A168;"></i>
                </button>
                <div class="col-12" style="margin-left: 4rem;">
                    <?php
                        if ($detail != null) {
                            $fullname = explode(' ', $detail->fullname); 
                            $name = $fullname[0];
                        } else {
                            $name = auth()->user()->username;
                        }
                        //ubah timezone menjadi jakarta
                        date_default_timezone_set("Asia/Jakarta");
                        //ambil jam dan menit
                        $jam = date('H:i');

                        //atur salam menggunakan IF
                        if ($jam > '05:30' && $jam < '10:00') {
                            $salam = 'Selamat Pagi';
                        } elseif ($jam >= '10:00' && $jam < '14:00') {
                            $salam = 'Selamat Siang';
                        } elseif ($jam >= '14:00' && $jam < '18:00') {
                            $salam = 'Selamat Sore';
                        } else {
                            $salam = 'Selamat Malam';
                        }
                    ?>
                    <h2 class="nav-title">Hello {{ $name . ', ' . $salam }}</h2>
                    @if ($detail == null)
                        <p class="fs-5 ">Yuk Isi Datamu <a href="/profil" class="text-decoration-none" style="color:#22A168;">Sekarang<a></p>
                    @endif
                </div>
            </div>
            <div class="d-flex justify-content-between align-items-center nav-input-container">
                <button class="btn-notif d-none d-md-block"><img src="./assets/img/global/bell.svg" alt=""></button>
            </div>
        </div>

    </div>

    <div class="content" style="margin-left: 4rem;">
        <h2 class="col-12 content-title ">Mari Kelolah Aku</h2>
        <div class="row">
            <div class="carousel" data-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($edukasis as $edukasi)
                    <div class="col-xl-3">
                        <div class="carousel-item">
                            <div class="statistics-card">
                                <iframe width="250" height="200" class="align-items-center" src="{{ $edukasi->link }}" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                <h3>{{ $edukasi->title }}</h3>
                                <p>{{ $edukasi->description }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            {{-- <div class="carousel slide" >
                <div> Your Content </div>
                <div> Your Content </div>
                <div> Your Content </div>
                <div> Your Content </div>
                <div> Your Content </div>
                <div> Your Content </div>
                <div> Your Content </div>
            </div> --}}
            {{-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img class="d-block w-100" src="{{ asset('assets/img/component/ewallet.png') }}" alt="First slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/component/dompet.png') }}" alt="Second slide">
                  </div>
                  <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset('assets/img/component/ewallet.png') }}" alt="Third slide">
                  </div>
                </div>
              </div> --}}
        </div>
        <div class="row mt-5">
            <div class="col-12 col-lg-6">
                <h2 class="content-title">Mari selamatkan dompetmu
                    <br>dan lingkungan</h2>
                    <div class="document-card">
                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="document-icon box">
                                <i class="fas fa-calculator"></i>
                            </div>

                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Konversi Pendapatan</h2>
                                <span class="document-desc">Cek Kalkulasi pendapatan mu</span>
                            </div>
                        </div>

                        <button class="btn-statistics">
                            <i class="fas fa-arrow-circle-right"></i>
                        </button>

                    </div>

                    <div class="document-item">
                        <div class="d-flex justify-content-start align-items-center">
                            <div class="document-icon globe">
                                <i class="fas fa-dumpster"></i>
                            </div>
                            <div class="d-flex flex-column justify-content-between align-items-start">
                                <h2 class="document-title">Serahkan Sampahmu</h2>
                                <span class="document-desc">Yuk Ubah Sampah mu menjadi uang</span>
                            </div>
                        </div>

                        <button class="btn-statistics">
                            <i class="fas fa-arrow-circle-right"></i>
                        </button>

                    </div>        
                </div>
            </div>

            <div class="col-12 col-lg-6">
                <h2 class="content-title mb-5">Event</h2>

                <div class="document-card" id="event-card">
                    @foreach ($events as $event)
                        <div class="document-item" id="event">
                            <div class="d-flex align-items-center">
                                <img src="{{ asset('storage/event/' . $event->image)}}" alt="">
                                <div class="d-block flex-column">
                                    <h2 id="event-title" class="document-title">{{ $event->title }}</h2>
                                    <span class="button-event">Tukar</span>
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