<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AdminUserRequest;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class AdminUserController extends Controller
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
            // kita panggil Model User kemudian kita query
            $query = User::query();

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
                                    <a class="dropdown-item" href="' . route('user.edit', $item->id) . '">
                                        Edit
                                    </a>
                                    <form action="'. route('user.destroy', $item->id) .'" method="POST">
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
        return view('pages.admin.user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserRequest $request)
    {
        $data = $request->all();

        $data['password'] = bcrypt($request->input('password'));

        // Create Data User
        $user = User::create($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($user) {
            session()->flash('success', 'User Berhasil Ditambahkan');
            return redirect()->route('user.index');
        } else {
            session()->flash('failed', 'User Berhasil Ditambahkan');
            return redirect()->route('user.index');
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
        $item = User::findOrFail($id);
        return view('pages.admin.user.edit', compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserRequest $request, $id)
    {
        $data = $request->all();

        // Conditional jika kita update password
        if ($request->input('password')) {
            $data['password'] = bcrypt($request->input('password'));
        } else {
            unset($data['password']);
        }

        // Create Data User
        $item = User::findOrFail($id)->update($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($item) {
            session()->flash('success', 'User Berhasil Diupdate');
            return redirect()->route('user.index');
        } else {
            session()->flash('failed', 'User Gagal Diupdate');
            return redirect()->route('user.index');
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
        $item = User::findOrFail($id);
        $item->delete();

        if ($item) {
            session()->flash('success', 'User Berhasil Dihapus');
            return redirect()->route('user.index');
        } else {
            session()->flash('failed', 'User Gagal Dihapus');
            return redirect()->route('user.index');
        }
    }
}
