<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/shop', [\App\Http\Controllers\PublicController::class, 'shop']);
Route::get('/shop/success', [\App\Http\Controllers\CheckoutController::class, 'successPage'])->middleware('auth')->name('shop.success');
Route::get('/shop/payment/{transaction_id}', [\App\Http\Controllers\CheckoutController::class, 'paymentPage'])->middleware('auth')->name('shop.payment');
Route::post('/shop/payment/{transaction_id}/process', [\App\Http\Controllers\CheckoutController::class, 'processPayment'])->middleware('auth')->name('shop.payment.process');

Route::get('/shop/{id}', [\App\Http\Controllers\PublicController::class, 'showProduct']);
Route::post('/shop/{id}/checkout', [\App\Http\Controllers\CheckoutController::class, 'checkout'])->middleware('auth')->name('shop.checkout');

Route::get('/articles', [\App\Http\Controllers\PublicController::class, 'articles']);
Route::get('/articles/{id}', [\App\Http\Controllers\PublicController::class, 'showArticle']);

Route::get('/test/{type}', [\App\Http\Controllers\EyeTestController::class, 'show']);
Route::post('/test/{type}/submit', [\App\Http\Controllers\EyeTestController::class, 'submit']);

Route::post('/midtrans/callback', [\App\Http\Controllers\MidtransController::class, 'callback']);

Route::get('/dashboard', function () {
    $results = \App\Models\TestResult::where('user_id', auth()->id())->latest()->get();
    return view('dashboard', compact('results'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/results', [\App\Http\Controllers\ResultController::class, 'index'])->name('results.index');
    Route::get('/results/{id}', [\App\Http\Controllers\ResultController::class, 'show'])->name('results.show');
    Route::post('/results/{id}/pay', [\App\Http\Controllers\ResultController::class, 'pay'])->name('results.pay');
    Route::post('/results/{id}/success', [\App\Http\Controllers\ResultController::class, 'success'])->name('results.success');
    Route::get('/results/{id}/download', [\App\Http\Controllers\ResultController::class, 'download'])->name('results.download');

    Route::get('/consultation', [\App\Http\Controllers\ConsultationController::class, 'index'])->name('consultation.index');
    Route::post('/consultation', [\App\Http\Controllers\ConsultationController::class, 'store'])->name('consultation.store');

    Route::get('/profile', [\App\Http\Controllers\ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
