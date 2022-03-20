<?php

namespace App\Http\Controllers;

use App\Models\Catatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class CatatanController extends Controller
{
    public function index()
    {
        $catatans = Catatan::where('user_id',auth()->id())->get();
        return view('catatan/index',compact('catatans'));
    }

    public function create()
    {
        return view('catatan/create');
    }

    public function store(Request $request){
        // dd($request);
        $rules = [
            'tanggal'                 => 'required|date',
            'waktu'              => 'required',
            'lokasi'              => 'required|string',
            'suhu'              => 'required|max:2|string'
        ];

        $messages = [
            'tanggal.required'        => 'Tanggal Pergi wajib diisi',
            'tanggal.date'           => 'Tanggal Pergi harus berupa tanggal',
            'waktu.required'     => 'Waktu wajib diisi',
            'waktu.string'       => 'Waktu harus berupa teks',
            'lokasi.required'     => 'Lokasi wajib diisi',
            'lokasi.string'       => 'Lokasi harus berupa teks',
            'suhu.required'     => 'Suhu wajib diisi',
            'suhu.string'       => 'Suhu harus berupa teks',
            'suhu.max'       => 'Suhu hanya 2 digit',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput($request->all);
        }

        $catatan = new Catatan;
        $catatan->user_id = Auth::user()->id;
        $catatan->tanggal_pergi = $request->tanggal;
        $catatan->waktu = $request->waktu;
        $catatan->suhu_tubuh = $request->suhu;
        $catatan->lokasi = $request->lokasi;
        $catatan->save();
        return redirect()->route('home')->with('success','Catatan berhasil diupdate!');
    }

    public function edit(Catatan $catatan)
    {
        return view('catatan/edit',compact('catatan'));
    }

    public function update(Request $request, Catatan $catatan){}

    public function destroy(Catatan $catatan){
        $catatan->delete();
        return redirect()->route('home')->with('success','Catatan berhasil dihapus!');
    }
}
