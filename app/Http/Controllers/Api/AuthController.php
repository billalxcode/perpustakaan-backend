<?php

namespace App\Http\Controllers\Api;

use App\Filament\Resources\UserResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\UserCollection;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            "email" => "required|email",
            "password" => "required|string",
        ]);

        $logged = Auth::attempt($request->only("email", "password"));
        if ($logged) {
            return response()->json([
                "data" => [
                    'access_token' => Auth::user()->createToken("authToken", expiresAt: now()->addDays(7))->plainTextToken
                ],
                "message" => "Login successful",
            ]);
        } else {
            return response()->json([
                'message' => 'Invalid credentials',
            ], 401);
        }
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string',
            'username' => 'required|string|unique:users',
        ]);

        $user = User::create($request->post());
        $user->assignRole('member');

        return new UserCollection($user);
    }
}
