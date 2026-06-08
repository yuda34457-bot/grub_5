<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ConsultationController extends Controller
{
    public function index()
    {
        $consultations = \App\Models\Consultation::where('user_id', auth()->id())->latest()->get();
        return view('consultation.index', compact('consultations'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'message' => 'required|string|max:1000'
        ]);

        \App\Models\Consultation::create([
            'user_id' => auth()->id(),
            'message' => $request->message,
            'status' => 'open'
        ]);

        return redirect()->back()->with('success', 'Your message has been sent to our optometrists. We will reply soon.');
    }
}
