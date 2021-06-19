<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class AdminCategoryController extends Controller
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
            // kita panggil Model Category kemudian kita query
            $query = Category::query();

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
                                    <a class="dropdown-item" href="' . route('category.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="'. route('category.destroy', $item->id) .'" method="POST">
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
                // field untuk photo
                ->editColumn('photo', function($item) {
                    return $item->photo ? '<img src="'. Storage::url($item->photo) .'" style="max-height: 40px;" />' : '';
                })
                ->rawColumns(['action','photo'])
                ->make();
        }

        // return ke halaman berikut
        return view('pages.admin.category.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminCategoryRequest $request)
    {
        $data = $request->all();

        // generate slug dari name (nama category yang diinputkan)
        $data['slug'] = Str::slug($request->input('name'));

        // simpan file image kedalam db
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        // Create Data Category
        $category = Category::create($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($category) {
            session()->flash('success', 'Category Berhasil Ditambahkan');
            return redirect()->route('category.index');
        } else {
            session()->flash('failed', 'Category Berhasil Ditambahkan');
            return redirect()->route('category.index');
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
        $item = Category::findOrFail($id);
        return view('pages.admin.category.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminCategoryRequest $request, $id)
    {
        $data = $request->all();

        // generate slug dari name (nama category yang diinputkan)
        $data['slug'] = Str::slug($request->input('name'));

        // simpan file image kedalam db
        $data['photo'] = $request->file('photo')->store('assets/category', 'public');

        // Create Data Category
        $item = Category::findOrFail($id)->update($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($item) {
            session()->flash('success', 'Category Berhasil Diupdate');
            return redirect()->route('category.index');
        } else {
            session()->flash('failed', 'Category Gagal Diupdate');
            return redirect()->route('category.index');
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
        $item = Category::findOrFail($id);
        $item->delete();

        if ($item) {
            session()->flash('success', 'Category Berhasil Dihapus');
            return redirect()->route('category.index');
        } else {
            session()->flash('failed', 'Category Gagal Dihapus');
            return redirect()->route('category.index');
        }
    }
}
