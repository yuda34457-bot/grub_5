<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = \App\Models\TestResult::where('user_id', auth()->id())->latest()->get();
        return view('results.index', compact('results'));
    }

    public function show($id)
    {
        $result = \App\Models\TestResult::where('user_id', auth()->id())->findOrFail($id);
        return view('results.show', compact('result'));
    }

    public function pay($id)
    {
        $result = \App\Models\TestResult::where('user_id', auth()->id())->findOrFail($id);

        if ($result->is_printed) {
            return redirect()->back()->with('message', 'Sudah dibayar.');
        }

        $serverKey = env('MIDTRANS_SERVER_KEY', 'SB-Mid-server-DUMMYKEY');

        // Jika belum mengatur Midtrans, gunakan simulasi pembayaran langsung
        if ($serverKey === 'SB-Mid-server-DUMMYKEY' || empty($serverKey)) {
            return view('results.pay_simulation', compact('result'));
        }

        // Configure Midtrans
        \Midtrans\Config::$serverKey = $serverKey;
        \Midtrans\Config::$isProduction = false;
        \Midtrans\Config::$isSanitized = true;
        \Midtrans\Config::$is3ds = true;

        $transaction = \App\Models\Transaction::create([
            'user_id' => auth()->id(),
            'type' => 'print',
            'amount' => 20000, // Rp 20.000 for PDF
            'status' => 'pending'
        ]);

        $params = array(
            'transaction_details' => array(
                'order_id' => 'PRINT-' . $transaction->id . '-' . time(),
                'gross_amount' => 20000,
            ),
            'customer_details' => array(
                'first_name' => auth()->user()->name,
                'email' => auth()->user()->email,
            ),
        );

        try {
            $snapToken = \Midtrans\Snap::getSnapToken($params);
            $transaction->update(['snap_token' => $snapToken]);
            return view('results.pay', compact('result', 'transaction', 'snapToken'));
        } catch (\Exception $e) {
            return back()->with('error', 'Gagal memuat Midtrans: ' . $e->getMessage());
        }
    }

    public function success(Request $request, $id)
    {
        // Fallback for local testing when Midtrans Callback cannot reach localhost
        $result = \App\Models\TestResult::where('user_id', auth()->id())->findOrFail($id);
        $result->update([
            'is_printed' => true,
            'printed_at' => now()
        ]);
        
        if ($request->expectsJson()) {
            return response()->json(['success' => true]);
        }

        return redirect()->route('results.show', $result->id)->with('success', 'Simulasi pembayaran berhasil!');
    }

    public function download($id)
    {
        $result = \App\Models\TestResult::with('eyeTest')->where('user_id', auth()->id())->findOrFail($id);
        if (!$result->is_printed) {
            return redirect()->back()->with('error', 'You must pay before downloading.');
        }

        $pdf = \Barryvdh\DomPDF\Facade\Pdf::loadView('results.pdf', compact('result'));
        return $pdf->download('VisionMe_Result_' . $result->id . '.pdf');
    }
}
