<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\AdminProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardProductController extends Controller
{
    public function index() {
        $products = Product::with(['galleries', 'category'])
        ->where('users_id', Auth::user()->id)
        ->get();
        return view('pages.dashboard-products', compact('products'));
    }

    public function create() {
        $categories = Category::all();
        return view('pages.dashboard-products-create', compact('categories'));
    }

    public function store(AdminProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        // Create Data Product
        $product = Product::create($data);

        // Create Product Gallery (menampung image product)
        $gallery = [
            'products_id' => $product->id,
            'photos'      => $request->file('photo')->store('assets/product', 'public')
        ];

        // Panggil Product Gallery untuk di store gambarnya kesana
        ProductGallery::create($gallery);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($product) {
            session()->flash('success', 'Store Berhasil Diupdate');
            return redirect()->route('dashboard-products');
        } else {
            session()->flash('failed', 'Store Gagal Diupdate');
            return redirect()->route('dashboard-products');
        }
    }

    public function details(Request $request, $id) {
        $product = Product::with(['galleries', 'user', 'category'])->findOrFail($id);
        $categories = Category::all();
        return view('pages.dashboard-products-details', compact(['product', 'categories']));
    }

    public function update(Request $request, $id) {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        // Create Data Product
        $item = Product::findOrFail($id)->update($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($item) {
            session()->flash('success', 'Product Berhasil Diupdate');
            return redirect()->route('dashboard-products');
        } else {
            session()->flash('failed', 'Product Gagal Diupdate');
            return redirect()->route('dashboard-products');
        }
    }

    public function uploadGallery(Request $request) {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        // Create Data ProductGallery
        ProductGallery::create($data);

        return redirect()->route('dashboard-products-details', $request->products_id);
    }

    public function deleteGallery(Request $request, $id) {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        return redirect()->route('dashboard-products-details', $item->products_id);
    }
}
