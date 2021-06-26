<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminProductGalleryRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGallery;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AdminProductGalleryController extends Controller
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
            // kita panggil Model ProductGallery kemudian kita query
            $query = ProductGallery::with(['product']);

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
                                    <form action="'. route('product-gallery.destroy', $item->id) .'" method="POST">
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
                ->editColumn('photos', function($item) {
                    return $item->photos ? '<img src="'. Storage::url($item->photos) .'" alt="" style="max-height: 80px;"/>' : '';
                })
                ->rawColumns(['action', 'photos'])
                ->make();
        }

        // return ke halaman berikut
        return view('pages.admin.product-gallery.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = Product::all();
        return view('pages.admin.product-gallery.create', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminProductGalleryRequest $request)
    {
        $data = $request->all();

        $data['photos'] = $request->file('photos')->store('assets/product', 'public');

        // Create Data ProductGallery
        $productgallery = ProductGallery::create($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($productgallery) {
            session()->flash('success', 'ProductGallery Berhasil Ditambahkan');
            return redirect()->route('product-gallery.index');
        } else {
            session()->flash('failed', 'ProductGallery Berhasil Ditambahkan');
            return redirect()->route('product-gallery.index');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminProductGalleryRequest $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ProductGallery::findOrFail($id);
        $item->delete();

        if ($item) {
            session()->flash('success', 'ProductGallery Berhasil Dihapus');
            return redirect()->route('product-gallery.index');
        } else {
            session()->flash('failed', 'ProductGallery Gagal Dihapus');
            return redirect()->route('product-gallery.index');
        }
    }
}
