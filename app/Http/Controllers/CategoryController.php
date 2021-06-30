<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index() {
        // Menampilkan seluruh data category
        $categories = Category::all();
        // Menampilkan seluruh data product dengan paginate (yang ditampilkan 32 products/halaman)
        $products = Product::with('galleries')->simplePaginate(16);

        return view('pages.category',compact('categories', 'products'));
    }

    // menampilkan dari detail category yang dipilih
    // mis: click "gadget" maka yang muncul untuk datanya / productnya hanya product yang memiliki category tsb (gadget)
    public function detail(Request $request, $slug) {
        $categories = Category::all();
        $category = Category::where('slug', $slug)->firstOrFail();
        $products = Product::with('galleries')->where('categories_id', $category->id)->paginate(16);

        return view('pages.category', compact('categories', 'products'));
    }
}
