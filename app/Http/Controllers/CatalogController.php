<?php


namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CatalogController extends Controller
{
    public function showcatalog()
    {
        return view(view: 'catalog');
    }
}
