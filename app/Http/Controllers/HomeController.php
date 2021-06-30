<?php

namespace App\Http\Controllers;

use App\Models\Category;
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
        // Menampilkan 6 data (categories)
        $categories = Category::take(6)->get();
        // Menampilkan 8 data (products) yang terakhir ditambahkan
        $products = Product::with('galleries')->latest()->take(8)->get();
        return view('pages.home', compact(['categories', 'products']));
    }
}