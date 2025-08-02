<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class CartController extends Controller
{
    public function add(Request $request)
    {
        $id = $request->input('product_id');
        $product = $products[$id]; // This will now work
        // ...
    }
}
