<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Payment;
use App\Models\DetailUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            $user = User::where('id', Auth::id())->first();
            $detail = DetailUser::where('user_id', Auth::id())->first();
            $payment = Payment::all();
            return response()->json([
                'user' => $user,
                'detail' => $detail,
                'payment' => $payment
            ], 200);
        } catch(\Exception $e) {
            return response()->json([
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, DetailUser $detail)
    {
        $validateDetail = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => '',
            'address' => 'required|string|max:255',
            'gender' => 'required',
            'domisili' => 'required',
            'birthday' => 'required',
            'payment_id' => 'required',
            'phone' => 'required|string|min:11|max:13',
            'rekening' => 'required|string|max:15',
            'nik' => 'required|string|max:16',
            'password' => 'required|min:8|same:password_confirmation',
            'password_confirmation' => 'required|min:8|same:password',
        ]);
        // $id = optional(Auth::user())->id;
        $id = $request->user_id;
        $dataDetail = [
            'fullname' => $validateDetail['firstname'] . ' ' . $validateDetail['lastname'],
            'address' => $validateDetail['address'],
            'phone' => $validateDetail['phone'],
            'gender' => $validateDetail['gender'],
            'domisili' => $validateDetail['domisili'],
            'birthday' => $validateDetail['birthday'],
            'rekening' => $validateDetail['rekening'],
            'payment_id' => $validateDetail['payment_id'],
            'nik' => $validateDetail['nik'],
        ];
        // return response()->json([
        //     'data' => $dataDetail,
        //     'id' => $id
        // ], 200);
        DB::beginTransaction();
        try{
            // $user = User::where('id', Auth::id())->first();
            DetailUser::updateOrCreate(['user_id' => $id], $dataDetail);
            $dataUser = ['password' => Hash::make($validateDetail['password'])];
            User::updateOrCreate(['id' => $id],$dataUser);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil menyimpan data'
            ], 200);
        }catch(\Exception $e){
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal menyimpan data',
                'error' => $e->getMessage()
            ], 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validateDetail = $request->validate([
            'firstname' => 'required|string|max:255',
            'lastname' => '',
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
        $dataDetail = [
            'fullname' => $validateDetail['firstname'] . ' ' . $validateDetail['lastname'],
            'address' => $validateDetail['address'],
            'phone' => $validateDetail['phone'],
            'gender' => $validateDetail['gender'],
            'domisili' => $validateDetail['domisili'],
            'birthday' => $validateDetail['birthday'],
            'rekening' => $validateDetail['rekening'],
            'payment_id' => $validateDetail['payment_id']
        ];
        DB::begintransaction();
        try{
            DetailUser::where('user_id', $id)->update($dataDetail);
            $dataUser = ['password' => Hash::make($request->password)];
            User::updateOrCreate(['id' => $id],$dataUser);
            DB::commit();
            return response()->json([
                'status' => 'success',
                'message' => 'Berhasil mengupdate data'
            ], 200);
        } catch(\Exception $e) {
            DB::rollback();
            return response()->json([
                'status' => 'error',
                'message' => 'Gagal mengupdate data'
            ], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
