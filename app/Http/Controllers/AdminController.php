<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function dashboard()
    {
        $users = User::all();

        return view('admin.admin', [
            "title" => "Halaman Admin"
        ])->with(compact('users'));
    }

    public function edit($id)
    {
        $user = User::find($id);

        return view('admin.action.update', [
            "title" => "Edit Pengguna"
        ])->with(compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::find($id);

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'status' => 'required|in:Admin,Guru,Murid,Lainnya',
        ]);

        $user->update([
            'nama' => $request->input('nama'),
            'email' => $request->input('email'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('dashboard')->with('success', 'User updated successfully');
    }

    public function deleteUser($id)
    {
        $user = User::find($id);

        if ($user) {
            $user->delete();
            return redirect()->route('dashboard')->with('success', 'User deleted successfully');
        }

        return redirect()->route('dashboard')->with('error', 'User not found');
    }
}
