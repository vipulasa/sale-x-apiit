<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $products = (new Product())
            ->newQuery()
            ->where('is_active', 1)
            ->orderBy('sort_order', 'asc')
            ->get();

        return view('home', [
            'products' => $products,
        ]);
    }
}
