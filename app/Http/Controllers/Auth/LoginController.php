<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function loginForm()
    {
        if (Auth::check()) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            return redirect()->route('home');
        }
        return view('auth/login');
    }

    public function loginAttempt(Request $request)
    {
        $rules = [
            'nik'                 => 'required|numeric',
            'nama_lengkap'              => 'required|string'
        ];

        $messages = [
            'nik.required'        => 'NIK wajib diisi',
            'nik.numeric'           => 'NIK harus berupa angka',
            'nama_lengkap.required'     => 'Nama Lengkap wajib diisi',
            'nama_lengkap.string'       => 'Nama Lengkap harus berupa teks'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $data = User::where('nik', $request->nik)->where('nama_lengkap', $request->nama_lengkap)->first();

        if ($data) { // true sekalian session field di users nanti bisa dipanggil via Auth
            //Login Success
            Auth::login($data);
            return redirect()->route('home');

        } else { // false

            //Login Fail
            Session::flash('error', 'NIK atau Nama Lengkap salah');
            return redirect()->route('login');
        }
    }

    public function logout()
    {
        Auth::logout(); // menghapus session yang aktif
        return redirect()->route('login');
    }
}
