<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Store;
use App\Models\BankSampah;
use App\Models\Booking;
use App\Models\DetailUser;
use App\Models\ListSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function show () {
        return view('user.map', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'stores' => Store::all(),
            'events' => Event::all(),
            'lists' => ListSampah::all(),
            'banks' => BankSampah::all()
        ]);
    }
    public function store (Request $request) {
        $request->validate([
            'users_loc' => 'required|string|max:255',
            'times' => 'required',
            'bank_sampah_id' => 'required',
        ]);
        $user_id = Auth::id();
        $data = [
            'user_id' => $user_id,
            'users_loc' => $request->users_loc,
            'times' => $request->times,
            'bank_sampah_id' => $request->bank_sampah_id,
            'order_sampah_id' => $request->order_id,
        ];
        Booking::create($data);
        return redirect()->route('booking')->with('success', 'Pesanan berhasil dibuat');
    }
}
