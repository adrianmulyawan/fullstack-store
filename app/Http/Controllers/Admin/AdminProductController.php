<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AdminProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // kondisi jika request = ajax
        if (request()->ajax()) {
            // kita panggil Model Product kemudian kita query
            $query = Product::with(['user', 'category']);

            // Setelah itu kita return DataTable beserta $query
            return DataTables::of($query)
                // field dari action (Edit dan Delete)
                ->addColumn('action', function($item){
                    return '
                        <div class="btn-group">
                            <div class="dropdown">
                                <button class="btn btn-primary dropdown-toggle mr-1 mb-1" type="button" data-toggle="dropdown">
                                    Aksi
                                </button>
                                <div class="dropdown-menu">
                                    <a class="dropdown-item" href="' . route('product.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="'. route('product.destroy', $item->id) .'" method="POST">
                                        '. method_field('delete') . csrf_field() .'
                                        <button type="submit" class="dropdown-item text-danger">
                                            Delete
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    ';
                })
                ->rawColumns(['action'])
                ->make();
        }

        // return ke halaman berikut
        return view('pages.admin.product.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.product.create', compact(['users', 'categories']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductRequest $request)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        // Create Data Product
        $product = Product::create($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($product) {
            session()->flash('success', 'Product Berhasil Ditambahkan');
            return redirect()->route('product.index');
        } else {
            session()->flash('failed', 'Product Berhasil Ditambahkan');
            return redirect()->route('product.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Product::findOrFail($id);
        $users = User::all();
        $categories = Category::all();
        return view('pages.admin.product.edit', compact(['item', 'users', 'categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProductRequest $request, $id)
    {
        $data = $request->all();

        $data['slug'] = Str::slug($request->input('name'));

        // Create Data Product
        $item = Product::findOrFail($id)->update($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($item) {
            session()->flash('success', 'Product Berhasil Diupdate');
            return redirect()->route('product.index');
        } else {
            session()->flash('failed', 'Product Gagal Diupdate');
            return redirect()->route('product.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Product::findOrFail($id);
        $item->delete();

        if ($item) {
            session()->flash('success', 'Product Berhasil Dihapus');
            return redirect()->route('product.index');
        } else {
            session()->flash('failed', 'Product Gagal Dihapus');
            return redirect()->route('product.index');
        }
    }
}
