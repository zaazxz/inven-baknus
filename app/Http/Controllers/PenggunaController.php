<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Password;
use RealRashid\SweetAlert\Facades\Alert;

class PenggunaController extends Controller
{
    // View Index
    public function index()
    {
        return view('backend.pengguna.index', [
            'title'         => 'Data Pengguna',
            'title_header'  => 'Pengguna',
            'halaman'       => 'Pengguna',
            'data'          => User::all(),
        ]);
    }

    // View Administrator
    public function administrator()
    {
        return view('backend.pengguna.index', [
            'title'         => 'Data Pengguna Administrator',
            'title_header'  => 'Pengguna Role Administrator',
            'halaman'       => 'Administrator',
            'data'          => User::where('role', 'Administrator')->get(),
        ]);
    }

    // View Index
    public function laboran()
    {
        return view('backend.pengguna.index', [
            'title'         => 'Data Pengguna Laboran',
            'title_header'  => 'Pengguna Role Laboran',
            'halaman'       => 'Laboran',
            'data'          => User::where('role', 'Laboran')->get(),
        ]);
    }

    // View Index
    public function pj()
    {
        return view('backend.pengguna.index', [
            'title'         => 'Data Pengguna Penanggung Jawab',
            'title_header'  => 'Pengguna Role Penanggung Jawab',
            'halaman'       => 'Penanggung Jawab',
            'data'          => User::where('role', 'Penanggung Jawab')->get(),
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.pengguna.create', [
            'title'         => 'Data Pengguna Baru',
            'title_header'  => 'Tambah Data Pengguna',
            'halaman'       => 'Tambah Data',
            'lokasi'        => Lokasi::where('user_id', NULL)->get()
        ]);
    }

    // Store Function
    public function store(Request $request)
    {
        $data = $request->validate([
            'name'      => 'required',
            'email'     => 'required|unique:users|email',
            'role'      => 'required',
            'lokasi_id' => '',
            'picture'   => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ]);

        // Image
        if ($request->file('picture')) {
            $data['picture'] = $request->file('picture')->store('image/users');
        }

        // Password Auto Fill
        if ($data['role'] == 'Administrator') {
            $data['password'] = bcrypt('admin123');
        } else if ($data['role'] == 'Laboran') {
            $data['password'] = bcrypt('laboran123');
        } else {
            $data['password'] = NULL;
        }

        // Generate First Token
        if ($data['role'] == 'Administrator') {
            $data['remember_token'] = Str::random(10);
        } else if ($data['role'] == 'Laboran') {
            $data['remember_token'] = Str::random(10);
        } else {
            $data['password'] = NULL;
        }

        User::create($data);

        if ($data) {
            Alert::success('Success', 'User Baru berhasil ditambahkan!');
            return redirect()->route('pengguna.index');
        } else {
            Alert::error('Error', 'User Baru gagal ditambahkan!');
            return redirect()->route('pengguna.index');
        }

    }

    // View Edit
    public function edit(User $user)
    {
        return view('backend.pengguna.edit', [
            'title'         => 'Edit Data Pengguna',
            'title_header'  => 'Edit Data Pengguna',
            'halaman'       => 'Edit Data',
            'data'          => $user,
            'lokasi'        => Lokasi::where('user_id', $user->id)->get(),
            'lokasi_null'   => Lokasi::where('user_id', NULL)->get()
        ]);
    }

    // Update Function
    public function update(Request $request, User $user)
    {

        // Rules Awal
        $rules = [
            'name'      => '',
            'role'      => '',
            'email'     => '',
            'lokasi_id' => '',
            'picture'   => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ];

        // Validasi
        $validatedData = $request->validate($rules);

        // Image
        if ($request->file('picture')) {
            if($user->picture) {
                Storage::delete($user->picture);
            }
            $validatedData['picture'] = $request->file('picture')->store('image/users');
        }

        // Password Auto Fill
        if ($validatedData['role'] == 'Administrator') {
            $validatedData['password'] = bcrypt('admin123');
        } else if ($validatedData['role'] == 'Laboran') {
            $validatedData['password'] = bcrypt('laboran123');
        } else {
            $validatedData['password'] = NULL;
        }

        // Generate First Token
        if ($validatedData['role'] == 'Administrator') {
            $validatedData['remember_token'] = Str::random(10);
        } else if ($validatedData['role'] == 'Laboran') {
            $validatedData['remember_token'] = Str::random(10);
        } else {
            $validatedData['password'] = NULL;
        }

        User::where('id', $user->id)
            ->update($validatedData);

        if ($validatedData) {
            Alert::success('Success', 'User Baru berhasil diubah!');
            return redirect()->route('pengguna.index');
        } else {
            Alert::error('Error', 'User Baru gagal diubah!');
            return redirect()->route('pengguna.index');
        }
    }

    // Delete Function
    public function destroy(string $id)
    {
        // Variable
        $user = User::where('id', $id)->first();

        // Delete picture
        if($user->picture){
            Storage::delete($user->picture);
        }

        // Destroy
        User::destroy('id', $user->id);

        if ($user) {
            Alert::success('Success', 'User berhasil hapus!');
            return back();
        } else {
            Alert::error('Error', 'User gagal hapus!');
            return back();
        }
    }

    public function configedit(User $user) {

        return view('backend.pengguna.konfig', [
            'title'         => 'Edit Data ' . auth()->user()->name,
            'title_header'  => 'Edit Data ' . auth()->user()->name,
            'halaman'       => 'Edit Data',
            'data'          => $user,
            'lokasi'        => Lokasi::where('user_id', $user->id)->get(),
            'lokasi_null'   => Lokasi::where('user_id', NULL)->get()
        ]);

    }

    public function configupdate(Request $request, User $user) {

        // Rules Awal
        $rules = [
            'name'      => '',
            'role'      => '',
            'email'     => '',
            'lokasi_id' => '',
            'picture'   => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:2000'
        ];

        // Validasi
        $validatedData = $request->validate($rules);

        // Image
        if ($request->file('picture')) {
            if($user->picture) {
                Storage::delete($user->picture);
            }
            $validatedData['picture'] = $request->file('picture')->store('image/users');
        }

        // Generate First Token
        if ($validatedData['role'] == 'Administrator') {
            $validatedData['remember_token'] = Str::random(10);
        } else if ($validatedData['role'] == 'Laboran') {
            $validatedData['remember_token'] = Str::random(10);
        } else {
            $validatedData['password'] = NULL;
        }

        User::where('id', $user->id)
            ->update($validatedData);

        if ($validatedData) {
            Alert::success('Success', 'Profil berhasil diubah!');
            return redirect()->route('home');
        } else {
            Alert::error('Error', 'Profil gagal diubah!');
            return redirect()->route('home');
        }

    }

    public function passedit(User $user) {

        return view('backend.pengguna.password', [
            'title'         => 'Edit Password ' . auth()->user()->name,
            'title_header'  => 'Edit Password ' . auth()->user()->name,
            'halaman'       => 'Edit Data',
            'data'          => $user,
        ]);

    }

    public function passupdate(Request $request) {

        // Validation
        $request->validate([
            'current_password'  => 'required',
            'new_password'      => 'required|confirmed',
        ]);

        // Match The Old Password
        if(!Hash::check($request->current_password, auth()->user()->password)){

            Alert::error("error", "Password lama tidak sesuai");
            return back();
        }

        // Update the new Password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password)
        ]);

        Alert::success('Success', 'Password Berhasil Diubah!');
        return redirect()->route('home');

    }
}
