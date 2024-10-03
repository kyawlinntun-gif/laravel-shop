<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {
    
        // Attempt to find user
        $user = User::where('email', $request->email)->first();

        // Check if the user exists and the password is correct
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['fail' => 'Invalid credentials']);
        }

        // Generate a new api_token
        $user->api_token = Str::random(60); 
        $user->save();

        // Return the user's api_token
        if($user->is_admin) {
            return response()->json(['api_token' => $user->api_token, 'success' => 'Login was successfully!', 'role' => $user->admin->role]);
        }
        return response()->json(['api_token' => $user->api_token, 'success' => 'Login was successfully!'], 200);
    }

    public function logout(Request $request)
    {
        $user = Auth::guard('api')->user();
    
        if($user) {
            $user->api_token = null;
            $user->save();
            return response()->json(['status' => 'success', 'message' => 'Logged out successfully']);
        } else {
            return response()->json(['status' => 'error', 'message' => 'No user found'], 404);
        }
    }
}
