<?php

namespace App\Http\Controllers;

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\User;

class ArtikelController extends Controller
{
    public function create()
    {
        $users = User::all();

        return view('admin.action.create', [
            "title" => "Tambah Artikel"
            ])->with(compact('users'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'artikel' => 'required|string',
        ]);

        // Simpan artikel ke dalam database
        $artikel = new Artikel();
        $artikel->user_id = auth()->user()->id;
        $artikel->gambar = $request->file('gambar')->store('artikel_images');
        $artikel->artikel = $request->artikel;
        $artikel->save();

        return redirect()->route('artikel')->with('success', 'Artikel berhasil diposting!');
    }
}
