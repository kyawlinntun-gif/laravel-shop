<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\RegisterRequest;

class RegisterController extends Controller
{
    public function register(RegisterRequest $request)
    {
        
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'api_token' => Str::random(60),
            'address' => $request->address,
            'phone_number' => $request->phone_number
        ]);

        if($request->is_admin) {
            $user->is_admin = $request->is_admin;
            $user->save();
        }

        if($request->role) {
            $user->admin()->create([
                'role' => $request->role
            ]);
        }

        if($user->is_admin) {
            return response()->json(['api_token' => $user->api_token, 'success' => 'Register was successfully!', 'role' => $user->admin->role]);
        }

        return response()->json(['api_token' => $user->api_token, 'success' => 'Register was successfully!']);
    }
}
