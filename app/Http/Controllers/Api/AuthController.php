<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Participant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function login (Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }else {
            $user = User::where('email', $request->email)->first();
            if($user){
                $credentials = $request->only('email', 'password');

                if($token = auth()->guard('api')->attempt($credentials)){
                    return response()->json([
                        'user' => auth()->guard('api')->user(),
                        'token'=> $token
                    ],200);
                }else{
                    return response()->json(["message", "Wrong Email Or Password"], 400);
                }
            }else{
                return response()->json(["message", "User Not Found"], 400);
            }
        }
    }

    public function register (Request $request, User $usr) {
        $validate = Validator::make($request->all(), [
            'username' => 'required|string|min:8|alpha_dash|unique:users,username',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8|max:255',
            'phone' => 'required|string|min:11|max:13',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validate->errors()
            ], 400);
        } else {
            DB::beginTransaction();
            try {
                $user = User::create([
                    'username' => $request->username,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'role_id' => $request->role_id,
                ]);
                // $role = $request->role_id->strtolower();
                // ($user['role_id'] == "masyarakat") ? $user['role_id'] = 3 : $user['role_id'] = 2;
                Participant::create([
                    'username' => $user->username,
                    'user_id' => $user->id,
                    'phone' => $request->phone,
                ]);
                ($request->role_id == 2) ? $role = 'Bank Sampah' : $role = 'Masyarakat';
                $data = [
                    'username' => $request->username,
                    'email' => $request->email,
                    'phone' => $request->phone,
                    'role' => $role,
                ];
                DB::commit();
                return response()->json([
                    'status' => 'success',
                    'message' => 'Register success',
                    'data' => $data
                ], 200);
            } catch (\Exception $e) {
                DB::rollback();
                return response()->json([
                    'status' => 'error',
                    'message' => $e->getMessage()
                ], 400);
            }
        }
    }
    public function logout () {
        try{
            $removeToken = JWTAuth::invalidate(JWTAuth::getToken());
            if($removeToken){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Logout success'
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => $e->getMessage()
            ], 400);
        }
    }
}
