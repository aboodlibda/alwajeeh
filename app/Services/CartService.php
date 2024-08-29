<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Support\Facades\Session;

class CartService
{
    /**
     * Add product to cart.
     *
     * @param int $productId
     * @param int $quantity
     * @return void
     */
    public function addToCart($productId, $quantity = 1)
    {
        // Retrieve the cart from session or initialize an empty array
        $cart = Session::get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            // Increase the quantity
            $cart[$productId]['quantity'] += $quantity;
        } else {
            // Fetch the product from the database
            $product = Product::findOrFail($productId);

            // Add new product to the cart
            $cart[$productId] = [
                'product_id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'image' => $product->image,
                'quantity' => $quantity,
            ];
        }

        // Store the cart back into the session
        Session::put('cart', $cart);
    }

    /**
     * Remove product from cart.
     *
     * @param int $productId
     * @return void
     */
    public function removeFromCart($productId)
    {
        // Retrieve the cart from session
        $cart = Session::get('cart', []);

        // Check if the product exists in the cart
        if (isset($cart[$productId])) {
            // Remove the product from the cart
            unset($cart[$productId]);

            // Store the updated cart back into the session
            Session::put('cart', $cart);
        }
    }

    /**
     * Update product quantity in cart.
     *
     * @param int $productId
     * @param int $quantity
     * @return void
     */
    public function updateCart($productId, $quantity)
    {
        // Retrieve the cart from session
        $cart = Session::get('cart', []);

        // Check if the product exists in the cart
        if (isset($cart[$productId])) {
            // Update the quantity
            $cart[$productId]['quantity'] = $quantity;

            // Store the updated cart back into the session
            Session::put('cart', $cart);
        }
    }

    /**
     * Get all items from the cart.
     *
     * @return array
     */
    public function getCart()
    {
        // Retrieve the cart from session
        return Session::get('cart', []);
    }

    /**
     * Clear the cart.
     *
     * @return void
     */
    public function clearCart()
    {
        // Remove the cart from the session
        Session::forget('cart');
    }

    /**
     * Get the total amount of the cart.
     *
     * @return float
     */
    public function getCartTotal()
    {
        $cart = $this->getCart();
        $total = 0;

        // Calculate the total amount
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        return $total;
    }

    public function getCount()
    {
        $cart = $this->getCart();
        $count = 0;

        foreach ($cart as $item) {
            $count += $item['quantity'];
        }

        return $count;
    }

}
