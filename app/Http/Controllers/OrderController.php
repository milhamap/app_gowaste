<?php

namespace App\Http\Controllers;
use App\Models\BankSampah;
use App\Models\DetailUser;
use App\Models\ListSampah;
use App\Models\OrderSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function checkout()
    {
        return view('user.checkout', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'lists' => ListSampah::all(),
            'orders' => OrderSampah::get()->sortByDesc(function ($sum) {
                return $sum->sum('quantity');
            }),
            'banks' => BankSampah::all()
        ]);
    }

    public function order (Request $request) {
        $request->validate([
            'quantity' => 'required|numeric|min:1',
        ]);
        $list = ListSampah::where('id', $request->list_sampah_id)->first();
        $user_id = Auth::id();
        $data = [
            'user_id' => $user_id,
            'list_sampah_id' => $request->list_sampah_id,
            'quantity' => $request->quantity,
            'total' => $request->quantity * $list->price
        ];
        $order = OrderSampah::create($data);
        return redirect()->route('booking')->with(['success' => 'Pesanan berhasil ditambahkan', 'order_id' => $order->id]);
    }
    public function total (Request $request) {
        $total = $request->quantity * $request->price;
        return response()->json(['total' => $total]);
    }
}
