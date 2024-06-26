<?php

namespace App\Http\Viewcomposer;

use Illuminate\View\View;

class CartComposer
{
    public function compose(View $view)
    {
        $products = session()->get('panier', []);
        $panierCount = count($products);
        $view->with('panierCount', $panierCount);
    }
}
