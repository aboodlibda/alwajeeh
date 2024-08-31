<?php

use Illuminate\Support\Facades\Session;

if (!function_exists('cartItemCount')) {
    /**
     * Get the count of items in the cart.
     *
     * @return int
     */
    function cartItemCount()
    {
        $cart = Session::get('cart', []);
        return count($cart);
    }

    function settings()
    {
        $setting = \App\Models\Setting::query()->first();
        return $setting;
    }
}
