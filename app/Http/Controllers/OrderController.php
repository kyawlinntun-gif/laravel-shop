<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function show()
    {
        $order = Auth::guard('api')->user()->orders()->first();

        $products = $order->orderItems()
                    ->join('products', 'order_items.product_id', '=', 'products.id')
                        ->select('products.name', 'order_items.quantity')
                        ->get();

        return response()->json(['order' => $order, 'products' => $products]);
    }

    public function store()
    {
        if(!(Auth::guard('api')->user()->id))
        {
            return response()->json(['fail' => "Login first"]);
        }

        $user = Auth::guard('api')->user();

        $total_amount = $user->shoppingCarts()
                        ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                        ->selectRaw('SUM(shopping_carts.quantity * products.price) as total_amount')
                        ->first();

        $order = $user->orders()->create([
            'total_amount' => $total_amount['total_amount']
        ]);

        $products = $user->shoppingCarts()
                    ->join('products', 'shopping_carts.product_id', '=', 'products.id')
                    ->select('products.id')
                    ->selectRaw('SUM(shopping_carts.quantity) as quantity')
                    ->selectRaw('SUM(shopping_carts.quantity * products.price) as price')
                    ->groupBy('products.id')
                    ->get();

        foreach($products as $product) {
            $order->orderItems()->create([
                'product_id' => $product->id,
                'quantity' => $product->quantity,
                'price' => $product->price
            ]);
        }

        $user->shoppingCarts()->delete();

        return response()->json(['success' => "Products was order successfully!"]);
    }
}
