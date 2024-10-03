<?php

namespace App\Http\Controllers\AdminController;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        // $products = Auth::guard('api')->user()->admin->products()->with('category')->get();

        $products = Product::with(['category', 'admin'])->get();

        return response()->json(['products' => $products]);
    }

    public function show($id)
    {
        // $product = Auth::guard('api')->user()->admin->products()->where('id', $id)->with('category')->get();

        $product = Product::where('id', $id)->with(['category', 'admin'])->get();

        return response()->json(['product' => $product]);
    }

    public function create(CreateRequest $request) {
        Auth::guard('api')->user()->admin->products()->create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $request->category_id
        ]);

        return response()->json(['success' => 'Prodcut was created successfully!']);
    }

    public function update(UpdateRequest $request, $id) {
        if(Auth::guard('api')->user()->admin->products()->where('id', $id)->count()) {
            Auth::guard('api')->user()->admin->products()->where('id', $id)->update($request->validated());

            return response()->json(['success' => 'Product was updated successfully!']);
        } else {
            return response()->json(['fail' => 'This product was not created by you!']);
        }
    }

    
    public function destroy($id)
    {
        if(Product::find($id)) {
            if(Auth::guard('api')->user()->admin->products()->where('id', $id)->count()) {
                Auth::guard('api')->user()->admin->products()->where('id', $id)->delete();
    
                return response()->json(['success' => 'Product was deleted successfully!']);
            } else {
                return response()->json(['fail' => 'This product was not created by you!']);
            }
        } else {
            return response()->json(['fail' => 'Found not product']);
        }
    }
}
