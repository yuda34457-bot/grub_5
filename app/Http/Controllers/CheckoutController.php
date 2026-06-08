<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{
    public function checkout(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        if ($product->stock < 1) {
            return redirect()->back()->with('error', 'Produk out of stock.');
        }

        // Create Order
        $order = Order::create([
            'user_id' => auth()->id(),
            'total' => $product->price,
            'status' => 'pending',
            'address' => 'Simulated Address',
        ]);

        // Create OrderItem
        OrderItem::create([
            'order_id' => $order->id,
            'product_id' => $product->id,
            'qty' => 1,
            'price' => $product->price,
        ]);

        // Create Transaction
        $transaction = Transaction::create([
            'user_id' => auth()->id(),
            'type' => 'product',
            'amount' => $product->price,
            'status' => 'pending',
            'payment_token' => Str::random(10),
        ]);

        return redirect()->route('shop.payment', $transaction->id);
    }

    public function paymentPage($transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        
        if ($transaction->status === 'paid') {
            return redirect()->route('shop.success');
        }

        return view('shop.payment', compact('transaction'));
    }

    public function processPayment(Request $request, $transaction_id)
    {
        $transaction = Transaction::findOrFail($transaction_id);
        $transaction->update(['status' => 'paid']);

        // Let's assume the latest pending order belongs to this transaction
        $order = Order::where('user_id', auth()->id())->where('status', 'pending')->latest()->first();
        if ($order) {
            $order->update(['status' => 'paid']);

            // Reduce stock
            foreach ($order->items as $item) {
                $product = $item->product;
                if ($product) {
                    $product->decrement('stock', $item->qty);
                }
            }
        }

        return redirect()->route('shop.success')->with('success', 'Pembayaran berhasil disimulasikan!');
    }

    public function successPage()
    {
        return view('shop.success');
    }
}
