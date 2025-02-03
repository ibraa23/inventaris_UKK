<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }



    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);


        // Ambil kredensial dari request
        $user = User::where('email', $request->email)->first();


        // Periksa apakah user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Login manual jika password cocok
            Auth::login($user, $request->filled('remember'));

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            // Debugging (opsional)
            // \Log::info('User logged in: ', ['email' => $user->email, 'role' => $user->role]);

            // Redirect berdasarkan role
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard')->with('success', 'Welcome, Admin!');
            } elseif ($user->role === 'user') {
                return redirect()->route('user.dashboard')->with('success', 'Welcome, user!');
            }


            // Jika gagal login
            // Jika login gagal
            return back()->withErrors([
                'email' => 'Email or password is incorrect.',
            ])->onlyInput('email');
        }
    }



    public function showRegisterForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'in:admin,user', // Role hanya bisa admin atau user (opsional)
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => $request->role ?? 'user', // Default ke "user" jika tidak dipilih
        ]);

        return redirect()->route('login')->with('success', 'Akun berhasil dibuat. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}

