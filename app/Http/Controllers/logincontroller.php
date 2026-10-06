<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\database;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function aksilogin(Request $request)
    {
        $username = $request->input('u');
        $password = $request->input('p');

        $jalur = new database;
        $user = $jalur->pull('users', ['username' => $username]);

        if ($user) {
            $isBcrypt = str_starts_with($user->password, '$2y$') || str_starts_with($user->password, '$2b$');
            $passwordCocok = $isBcrypt 
                ? Hash::check($password, $user->password) 
                : ($password === $user->password);

            if ($passwordCocok) {
                session(['u' => $user->username]);
                return redirect('/home');
            }
        }

        return redirect()->back()->with('error', 'Username atau password salah');
    }

    public function home(Request $request)
    {
        if (session()->has('u')) {
            $jalur = new database;

            $awal = $request->input('from');
            $akhir = $request->input('to');

            if ($awal && $akhir) {
                $hello['hai'] = $jalur->tampilBetween('users', 'id', $awal, $akhir);
            } else {
                $hello['hai'] = $jalur->tampil('users');
            }

            return view('home', $hello);
        } else {
            return redirect('/');
        }
    }

    public function logout()
    {
        session()->flush();
        return redirect('/')->with('success', 'Anda telah berhasil logout.');
    }

    public function data()
    {
        return view('girasya');
    }

    public function zano(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|unique:users,username', 
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|confirmed'
        ]);

        DB::table('users')->insert([
            'username' => $data['username'],
            'email'    => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        return redirect('/')->with('success', 'Registrasi berhasil! Silakan login dengan akun baru Anda.');
    }

    public function tampil()
    {
        return view('girasya');
    }

public function edit($id)
    {
        $jalur = new database;
        $data['user'] = $jalur->pull('users', ['id' => $id]);
        return view('edit', $data);
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'username' => 'required|unique:users,username,' . $id,
            'email'    => 'required|email|unique:users,email,' . $id,
            'password' => 'nullable|confirmed'
        ]);

        if (!empty($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        } else {
            unset($data['password']);
        }

        DB::table('users')->where('id', $id)->update($data);

        return redirect('/home')->with('success', 'Data berhasil diperbarui.');
    }

    public function hapus($id)
    {
        DB::table('users')->where('id', $id)->delete();
        return redirect('/home')->with('success', 'Data berhasil dihapus.');
    }
}