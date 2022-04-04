<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(Request $request)
    {

        $products = Product::query();

        $products->when($request->search, function ($query, $vl) {
            $query->where('name', 'like', '%' . $vl . '%');
        });

        $products = $products->get();

        return view('index', [
            'products' => $products
        ]);
    }
}
