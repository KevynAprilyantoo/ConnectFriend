<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function index()
    {
        if (Auth::check()) {
            return redirect('home.index');
        }
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('home.index');
        } else {
            return back()->withErrors([
                'email' => 'The provided credentials do not match our records.',
            ]);
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    }

    public function register()
    {
        $fields = \App\Models\Field::all(); // Retrieve all fields
        return view('auth.register', compact('fields')); // Pass fields to the view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'gender' => 'required|in:Male,Female',
            'fields' => 'required|array|min:3',
            'linkedin' => 'required',
            'mobile_number' => 'required',
            
        ]);

        // dd($request->all());

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), 
            'gender' => $request->gender,
            'linkedin' => $request->linkedin,
            'mobile_number' => $request->mobile_number,
        ]);

        Auth::login($user);
        $user->fields()->attach($request->fields);
        $price = rand(100000, 125000);

        // Redirect to payment page with the price
        return redirect()->route('payment.show', ['price' => $price]);
    }
}