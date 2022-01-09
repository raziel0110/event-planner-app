<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Hash

class AuthController extends Controller
{
    // // register 
    public function register(Request $request)
    {
        $attr = $this->validate($request, [
            'name'     => 'required|string',
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name'     => $attr['name'],
            'email'    => $attr['email'],
            'password' => Hash::make($attr['password']) 
        ]);

        $token = $user->createToken('tokens')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token
        ], 200);
    }

    // login
    public function login(Request $request) 
    {
        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password')])) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $user = User::where('email', $request->input('email'))->firstOrFail();

        $token = $user->createToken('tokens')->plainTextToken;

        return response()->json([
            'user' => $user,
            'token' => $token
        ], 200);
    }

    // logout
    public function logout()
    {
        auth()->user()->tokens()->delete();

        return response()->json(['message' => 'Logging out...'], 200);
    }
}
