<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Firebase\JWT\JWT;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->password)) {
            return response()->json(['message' => 'Invalid credentials'], 401);
        }

        $token = $this->generateToken($user);

        return response()->json(['token' => $token]);
    }

    public function logout(Request $request)
    {
    

        return response()->json(['message' => 'Logout successful']);
    }

    private function generateToken(User $user)
    {
        $payload = [
            'iss' => env('JWT_ISSUER'),
            'sub' => $user->id,
            'iat' => time(),
            'exp' => time() + (60 * 60) 
        ];

        $token = JWT::encode($payload, env('JWT_SECRET'), 'HS256');

        return $token;
    }
    public function index()
    {
        $users = User::all();
        
        return response()->json($users);
    }
    

}
