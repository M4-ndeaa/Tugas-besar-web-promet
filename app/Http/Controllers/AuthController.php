<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) {
            return back();
        }

        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        if (Auth::check()) {
            return back();
        }

        // memastikan aagar emai dan password di isi
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // akun menunggu persetujuan admin dulu
            $userstatus = Auth::user()->status;
            if (Auth::user()->status == 'submitted') {
                return back()->withErrors(['email' => 'Akun anda masih menunggu']);
            } elseif (Auth::user()->status == 'rejected') {
                return back()->withErrors(['email' => 'Akun anda telah di tolak admin']);
            }

            return redirect('/welcome');
        }

        return back()->withErrors([
            'email' => 'Terjadi Kesalaahan, periksa kembali email atau password anda.',
        ])->onlyInput('email');
    }

    public function registerView()
    {
        if (Auth::check()) {
            return back();
        }

        return view('auth.register');
    }

    public function register(Request $request)
    {
        if (Auth::check()) {
            return back();
        }

        $valideated = $request->validate([
            'name' => ['required'],
            'email' => ['required'],
            'password' => ['required'],
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->role_id = 2;
        $user->saveOrFail();

        return redirect('/')->with('success', 'Berhasil mendaftarkan akun, menunggu persetujuan Admin');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('auth.profile', compact('user'));
    }

    public function updateProfile(Request $request)
    {
        $user = User::find(Auth::user()->id);

        $request->validate([
            'name' => ['required'],
            'email' => ['required', 'email', 'unique:users,email,'.$user->id],
            'password' => ['nullable', 'min:6', 'confirmed'],
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return back()->with('success', 'Profil berhasil diperbarui');
    }

    public function welcome(Request $request)
    {
        $search = $request->input('search');

        // untuk mencari nama produk ataupun katagori
        if ($search) {
            $produk = Produk::where('namaProduk', 'LIKE', "%{$search}%")
                        ->orWhere('kategori', 'LIKE', "%{$search}%")
                        ->get();
        } else {
            $produk = Produk::all();
        }

        return view('welcome', compact('produk'));
    }
}
