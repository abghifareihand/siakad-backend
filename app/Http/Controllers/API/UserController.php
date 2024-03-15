<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class UserController extends Controller
{
    public function regitser()
    {
    }

    public function login(Request $request)
    {
        // validasi inputan
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // jika validasi selesai, maka cek email user ada di db atau tidak
        $user = User::where('email', $request->email)->first();

        // jika user tidak ada

        // pengecekan email
        if (!$user) {
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'Invalid email',
            ], 401);
        }

        // pengecekan password apakah sama inputan dan password db
        if (!Hash::check($request->password, $user->password)) {
            return response()->json([
                'code' => 401,
                'success' => false,
                'message' => 'Invalid password',
            ], 401);
        }

        // kalo berhasil atau success

        // generate token
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Login successfully.',
            'data' => [
                'access_token' => $token,
                'user' => new UserResource($user)
            ]
        ]);
    }

    public function fetch(Request $request)
    {
        // Mendapatkan objek pengguna saat ini
        $user = $request->user();

        // Mengembalikan data pengguna dalam respons JSON
        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'User data fetched successfully.',
            'data' => [
                'user' => $user
            ]
        ]);
    }

    public function update(Request $request)
    {
        $data = $request->all();

        // Validasi berhasil, lanjutkan dengan pembaruan profil pengguna
        $user = $request->user();
        $user->update($data);

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'User data updated successfully.',
            'data' => [
                'user' => $user
            ]
        ]);
    }




    public function logout(Request $request)
    {
        // Revoke semua token akses pengguna saat ini
        $request->user()->tokens()->delete();

        return response()->json([
            'code' => 200,
            'success' => true,
            'message' => 'Logout successfully.',
        ]);
    }
}
