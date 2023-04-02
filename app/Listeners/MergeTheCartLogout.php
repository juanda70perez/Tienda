<?php

namespace App\Listeners;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Auth\Events\Logout;

class MergeTheCartLogout
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Logout $event): void
    {
        //eliminar registro
        Cart::deleteStoredCart(auth()->user()->id);
        //nuevo registro
        Cart::store(auth()->user()->id);
    }
}
