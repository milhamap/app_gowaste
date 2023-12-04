@extends('user.layouts.master')
{{-- Modal Exit --}}
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="logoutModals" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-image: url('/assets/img/component/bg_logout.png');background-size:cover;border-radius:2rem;">
            <div class="modal-body p-5 m-3">
                <h1 class="d-flex justify-content-center align-items-center text-center fw-bold fs-5">apakah kamu ingin keluar dari akun ini?</h1>
                <div class="d-flex justify-content-center align-items-center text-center mt-4">
                    <a href="{{ route('logout') }}" class="btn btn-block btn-lg text-white mx-1 px-5 py-2" style="background: linear-gradient(105.67deg, #146540 39.04%, #34A56E 82.86%);border-radius: 0.5rem;">
                        {{-- <i class="fas fa-sign-out-alt mr-2"></i> --}}
                        <span>Keluar</span>
                    </a>
                    <a data-dismiss="modal" class="btn btn-block btn-lg text-white mx-1 px-5 py-2" style="background: linear-gradient(105.67deg, #146540 39.04%, #34A56E 82.86%);border-radius: 0.5rem;">
                        {{-- <i class="fas fa-sign-in-alt mr-2"></i> --}}
                        <span>Tidak</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Modal Order --}}
@foreach ($lists as $list)
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="orderSampah{{ $list->id }}" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-image: url('/assets/img/component/bg_modals.png');background-size:cover;border-radius:2rem;">
            <div class="modal-header" style="border: none">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-1">
                <h1 class="d-flex justify-content-center align-items-center text-center fw-bold" style="font-size: 2rem;">Setor Sampah</h1>
                <div class="mt-3 d-block">
                    <div class="d-flex justify-content-center align-items-center text-center mb-2">
                        <img style="width: 55px;height:55px;" src="{{ asset('assets/img/component/iconwaste.png') }}" alt="">
                    </div>
                    <p class="text-center">Tipe Sampah</p>
                    <h3 style="color: #2F9264;font-size:1.8rem" class="fw-bold text-center">{{ $list->name }}</h3>
                </div>
                <form method="POST" action="{{ route('order') }}">
                    @csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="hidden" name="list_sampah_id" value="{{ $list->id }}">
                        <div class="d-block">
                            <div class="mt-3">
                                <label for="quantity">Berat</label>
                                <div class="input-group mb-3">
                                    <input type="number" id="quantity" name="quantity" class="form-control ">
                                    <span class="input-group-text" id="basic-addon2">Kilogram</span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span>Harga</span>
                                <div class="input-group mb-3">
                                    <input type="text" name="price" id="price" value="{{ $list->price }}" class="form-control " disabled>
                                    <span class="input-group-text" id="basic-addon2">Kilogram</span>
                                </div>
                            </div>
                            <div class="mt-3">
                                <span>Total</span>
                                <input type="number" name="total" id="total" class="form-control " disabled>
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mt-3">
                                    <button type="submit" class="d-flex btn-checkout3 justify-content-center align-items-center text-center">
                                        <span>Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endforeach

{{-- Modal Order Sampah --}}
{{-- @foreach ($lists as $list)
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="orderSampah{{ $list->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog model-dialog-centered">
        <div class="modal-content" style="background-image: url('/assets/img/component/bg_logout.png');background-size:cover;border-radius:2rem;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setor Sampah</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('order') }}"></form>
                    @csrf
                    <input type="hidden" name="list_sampah_id" value="{{ $list->id }}">
                    <div class="form-group mt-3">
                        <label>Tipe Sampah</label>
                        <input type="text" value="{{ $list->name }}" class="form-control" disabled>
                    </div>
                    <div class="form-group mt-2">
                        <label for="price">Harga per Kg</label>
                        <input type="text" name="price" id="price" value="{{ $list->price }}" class="form-control" disabled>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="quantity">Berat satuan Kg</label>
                        <input type="number" id="quantity" name="quantity" class="form-control">
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="total">Total</label>
                        <input type="number" name="total" id="total" class="form-control" disabled>
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endforeach --}}

{{-- Menu Atur Penjemputan --}}
<div class="modal fade" data-backdrop="static" data-keyboard="false" id="bookingOrder" aria-labelledby="exampleModalLabel" aria-hidden="true" >
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="background-image: url('/assets/img/component/bg_modals.png');background-size:cover;border-radius:2rem;">
            <div class="modal-header" style="border: none">
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body m-1">
                <h1 class="d-flex justify-content-center align-items-center text-center fw-bold mb-4" style="font-size: 2rem;">Setel Waktu <br> Penjemputan</h1>
                <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <div class="d-flex justify-content-center align-items-center">
                        <input type="hidden" name="order_id" value="{{ session()->get('order_id') }}">
                        <div class="d-block">
                            <div class="mt-3">
                                <label for="users_loc">Posisi Penjemputan</label>
                                <input type="text" name="users_loc" id="users_loc" class="form-control">
                            </div>
                            <div class="mt-3">
                                <label for="bank_sampah_id">Pilih Bank Sampah</label>
                                <select name="bank_sampah_id" id="bank_sampah_id" class="form-control">
                                    @foreach ($banks as $bank)
                                        <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="mt-3">
                                <label for="times">Jam Penjemputan</label>
                                <input type="time" id="times" name="times" class="form-control">
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="mt-3">
                                    <button type="submit" class="d-flex btn-checkout3 justify-content-center align-items-center text-center">
                                        <span>Simpan</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

{{-- <div class="modal fade" data-backdrop="static" data-keyboard="false" id="bookingOrder" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog model-dialog-centered">
        <div class="modal-content" style="background-image: url('/assets/img/component/bg_logout.png');background-size:cover;border-radius:2rem;">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Setel Waktu Penjemputan</h5>
                <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form method="POST" action="{{ route('booking.store') }}">
                    @csrf
                    <input type="hidden" name="order_id" value="{{ session()->get('order_id') }}">
                    <div class="form-group mt-3">
                        <label for="users_loc">Posisi Penjemputan</label>
                        <input type="text" name="users_loc" id="users_loc" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="bank_sampah_id">Pilih Bank Sampah</label>
                        <select name="bank_sampah_id" id="bank_sampah_id" class="form-control">
                            @foreach ($banks as $bank)
                                <option value="{{ $bank->id }}">{{ $bank->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group mt-2 mb-3">
                        <label for="times">Jam Penjemputan</label>
                        <input type="time" id="times" name="times" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div> --}}
<script>
    const quantity = document.querySelector('#quantity');
    const price = document.querySelector('#price');
    const total = document.querySelector('#total');

    quantity.addEventListener('keyup', function () {
    fetch('/order/total?quantity=' + quantity.value + '&price=' + price.value)
        .then(response => response.json())
        .then(data => total.value =  data.total)
    });
</script>