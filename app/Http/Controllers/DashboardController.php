<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index() {
        $transactions = TransactionDetail::with(['transaction.user', 'product.galleries'])
            // whereHas: digunakan untuk menambahkan relasi / apakah datanya ada atau tidak
            ->whereHas('product', function($product) {
                $product->where('users_id', Auth::user()->id);
            });

        // reduce: menghitung jumlah penghasilan user
        // $carry: dibawa sebelumnya
        // $item: item dari transactions
        $revenue = $transactions->get()->reduce(function($carry, $item) {
            // menghitung semua data transactions karena kita emiliki haraga perbarang dari transaction details
            return $carry + $item->price;
        });

        $customer = User::count();

        return view('pages.dashboard', [
            'transaction_count' => $transactions->count(),
            'transaction_data'  => $transactions->get(),
            'revenue'           => $revenue,
            'customer'          => $customer
        ]);
    }
}