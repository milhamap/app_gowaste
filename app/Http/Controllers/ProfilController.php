<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Payment;
use App\Models\BankSampah;
use App\Models\DetailUser;
use App\Models\ListSampah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfilController extends Controller
{
    public function show () {
        return view ('user.profil', [
            'detail' => DetailUser::where('user_id', Auth::id())->first(),
            'payments' => Payment::all(),
            'lists' => ListSampah::all(),
            'banks' => BankSampah::all()
        ]);
    }
    public function store(Request $request)
    {
        // ddd($request->all());
        $validate = Validator::make($request->all(), [
            'firstname' => 'required|string|max:255',
            'lastname' => 'nullable|string|max:255',
            'address' => 'required|string|max:255',
            'gender' => 'required',
            'domisili' => 'required',
            'birthday' => 'required',
            'payment_id' => 'required',
            'phone' => 'required|string|min:11|max:13',
            'rekening' => 'required|string|max:15',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
        $id = Auth::id();
        if($validate->fails()){
            return redirect()->back()->withErrors($validate);
        } else {
            $data = [
                'fullname' => $request->firstname . ' ' . $request->lastname,
                'address' => $request->address,
                'phone' => $request->phone,
                'birthday' => $request->birthday,
                'domisili' => $request->domisili,
                'payment_id' => $request->payment_id,
                'rekening' => $request->rekening,
                'gender' => $request->gender
            ];
            DetailUser::updateOrCreate(['user_id' => $id], $data);
            $dataUser = ['password' => Hash::make($request->password)];
            User::updateOrCreate(['id' => $id],$dataUser);
            return redirect()->route('profil')->with('success', 'Data berhasil diubah');
        }
    }
}
