<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = auth()->user();
        $produk = Product::latest()->first();

        return view('home.produk.detailProduk', [
            "title" => "Detail Produk",
            "user" => $user,
            "produk" => $produk,
        ])->with(compact('produk', 'users'));
    }

    public function show($id)
    {
        $product = Product::findOrFail($id);
        $users = User::all();
        $user = auth()->user();
        $produk = Product::latest()->first();

        return view('home.produk.detailProduk', [
            "title" => "Detail Produk",
            "user" => $user,
            "produk" => $produk,
        ])->with(compact('produk', 'users', 'product'));
    }


    public function tambahProduk()
    {
        $users = User::all();
        $user = auth()->user();
        $produk = Product::latest()->first();

        return view('home.produk.tambahProduk', [
            "title" => "Tambah Produk",
            "user" => $user,
            "produk" => $produk,
        ])->with(compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'deskripsi' => 'required|string',
            'gambar_produk' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user_id = auth()->user()->id;

        if ($request->file('gambar_produk')) {
            $validateData['gambar_produk'] = $request->file('gambar_produk')->store('gambar_produk');
        }

        $product = new Product;
        $product->title = $request->title; 
        $product->deskripsi = $request->deskripsi;
        $product->gambar_produk = $validateData['gambar_produk'];
        $product->user_id = $user_id;
        $product->save();

        return redirect('/produk')->with('success', 'Produk berhasil ditambahkan');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Pastikan hanya pemilik post yang dapat menghapusnya
        if ($product->user_id === auth()->id()) {
            // Hapus gambar dari storage jika ada
            if ($product->gambar_produk) {
                Storage::delete($product->gambar_produk);
            }

            // Hapus produk dari database
            $product->delete();

            return redirect()->route('produk')->with('success', 'Produk berhasil dihapus');
        }

        return redirect()->route('produk')->with('error', 'Anda tidak memiliki izin untuk menghapus produk ini');
    }
}
