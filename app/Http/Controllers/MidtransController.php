<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MidtransController extends Controller
{
    public function callback(Request $request)
    {
        \Midtrans\Config::$serverKey = env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-DUMMYKEY');
        \Midtrans\Config::$isProduction = false;
        $notif = new \Midtrans\Notification();

        $transactionStatus = $notif->transaction_status;
        $orderId = $notif->order_id;
        
        $transactionId = explode('-', $orderId)[1];
        $transaction = \App\Models\Transaction::find($transactionId);

        if (!$transaction) return response()->json(['message' => 'Transaction not found']);

        if ($transactionStatus == 'capture' || $transactionStatus == 'settlement') {
            $transaction->update(['status' => 'paid']);
            
            if ($transaction->type === 'print') {
                // Find latest test result for this user to unlock
                $result = \App\Models\TestResult::where('user_id', $transaction->user_id)->latest()->first();
                if ($result) {
                    $result->update([
                        'is_printed' => true,
                        'printed_at' => now()
                    ]);
                }
            }
        } elseif ($transactionStatus == 'cancel' || $transactionStatus == 'deny' || $transactionStatus == 'expire') {
            $transaction->update(['status' => 'failed']);
        }

        return response()->json(['message' => 'Callback handled']);
    }
}
