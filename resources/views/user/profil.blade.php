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
    <div class="content" style="margin-left: 4rem;">
        <form method="POST" action="{{ route('profil.store') }}" enctype="multipart/form-data">
            @include('layouts.partials.alerts')
            @csrf
            <div class="row d-flex">
                <div class="col-xl-6">
                    <div class="form-title d-flex justify-content-start">
                        <div>
                            <img src="{{ asset('assets/img/component/profil HD.png')}}" alt="" height="150rem" width="150rem">
                            {{-- <img class="position-absolute" src="{{ asset('assets/img/component/edit.png') }}" alt=""> --}}
                        </div>
                        <?php
                            if ($detail != null) {
                                $fullname = explode(' ', $detail->fullname);
                                $count = count($fullname);
                                $firstname = "";
                                $lastname = "";
                                $median = $count->median;
                                ddd($median);
                                if($median >= 1) {
                                    for($i = 0; $i < $median; $i++)
                                        $firstname .= $fullname[$i] . ' ';
                                        // if($count > 2)
                                        //     $name += $fullname[$i] . ' ';
                                    for($i = $median; $i < $count; $i++)
                                        $lastname .= $fullname[$i] . ' ';
                                } else {
                                    $firstname = $fullname[0];
                                    // $lastname = $fullname[1];
                                }
                                if($count == 1)
                                    $name = $fullname[0];
                                else if($count == 2)
                                    $name = $fullname[0] . ' ' . $fullname[1];
                                else if($count > 2)
                                    $name = $fullname[0] . ' ' . $fullname[1] . ' ' . $fullname[2];
                                // $firstname = $fullname[0] . ' ' . $fullname[1];
                                // $lastname = $fullname[2];

                            } else {
                                $name = auth()->user()->username;
                            }
                        ?>
                        <div class="mx-4 fw-bold fs-1 text-uppercase">{{ $name }}</div>
                    </div>
                </div>
                <div class="col-xl-6 d-flex justify-content-end">
                    @if ($detail == null)
                        <button type="submit" class="fs-5 d-flex justify-content-center text-center align-items-center fw-bolder" style="width: 209px;height: 56px; background: linear-gradient(109.79deg, #4BC281 36.77%, #45E08B 75.53%); border-radius: 1rem;border:none;">Simpan</button>
                    @else
                        <button type="submit" class="fs-5 d-flex justify-content-center text-center align-items-center fw-bolder" style="width: 209px;height: 56px;background: linear-gradient(180deg, #FCCC1F 0%, #FFEB5A 100%);border-radius: 1rem;border:none;">Edit</button>                    
                    @endif
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <div class="name d-flex">
                        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                        @if ($detail != null)
                            <div class="col-xl-6 mt-1 mx-1">
                                <label for="firstname" class="form-label">Nama Depan</label>
                                <input type="text" name="firstname" value="{{ $firstname }}" class="form-control rounded-4 @error('firstname') is-invalid @enderror" id="firstname" required>
                                @error('firstname')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xl-6 mt-1 mx-1">
                                <label for="lastname" class="form-label">Nama Belakang</label>
                                <input type="text" name="lastname" value="{{ $lastname }}" class="form-control rounded-4 @error('lastname') is-invalid @enderror" id="lastname">
                                @error('lastname')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                        @else
                            <div class="col-xl-6 mt-1 mx-1">
                                <label for="firstname" class="form-label">Nama Depan</label>
                                <input type="text" name="firstname" class="form-control rounded-4 @error('firstname') is-invalid @enderror" id="firstname" required>
                                @error('firstname')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-xl-6 mt-1 mx-1">
                                <label for="lastname" class="form-label">Nama Belakang</label>
                                <input type="text" name="lastname" class="form-control rounded-4 @error('lastname') is-invalid @enderror" id="lastname">
                                @error('lastname')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                    </div>
                    <div class="col-xl-12 mt-1 mx-2">
                        <label for="password" class="form-label">Kata Sandi</label>
                        <input type="password" name="password" class="form-control rounded-4 @error('password') is-invalid @enderror" id="password" required>
                        @error('password')
                            <small class="text-danger float-left">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-12 mt-1 mx-2">
                        <label for="password_confirmation" class="form-label">Konfirmasi Kata Sandi</label>
                        <input type="password" name="password_confirmation" class="form-control rounded-4 @error('password_confirmation') is-invalid @enderror" id="password_confirmation" required>
                        @error('password_confirmation')
                            <small class="text-danger float-left">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="col-xl-12 mt-1 mx-2">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" name="email" value="{{ auth()->user()->email }}" class="form-control rounded-4" id="email" aria-describedby="emailHelp" disabled>
                    </div>
                    @if ($detail != null)
                        <div class="col-xl-12 mt-1 mx-2">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="text" name="phone" value="{{ $detail->phone }}" class="form-control rounded-4 @error('telepon') is-invalid @enderror" id="telepon" required>
                            @error('telepon')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-xl-12 mt-1 mx-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="address" value="{{ $detail->address }}" id="alamat" class="form-control rounded-4 @error('alamat') is-invalid @enderror" required>
                            @error('alamat')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-xl-12 mt-1 mx-2">
                            <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                            <input type="text" name="nik" id="nik" value="{{ $detail->nik }}" class="form-control rounded-4 @error('nik') is-invalid @enderror" required>
                            @error('nik')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                    @else
                        <div class="col-xl-12 mt-1 mx-2">
                            <label for="nik" class="form-label">Nomor Induk Kependudukan</label>
                            <input type="text" name="nik" id="nik" class="form-control rounded-4 @error('nik') is-invalid @enderror" required>
                            @error('nik')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-xl-12 mt-1 mx-2">
                            <label for="telepon" class="form-label">No. Telepon</label>
                            <input type="text" name="phone" class="form-control rounded-4 @error('telepon') is-invalid @enderror" id="telepon" required>
                            @error('telepon')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-xl-12 my-1 mx-2">
                            <label for="alamat" class="form-label">Alamat</label>
                            <input type="text" name="address" id="alamat" class="form-control rounded-4 @error('alamat') is-invalid @enderror" required>
                            @error('alamat')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                    @endif
                </div>
                <div class="col-xl-6 mt-1">
                    <div class="name d-flex">
                        <div class="col-xl-6 mx-2">
                            <label for="kelamin" class="form-label">Jenis Kelamin</label>
                            <select id="kelamin" class="form-select @error('gender') is-invalid @enderror" name="gender" id="kelamin" required>
                                <option value="Laki-Laki">Laki-Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                            @error('kelamin')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                        <div class="col-xl-6 mx-2">
                            <label for="kota" class="form-label">Kota Tinggal</label>
                            <select id="kota" name="domisili" class="form-select @error('domisili') is-invalid @enderror" required>
                                <option value="Gresik">Gresik</option>
                                <option value="Surabaya">Surabaya</option>
                            </select>
                            @error('kota')
                                <small class="text-danger float-left">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xl-12 mt-1">
                        @if ($detail != null)
                            <div class="col-xl-6 mx-2">
                                <label for="ttl" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birthday" value="{{ $detail->birthday }}" id="ttl" class="form-control rounded-4 @error('ttl') is-invalid @enderror" required>
                                @error('ttl')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                        @else
                            <div class="col-xl-6 mx-2">
                                <label for="ttl" class="form-label">Tanggal Lahir</label>
                                <input type="date" name="birthday" id="ttl" class="form-control rounded-4 @error('ttl') is-invalid @enderror" required>
                                @error('ttl')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                        @endif
                        {{-- <div class="ttl d-flex">
                            <div class="col-xl-6 mx-1">
                                <select class="form-select" id="ttl">
                                    <option>Januari</option>
                                    <option>Februari</option>
                                </select>
                            </div>
                            <div class="col-xl-3 mx-1">
                                <select class="form-select" id="ttl">
                                    <option>1</option>
                                    <option>2</option>
                                </select>
                            </div>
                            <div class="col-xl-3 mx-1">
                                <select class="form-select" id="ttl">
                                    <option>1990</option>
                                    <option>1991</option>
                                </select>
                            </div>
                        </div> --}}
                        <h1 class="mt-5 fw-bold fs-3">Payment Method</h1>
                        <div class="col-xl-6">
                            <div class="col-xl-12">
                                <label for="bank" class="form-label">Bank</label>
                                <select class="form-select @error('bank') is-invalid @enderror" name="payment_id" id="bank" required>
                                    @foreach ($payments as $payment)
                                        <option value="{{ $payment->id }}">{{ $payment->name }}</option>
                                    @endforeach
                                </select>
                                @error('bank')
                                    <small class="text-danger float-left">{{ $message }}</small>
                                @enderror
                            </div>
                            @if ($detail != null)
                                <div class="col-xl-12">
                                    <label for="no_rek" class="form-label">No. Rekening</label>
                                    <input type="text" name="rekening" value="{{ $detail->rekening }}" class="form-control rounded-4 @error('no_rek') is-invalid @enderror" id="no_rek" required>
                                    @error('no_rek')
                                        <small class="text-danger float-left">{{ $message }}</small>
                                    @enderror
                                </div>
                            @else
                                <div class="col-xl-12">
                                    <label for="no_rek" class="form-label">No. Rekening</label>
                                    <input type="text" class="form-control rounded-4 @error('no_rek') is-invalid @enderror" id="no_rek" required>
                                    @error('no_rek')
                                        <small class="text-danger float-left">{{ $message }}</small>
                                    @enderror
                                </div>
                            @endif
                            <h1 class="mt-3 fw-semibold fs-5 mb-1">E-Wallet</h1>
                            <div class="col-xl-12 pb-4">
                                <label for="no_ewallet" class="form-label">No. E-Wallet</label>
                                <input type="text" class="form-control rounded-4" id="no_ewallet" disabled>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection