<?php

namespace App\Http\Controllers;

use App\Models\BankSampah;
use App\Models\User;
use App\Models\Event;
use App\Models\Store;
use App\Models\Edukasi;
use App\Models\DetailUser;
use App\Models\ListSampah;
use App\Models\OrderSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Optional;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class FiturController extends Controller
{
    public function show()
    {
        return view('user.dashboard', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'edukasis' => Edukasi::all(),
            'events' => Event::all(),
            'lists' => ListSampah::all(),
            'banks' => BankSampah::all(),
        ]);
    }

    public function event()
    {
        return view('user.event', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'events' => Event::all(),
            'lists' => ListSampah::all(),
            'banks' => BankSampah::all()
        ]);
    }

    public function store() {
        return view('user.store', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'stores' => Store::all(),
            'lists' => ListSampah::all(),
            'banks' => BankSampah::all()
        ]);
    }
    public function history () {
        return view('user.history', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'lists' => ListSampah::all(),
            'orders' => OrderSampah::where('user_id', Auth::id())->get(),
            'banks' => BankSampah::all()
        ]);
    }
}
