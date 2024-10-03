<?php

namespace App\Http\Controllers\AdminController;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $users = User::where('is_admin', false)->select('id', 'name', 'email', 'address', 'phone_number')->get();
        return response()->json(['customers' => $users]);
    }

    public function destroy(Request $request)
    {
        $user = User::findOrFail($request->id);
        $user->delete();

        return response()->json(['success' => "Customer was deleted successfully!"]);
    }
}
