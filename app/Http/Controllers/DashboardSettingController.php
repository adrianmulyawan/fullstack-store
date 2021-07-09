<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardSettingController extends Controller
{
    public function store() {
        $user = Auth::user();
        $categories = Category::all();
        return view('pages.dashboard-settings-store', compact(['user', 'categories']));
    }

    public function account() {
        $user = Auth::user();
        return view('pages.dashboard-settings-account', compact('user'));
    }

    public function update(Request $request, $redirect) {
        // 1. ambil semua data
        $data = $request->all();
        // 2. Update dari user yang login
        $item = Auth::user();

        // 3. Update semua data dari user login
        $settingUpdate = $item->update($data);

        // Beri reponse jika data berhasil/gagal dibuat
        if ($settingUpdate) {
            session()->flash('success', 'Edit Setting Successfully');
            // kita return datanya dari yang sudah dibuka sebelumnya 
            // Kita menyimpan routingnya berdasarkan "route($redirect)" 
            return redirect()->route($redirect);
        } else {
            session()->flash('failed', 'Edit Setting Failed');
            // kita return datanya dari yang sudah dibuka sebelumnya 
            // Kita menyimpan routingnya berdasarkan "route($redirect)" 
            return redirect()->route($redirect);
        }
    }
}
