<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\Product\CreateRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Category;

class HomeController extends Controller
{
    public function index() {
        $products = Product::orderBy('updated_at', 'desc')->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return response()->json(['products' => $products, 'categories' => $categories]);
    }

    public function show($id) {
        $product = Product::findOrFail($id);

        return response()->json(['product' => $product]);
    }


    public function productsWithCategory($id) {
        $products = Category::findOrFail($id)->products()->get();
        $categories = Category::orderBy('name', 'asc')->get();

        return response()->json(['products' => $products, 'categories' => $categories]);
    }
}
