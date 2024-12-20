<?php

namespace App\Services;

use App\Models\Cart;
use App\Models\Order;
use App\Models\Product;

class CartService
{
    public function get()
    {
        $userId = auth()->user()->id;
        return Cart::where('user_id', $userId)->get();
    }

    public function create(array $data)
    {
        $userId = auth()->user()->id;
        $gstPercentage = config('app.gst_percentage') / 100;
        $arrayData = array_values($data);

        if (!isset($arrayData[0]['name'])) {
            $product = Product::find($data['product_id']);
            $cart = Cart::where('user_id', $userId)->where('product_id', $product->id)->first();
        
            if ($cart) {
                $cart->quantity += $data['quantity'];
                $cart->price += $product->price;
                $cart->total_amount = $cart->price * $cart->quantity;
                $cart->gst_amount = $cart->total_amount * $gstPercentage;
                $cart->final_amount = $cart->total_amount + $cart->gst_amount;
                $cart->save();
            } else {
                $totalAmount = $product->price * $data['quantity'];
                $gstAmount = $totalAmount * $gstPercentage;
                $finalAmount = $totalAmount + $gstAmount;

                $cart = Cart::create([
                    'user_id' => $userId,
                    'product_id' => $data['product_id'],
                    'price' => $product->price,
                    'quantity' => $data['quantity'],
                    'total_amount' => $totalAmount,
                    'gst_amount' => $gstAmount,
                    'final_amount' => $finalAmount,    
                ]);
            }
        } else {
            foreach ($data as $value) {
                $totalAmount = $value['price'] * $value['quantity'];
                $gstAmount = $totalAmount * $gstPercentage;
                $finalAmount = $totalAmount + $gstAmount;
                
                Cart::create([
                    'user_id' => $userId,
                    'product_id' => $value['product_id'],
                    'price' => $value['price'],
                    'quantity' => $value['quantity'],
                    'total_amount' => $totalAmount,
                    'gst_amount' => $gstAmount,
                    'final_amount' => $finalAmount,
                ]);
            }
            session()->forget('cart');
        }
        return true;
    }

    public function delete($productId)
    {
        return Cart::where('user_id', auth()->user()->id)->where('product_id', $productId)->delete();
    }
}