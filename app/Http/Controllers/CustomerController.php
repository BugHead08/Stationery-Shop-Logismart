<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    public function create()
    {
        return view('customer.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:customers',
            'password' => 'required|string|min:8',
            'alamat' => 'required|string',
            'telp_hp' => 'required|string|max:15',
        ]);

        Customer::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'alamat' => $request->alamat,
            'telp_hp' => $request->telp_hp,
        ]);

        return redirect()->route('customer.create')->with('success', 'Pelanggan Berhasil Didaftarkan');
    }
}
