<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\PaymentModels;
use Illuminate\Support\Facades\Log; // Import Log facade

class PaymentController extends Controller
{
    public function showPaymentPage($price)
    {
         // Generate random price
        return view('auth.payment', compact('price'));
    }

    public function processPayment(Request $request)
    {
        $price = $request->input('price');
        $amountPaid = $request->input('amount_paid');
        $user = Auth::user();

        if ($amountPaid < $price) {
            $underpaid = $price - $amountPaid;
            return back()->with('error', "You are still underpaid: Rp " . number_format($underpaid, 0, ',', '.'));
        } elseif ($amountPaid > $price) {
            $overpaid = $amountPaid - $price;
            return view('auth.confirm_overpayment', compact('overpaid'));
        }
    
        // Simpan data pembayaran
        PaymentModels::create([
            'user_id' => $user->id,
            'amount' => $price,
        ]);
    
        return redirect()->route('home.index')->with('success', 'Payment successful!');
    }

    public function retryPayment()
    {
        // Logic for retrying payment can be added here
        return redirect()->route('payment.show', ['price' => session('price')]); // Redirect back to payment page
    }

    public function addBalance(Request $request)
    {
        $user = Auth::user();

        // Check if user is authenticated
        if (!$user) {
            Log::error('User not authenticated.');
            return redirect()->route('home.index')->with('error', 'User not authenticated.');
        }

        // Log user instance type
        if (is_null($user)) {
            Log::error('User is null, authentication failed.');
        }
        Log::info('User instance type: ' . get_class($user));
        
        // Log user instance
        Log::info('User instance: ', (array) $user);
        
        // Log user properties
        Log::info('User properties: ', [
            'id' => $user->id,
            'balance' => $user->balance,
            'email' => $user->email,
        ]);

        $amount = $request->input('amount');

        Log::info('User instance type: ' . get_class($user));        
        Log::info('User object before update: ', (array) $user);
        
        // Update user's balance
        $user->balance += $amount;
        $user->save();

        return redirect()->route('home.index')->with('success', 'Balance updated successfully!');
    }
}
