<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guru;
use App\Models\siswa;
class GuruController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gurus = Guru::all();
        $siswas = siswa::all();
        return view('guru.user', compact('gurus', 'siswas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudguru.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
        'name' => 'required',
        'username' => 'required|unique:gurus',
        'password' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Simpan gambar ke public/profil
    $namaFile = time() . '.' . $request->gambar->extension();
    $request->gambar->move(public_path('profil'), $namaFile);

    // Simpan ke database
    \App\Models\Guru::create([
        'name' => $request->name,
        'username' => $request->username,
        'password' => bcrypt($request->password),
        'gambar' => $namaFile
    ]);

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil ditambahkan!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $guru = Guru::findOrFail($id);
        return view('crudguru.update', compact('guru'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $guru = Guru::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:gurus,username,' . $guru->id,
        'password' => 'nullable',
        'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $guru->name = $request->name;
    $guru->username = $request->username;

    if ($request->filled('password')) {
        $guru->password = bcrypt($request->password);
    }

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('profil'), $nama_file);
        $guru->gambar = $nama_file;
    }

    $guru->save();

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $guru = Guru::findOrFail($id);

    // Jika ada file gambar, hapus juga dari folder public/profil
        if ($guru->gambar && file_exists(public_path('profil/' . $guru->gambar))) {
            unlink(public_path('profil/' . $guru->gambar));
        }

        $guru->delete();

        return redirect()->route('guru.index')->with('success', 'Data siswa berhasil dihapus.');
    }
}
