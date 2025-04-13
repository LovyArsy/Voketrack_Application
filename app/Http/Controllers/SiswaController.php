<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Siswa;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudsiswa.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $request->validate([
        'name' => 'required',
        'username' => 'required|unique:siswas',
        'password' => 'required',
        'gambar' => 'required|image|mimes:jpg,jpeg,png|max:2048'
    ]);

    // Simpan gambar ke public/profil
    $namaFile = time() . '.' . $request->gambar->extension();
    $request->gambar->move(public_path('profil'), $namaFile);

    // Simpan ke database
    \App\Models\Siswa::create([
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
        $siswa = siswa::findOrFail($id);
        return view('crudsiswa.update', compact('siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $siswa = siswa::findOrFail($id);

    $request->validate([
        'name' => 'required',
        'username' => 'required|unique:siswas,username,' . $siswa->id,
        'password' => 'nullable',
        'gambar' => 'image|mimes:jpg,jpeg,png|max:2048'
    ]);

    $siswa->name = $request->name;
    $siswa->username = $request->username;

    if ($request->filled('password')) {
        $siswa->password = bcrypt($request->password);
    }

    if ($request->hasFile('gambar')) {
        $file = $request->file('gambar');
        $nama_file = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('profil'), $nama_file);
        $siswa->gambar = $nama_file;
    }

    $siswa->save();

    return redirect()->route('guru.index')->with('success', 'Data guru berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
{
    $siswa = Siswa::findOrFail($id);

    // Jika ada file gambar, hapus juga dari folder public/profil
    if ($siswa->gambar && file_exists(public_path('profil/' . $siswa->gambar))) {
        unlink(public_path('profil/' . $siswa->gambar));
    }

    $siswa->delete();

    return redirect()->route('guru.index')->with('success', 'Data siswa berhasil dihapus.');
}

}
