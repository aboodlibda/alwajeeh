<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CartService;

class CartController extends Controller
{
    protected $cartService;

    public function __construct(CartService $cartService)
    {
        $this->cartService = $cartService;
    }

    public function index()
    {
        $cartItems = $this->cartService->getCart();
        $cartTotal = $this->cartService->getCartTotal();

        return view('cart', compact('cartItems', 'cartTotal'));
    }

    public function add(Request $request, $productId)
    {
        $quantity = $request->input('quantity', 1);
        $this->cartService->addToCart($productId, $quantity);

        return redirect()->route('cart.index')->with('success', 'Product added to cart!');
    }

    public function update(Request $request, $productId)
    {
        $quantity = $request->input('quantity');
        $this->cartService->updateCart($productId, $quantity);

        return redirect()->route('cart.index')->with('success', 'Cart updated!');
    }

    public function remove($productId)
    {
        $this->cartService->removeFromCart($productId);

        return redirect()->route('cart.index')->with('success', 'Product removed from cart!');
    }

    public function clear()
    {
        $this->cartService->clearCart();

        return redirect()->route('cart.index')->with('success', 'Cart cleared!');
    }
}
