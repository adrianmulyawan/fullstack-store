<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Cart;
use App\Models\Transaction;
use App\Models\TransactionDetail;

use Exception;

use Midtrans\Snap;
use Midtrans\Config;

use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function process(Request $request) {
        // 1. Save user data
        // karena kita lihat di db yang disimpan di table users
        // kita tidak simpan di transaction tetapi di transaction ada relasi ke table users
        $user = Auth::user();

        // 2. update data user kita ambil datanya kecuali total price 
        // di halaman cart.blade.php kita akan menambahkan field total_price untuk menyimpan total_price
        $user->update($request->except('total_price'));

        // 3. Proses checkout (kita ambil data dari cart.blade.php)
        // kita butuh field 'code' dari table transactions 
        $code = 'STORE-' . mt_rand(00000, 99999);

        // 4. Tambahkan cart untuk mengambil data product yang telah dipilih oleh user
        $carts = Cart::with(['product', 'user'])
                    ->where('users_id', Auth::user()->id)
                    ->get();
        
        // 5. Buat Transaction
        $transaction = Transaction::create([
            'users_id'           => Auth::user()->id,
            'insurance_price'    => 0,
            'shipping_price'     => 0,
            'total_price'        => $request->input('total_price'),
            'transaction_status' => 'PENDING',
            'code'               => $code
        ]);

        // 6. Menyimpan Transaction Details
        // Di looping berdasarkan data yang ada di carts
        foreach ($carts as $cart) {
            // 6.1 Buat kode transaksi detail
            $trx = 'TRX-' . mt_rand(00000, 99999);

            // 6.2 Kita buat data transaction details
            TransactionDetail::create([
                'transactions_id' => $transaction->id,
                'products_id'     => $cart->product->id,
                'price'           => $cart->product->price,
                'shipping_status' => 'PENDING',
                'resi'            => '',
                'code'            => $trx
            ]);
        }

        // Update: Delete Cart Data
        Cart::with(['product', 'user'])
                ->where('users_id', Auth::user()->id)
                ->delete();

        // =================== Config Bagian Midtrans ===================
        // 7. Konfigurasi Midtrans
        // 7.1 Set your Merchant Server Key
        Config::$serverKey = config('services.midtrans.serverKey');
        // 7.2 Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        Config::$isProduction = config('services.midtrans.isProduction');
        // 7.3 Set sanitization on (default)
        Config::$isSanitized = config('services.midtrans.isSanitized');
        // 7.4 Set 3DS transaction for credit card to true
        Config::$is3ds = config('services.midtrans.is3ds');

        // 8. Buat array untuk dikirim ke midtrans
        $midtrans = [
            'transaction_details' => [
                'order_id' => $code,
                'gross_amount' => (int) $request->total_price,
            ],
            'customer_details' => [
                'first_name' => Auth::user()->name,
                'email' => Auth::user()->email,
            ],
            'enabled_payments' => [
                'gopay', 'permata_va', 'bank_transfer'
            ],
            'vtweb' => []
        ];

        // 9. Buat transaksi Midtrans
        try {
            // Get Snap Payment Page URL
            $paymentUrl = Snap::createTransaction($midtrans)->redirect_url;
            
            // Redirect to Snap Payment Page
            return redirect($paymentUrl);
        }
        catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function callback(Request $request) {

    }
}
