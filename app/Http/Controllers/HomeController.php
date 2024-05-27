<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Content;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $users = User::all();
        $user = auth()->user();

        return view('home.home', [
            "title" => "Home",
            "user" => $user,
        ])->with(compact('users'));
    }

    public function trailer()
    {
        $users = User::all();
        $user = auth()->user();

        return view('home.trailer', [
            "title" => "Trailer",
            "user" => $user,
        ])->with(compact('users'));
    }

    public function produk()
    {
        $users = User::all();
        $user = auth()->user();
        $produk = Product::latest()->first();
        $products = Product::all();

        return view('home.produk', [
            "title" => "Produk",
            "user" => $user,
            "produk" => $produk,
        ])->with(compact('users', 'products'));
    }

    public function blog()
    {
        $user = auth()->user();
        $userContents = Content::all(); 
    
        return view('home.blog', [
            "title" => "Blog",
            "userContents" => $userContents, 
            "user" => $user,
        ]);
    }
    

    public function artikel()
    {
        $users = User::all();
        $user = auth()->user();
        $artikels = Artikel::all();

        return view('home.artikel', [
            "title" => "Artikel",
            "user" => $user,
            "artikels" => $artikels,
        ])->with(compact('users'));
    }

    public function logout(Request $request)
    {
        $user = auth()->user();

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login')->with('success', 'You have been logged out.');
    }

    public function user()
    {
        $user = auth()->user();
        $instagramLink = $user->instagram;
        $youtubeLink = $user->youtube;
        $discordID = $user->discord;

        $userContents = $user->contents; 

        return view('home.profile', [
            "title" => "Profile Setting",
            "user" => $user,
            "youtubeLink" => $youtubeLink,
            "discordID" => $discordID,
            "userContents" => $userContents, 
        ])->with(compact('user', 'instagramLink', 'youtubeLink', 'discordID', 'userContents'));
    }

    public function user_setting()
    {
        $user = auth()->user();
        $instagramLink = $user->instagram;

        return view('home.action.usersetting', [
            "title" => "Edit Profile",
            "user" => $user,
            "instagramLink" => $instagramLink,
        ])->with(compact('user', 'instagramLink'));
    }


    public function create()
    {
        $user = auth()->user();

        return view('home.action.create', [
            "title" => "Tambah Profile",
            "user" => $user,
        ])->with(compact('user'));
    }

    public function store(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'bio' => 'nullable|string',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'bio' => $request->input('bio'),
        ];

        if ($request->hasFile('profile_picture')) {
            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_image'] = $profilePicturePath;
        }

        $user->update($data);

        return redirect('/profile')->with('success', 'Profile created successfully!');
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        $request->validate([
            'nama' => 'required|string',
            'bio' => 'nullable|string',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = [
            'nama' => $request->input('nama'),
            'bio' => $request->input('bio'),
            'instagram' => $request->input('instagram'),
            'discord' => $request->input('discord'),
            'youtube' => $request->input('youtube'),
        ];

        if ($request->hasFile('profile_picture')) {
            if ($user->profile_image) {
                Storage::disk('public')->delete($user->profile_image);
            }

            $profilePicturePath = $request->file('profile_picture')->store('profile_pictures', 'public');
            $data['profile_image'] = $profilePicturePath;
        }

        $user->update($data);

        return redirect('/profile')->with('success', 'Profile updated successfully!');
    }

    public function createContent()
    {
        return view('home.produk.konten', [
            "title" => "Tambah Konten"
        ]);
    }

    public function storeContent(Request $request)
    {
        // Validasi data yang diunggah oleh pengguna
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'required|string',
        ]);

        // Simpan konten yang diunggah ke dalam database
        $content = new Content();

        $imagePath = $request->file('image')->store('content_images');

        // Simpan data konten ke dalam database
        $content->image = $imagePath;
        $content->content = $request->input('content');
        $content->user_id = auth()->user()->id;
        $content->save();

        // Redirect kembali ke halaman profil pengguna dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Konten berhasil ditambahkan!');
    }
}
