<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\CartRequest;
use App\Services\CartService;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct(
        protected CartService $cartService,
    ) {}

    public function index()
    {
        if (count(session()->get('cart', [])) > 0) {
            $this->cartService->create(session()->get('cart', []));
        }
        $cartData = $this->cartService->get();
        return view('user.cart.list', compact('cartData'));
    }

    public function store(CartRequest $request)
    {
        $this->cartService->create($request->validated());
        return redirect()->back()->with('success', 'Product added to cart');
    }

    public function destroy(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
        ]);

        $this->cartService->delete($request->product_id);
        return redirect()->back()->with('success', 'Product removed from cart');
    }
}
