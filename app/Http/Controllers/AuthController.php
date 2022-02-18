<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

// use Illuminate\Support\Facades\Hash

class AuthController extends Controller
{
    // register 
    public function register(Request $request)
    {
        $this->validate($request, [
            'name'     => 'required|string',
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $user = User::create([
            'name'     => $request->input('name'),
            'email'    => $request->input('email'),
            'password' => Hash::make($request->input('password')) 
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

        if (!$user->approved_at) {
            return response()->json(['message' => 'Your account must be approved!'], 403);
        }

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
