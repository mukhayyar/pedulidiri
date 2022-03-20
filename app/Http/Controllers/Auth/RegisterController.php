<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function registerForm()
    {
        return view('auth/register');
    }

    public function registerAttempt(Request $request)
    {
        $rules = [
            'nik'                  => 'required|numeric|unique:users,nik',
            'nama_lengkap'         => 'required|string',
            'no_hp'                => 'required',
            'alamat'               => 'required',
        ];

        $messages = [
            'nik.required'         => 'NIK wajib diisi',
            'nik.numeric'        => 'NIK harus berupa angka',
            'nik.unique'           => 'NIK sudah terdaftar',
            'nama_lengkap.required'        => 'Nama Lengkap wajib diisi',
            'nama_lengkap.string'           => 'Nama Lengkap harus berupa teks',
            'no_hp.required'        => 'No HP wajib diisi',
            'alamat.required'           => 'Alamat wajib diisi',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $user = new User;
        $user->nik = $request->nik;
        $user->nama_lengkap = $request->nama_lengkap;
        $user->no_hp = $request->no_hp;
        $user->alamat = $request->alamat;
        $simpan = $user->save();

        if($simpan){
            Session::flash('success', 'Register berhasil! Silahkan login untuk mengakses data');
            return redirect()->route('login');
        } else {
            Session::flash('error', 'Register gagal! Silahkan ulangi beberapa saat lagi');
            return redirect()->route('register');
        }
    }
}
