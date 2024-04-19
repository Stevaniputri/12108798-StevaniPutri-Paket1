<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Book;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function authPage()
    {
        return view('Auth.auth');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function register(Request $request)
    {
        $request->validate([
            'fullname' => 'required',
            'username' => 'required',
            'email' => 'required',
            'address' => 'required',
            'password' => 'required',
        ]);

        User::create([
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'address' => $request->address,
            'password' => Hash::make($request->password),
            'role' => 'peminjam'
        ]);

        return redirect()->route('authPage')->with('success', 'berhasil membuat akun');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function auth(Request $request)
    {
        $request->validate([
            'username' => 'required|exists:user,username',
            'password' => 'required'
        ]);

        $user = $request->only('username', 'password');
        
        if(Auth::attempt($user)){
            $role = Auth::user()->role;
            if($role === 'admin' || $role === 'petugas'){
                return redirect()->route('dashboard');
            }else {
                return redirect()->route('dashboardUser');
            }
        }else {
            return redirect('/');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, )
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
