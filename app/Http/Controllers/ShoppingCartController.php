<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\ShoppingCart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShoppingCartController extends Controller
{
    public function index() {
        if(!(Auth::guard('api')->user()->id)) {
            return response()->json(['fail' => 'Login first!']);
        }
        $total_quantity = Auth::guard()->user()->shoppingCarts()->sum('quantity');

        return response()->json(['total_quantity' => $total_quantity]);
    }

    public function show() {
        if(!(Auth::guard('api')->user()->id)) {
            return response()->json(['fail' => 'Login first']);
        }

        $products = Auth::guard('api')->user()->shoppingCarts()
                    ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                    ->select('products.id', 'products.name', 'products.price')
                    ->selectRaw('SUM(shopping_carts.quantity) as total_quantity')
                    ->selectRaw('SUM(shopping_carts.quantity * products.price) as total_price')
                    ->groupBy('products.id', 'products.name', 'products.price')
                    ->get();

        $productsTotal = Auth::guard('api')->user()->shoppingCarts()
                        ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                        ->selectRaw('SUM(shopping_carts.quantity) as total_products_quantity')
                        ->selectRaw('SUM(shopping_carts.quantity * products.price) as total_products_price')
                        ->get();

        $order = Auth::guard('api')->user()->orders()->get();

        return response()->json(['products' => $products, 'total' => $productsTotal, 'order' => $order]);
    }

    public function create($id)
    {
        if(!(Auth::guard('api')->user()->is_admin)) {
            
            $product = Product::findOrFail($id);
            $quantity = 1;
            $user = Auth::guard('api')->user();

            if(!$product) {
                return response()->json(['fail' => 'Not found proudct']);
            }
    
            if(!$user) {
                return response()->json(['fail' => 'Login first!']);
            }
    
            $cartItem = $user->shoppingCarts()->where('product_id', $product->id)->first();
    
            if($cartItem) {
                $cartItem->quantity += $quantity;
                $cartItem->save();
            } else {
                $user->shoppingCarts()->create([
                    'product_id' => $id,
                    'quantity' => $quantity
                ]);
            }
    
            return response()->json(['success' => 'Product added to cart!']);
        }
    }
}
