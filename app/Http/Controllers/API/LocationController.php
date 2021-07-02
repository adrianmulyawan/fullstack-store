<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Regency;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    // Buat 2 fungsi
    // 1. Mengambil data Provinsi (Langsung ambil semua datanya)
    // 2. Kota (Ambil Data Jika provinces_id terisi)

    public function provinces(Request $request) 
    {
        return Province::all();
    }

    public function regencies(Request $request, $provinces_id) 
    {
        return Regency::where('province_id', $provinces_id)->get();
    }
}
