<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index() {
        // Menghitung Jumlah Customer
        $customer = User::count();

        // Menghitung Revenue (Pendapatan (jika field transaction_status = 'SUCCESS'))
        $revenue = Transaction::where('transaction_status', 'SUCCESS')->sum('total_price');

        // Menghitung Jumlah Transaction (Transaksi)
        $transaction = Transaction::count();

        return view('pages.admin.dashboard', compact(
            'customer', 'revenue', 'transaction'
            )
        );
    }


}
