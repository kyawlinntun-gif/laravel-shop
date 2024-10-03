<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\UpdateRequest;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Auth::guard('api')->user()->admin->categories()->get();

        return response()->json([
            'categories' => $categories
        ]);
    }

    public function show(Request $request)
    {
        $category = Auth::guard('api')->user()->admin->categories()->where('id', $request->id)->get();

        return response()->json([
            'category' => $category
        ]);
    }

    public function create(CreateRequest $request)
    {

        Auth::guard('api')->user()->admin->categories()->create([
            'name' => $request->name
        ]);
        
        return response()->json(['success' => 'Category was created successfully!']);
    }

    public function update(UpdateRequest $request)
    {
        Auth::guard('api')->user()->admin->categories()->where('id', $request->category_id)->update([
            'name' => $request->name
        ]);

        return response()->json(['success' => 'Category was updated successfully!']);
    }

    public function destroy($id)
    {
        Auth::guard('api')->user()->admin->categories()->where('id', $id)->delete();

        return response()->json(['success' => 'Category was deleted successfully!']);
    }
}
