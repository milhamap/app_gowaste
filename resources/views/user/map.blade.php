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
                <h2 class="fs-2 fw-bold" style="color: #074724;">E-Lokasi</h2>
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
            @include('layouts.partials.alerts')
            <div class="col-12 d-flex justify-content-center align-items-center mt-2">
                {{-- <div id="googleMap" style="width:100%;height:380px;z-index:99;"></div> --}}
                {{-- <iframe
                    width="70%"
                    height="350"
                    frameborder="0" style="border:0"
                    referrerpolicy="no-referrer-when-downgrade"
                    src="https://www.google.com/maps/embed/v1/place?key=AIzaSyB95Z-nndaAo_gOqkziPFUp4HiI1hIugP0&q=Samsat+Kudus"
                    allowfullscreen>
                </iframe> --}}
                <div id="map" style="height:370px;width: 100%;position: relative;">
                    <div class="formBlock " style="max-width: 200px; background-color: #FFF;border: 1px solid #ddd;position: absolute; top: 0.7rem; left: 2.5rem;padding: 10px;z-index: 999; box-shadow: 0 1px 5px rgba(0,0,0,0.65); border-radius: 5px;width: 100%;">
                        <form id="form" style="padding: 0; margin: 0;">
                            <input type="text" name="start" class="input" id="start" placeholder="Pilih Lokasi Anda" style="margin-bottom: 10px; padding: 3px;width: 100%;border: 1px solid #ddd;font-size: 15px;border-radius: 3px;"/>
                            <select name="end" id="destination" style="margin-bottom:10px; padding: 3px;width: 100%;border: 1px solid #ddd;font-size: 15px;border-radius: 3px;">
                                @foreach ($banks as $bank)
                                    <option name="bank_sampah" value="{{ $bank->name }}">{{ $bank->name }}</option>
                                @endforeach
                            </select>
                            <button class="btn btn-success" type="submit">Cek Lokasi</button>
                        </form>
                    </div>
                </div>
                {{-- <div id="map" style="width:70%; height:350;"></div> --}}
                {{-- <div id="map" style="width: 70%; height: 350;"></div>
                <form>
                    <div class="form-group">
                        <label>Masukkan Lokasi Anda</label>
                        <input type="text" class="form-control" id="start" placeholder="Jl. Mayjend Ahmad Yani" required>
                    </div>
    
                    <div class="form-group">
                        <label>Masukkan Lokasi Tujuan</label>
                        <input type="text" class="form-control" id="end" placeholder="Jl. Semarang" required>
                    </div>
                    <input type="submit" class="btn btn-light" id="pesan-btn" value="Pesan">
                </form> --}}
            </div>
        </div>
        <!-- owl section bar -->
        <div class="row">
            {{-- <div id="features-carousel" class="owl-carousel">
                <div class="features-item" style="width: 100%; padding: 10px; margin:30px; background: linear-gradient(128.75deg, #56D48F 23.85%, #4BC281 75.62%); backdrop-filter: blur( 5px ); -webkit-backdrop-filter: blur( 5px );border-radius: 10px; border: 1px solid rgba( 255, 255, 255, 0.18 );border-radius: 26px;margin-bottom: 15px;">
                <h3 class="fs-5 fw-3 d-flex justify-content-center align-items-center text-center text-white">Waktu Penjemputan</h3>
                    <div class="map-card"  style=" margin: 15px; border-radius: 10px; text-align: center;position: relative; z-index: 1;overflow: hidden; ">
                        <div class="item-map-card rounded-4" style="background: #4BC281;">
                           <h3 class="fs-3 fw-3 d-flex justify-content-center align-items-center text-center text-white">12.00 - 15.00</h3>
                           <button class="d-flex btn-checkout1 justify-content-center align-items-center text-center">
                                    <span>Pilih</span>
                            </button>
                        </div>
                        <div class=" ">
                        </div>
                    </div>
                </div>
            </div> --}}
            {{-- <div id="features-carousel" class="owl-carousel">  --}}
                <div class="col-xl-3">
                    <div class="mt-4 store-card">
                        <div class="store-item" style="background: linear-gradient(128.75deg, #56D48F 23.85%, #4BC281 75.62%);z-index:1; border-radius:2rem;height:230px">
                            <div class="d-block">
                                <div class="px-3 d-flex justify-content-center align-items-center text-center fs-5 fw-bold">
                                    <span style="color:#ffffff;margin:2rem 0">Waktu Penjemputan</span>
                                </div>
                                <div class="px-3 d-flex align-items-center justify-content-center fs-5 text-center bottom-0" style="z-index: 2;background: #4BC281; height:50%; border-radius:2rem;width:100%;margin:0;">
                                    <div class="d-block my-3">
                                        <div class="d-flex justify-content-center align-items-center text-center">
                                            <span class="mt-3 text-white" style="font-size: 1rem">lebih detail</span>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center text-center">
                                            <button type="submit" class="mt-3 btn-checkout1 d-flex justify-content-center align-items-center text-cente" data-target="#bookingOrder" data-toggle="modal">
                                                <span>Atur</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>
                </div>
                <div class="col-xl-3">
                    <div class="mt-4 store-card">
                        <div class="store-item" style="background: linear-gradient(128.75deg, #56D48F 23.85%, #4BC281 75.62%);z-index:1; border-radius:2rem;height:230px">
                            <div class="d-block">
                                <div class="px-3 d-flex justify-content-center align-items-center text-center fs-5 fw-bold">
                                    <span style="color:#ffffff;margin:2rem 0">Waktu Penjemputan</span>
                                </div>
                                <div class="px-3 d-flex align-items-center justify-content-center fs-5 text-center bottom-0" style="z-index: 2;background: #4BC281; height:50%; border-radius:2rem;width:100%;margin:0;">
                                    <div class="d-block my-3">
                                        <div class="d-flex justify-content-center align-items-center text-center">
                                            <span class="mt-3 text-white" style="font-size: 1rem">lebih detail</span>
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center text-center">
                                            <button type="submit" class="mt-3 btn-checkout1 d-flex justify-content-center align-items-center text-cente" data-target="#bookingOrder" data-toggle="modal">
                                                <span>Atur</span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>   
                        </div>
                    </div>  
                </div> 
            {{-- </div>  --}}
        </div>
    </div>
</div>
@endsection