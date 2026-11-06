<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $admin = Admin::where('email', $request->email)->first();

        if (!$admin || !Hash::check($request->password, $admin->password)) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $token = Str::random(60);

        $admin->api_token = $token;
        $admin->save();

        return response()->json([
            'message' => 'Login successful',
            'token' => $token,
            'admin' => [
                'id' => $admin->_id,
                'name' => $admin->name,
                'email' => $admin->email,
            ]
        ]);
    }

    public function logout(Request $request)
    {
        $token = $request->bearerToken();

        $admin = Admin::where('api_token', $token)->first();

        if ($admin) {
            $admin->api_token = null;
            $admin->save();
        }

        return response()->json([
            'message' => 'Logout successful'
        ]);
    }
}