<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Peminjam;
use App\Models\Barang;
use Illuminate\Support\Facades\Auth;


class PeminjamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->id(); // Ambil ID pengguna yang login

        $peminjams = Peminjam::with(['peminjam'])
        ->where('status', 'dipinjam') 
        ->where('peminjam_id', $userId) // Hanya yang dipinjam oleh pengguna ini
        ->where('peminjam_type', 'App\Models\Guru') // Pastikan hanya untuk Guru
        ->latest()
        ->get();


        return view('guru.peminjam', compact('peminjams'));


    //    $peminjams = Peminjam::with(['peminjam'])
    //     ->where('status', 'dipinjam') // Hanya ambil yang statusnya "dipinjam"
    //     ->latest()
    //     ->get();
        

    //     return view('guru.peminjam', compact('peminjams'));
    }
    

    public function daftarpeminjaman() {

        $peminjams = Peminjam::with(['peminjam'])
        ->where('status', 'dipinjam') // Hanya ambil yang statusnya "dipinjam"
        ->latest()
        ->get();
        

        return view('guru.daftar_pinjam', compact('peminjams'));
    }

    public function daftarpengembalian() {
         $peminjams = Peminjam::with(['peminjam'])
        ->where('status', 'dikembalikan') // Hanya ambil yang statusnya "dipinjam"
        ->latest()
        ->get();
        

        return view('guru.daftar_pengembalian', compact('peminjams'));
    }

    public function pengembalian()
{
        $userId = auth()->id(); // Ambil ID pengguna yang login

        $peminjams = Peminjam::with(['peminjam'])
        ->where('status', 'dikembalikan') 
        ->where('peminjam_id', $userId) // Hanya yang dipinjam oleh pengguna ini
        ->where('peminjam_type', 'App\Models\Guru') // Pastikan hanya untuk Guru
        ->latest()
        ->get();

    return view('guru.pengembalian', compact('peminjams'));
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
      public function store(Request $request)
{
    try {
        // Pastikan session tersedia
        if (!session()->has('peminjam_id') || !session()->has('peminjam_type')) {
            return redirect()->back()->with('error', 'Session peminjam tidak tersedia. Silakan login ulang.');
        }

        // Simpan peminjam ke variabel
        $peminjam = [
            'id' => session('peminjam_id'),
            'type' => session('peminjam_type')
        ];

        // Validasi request
        $request->validate([
            'barang_id' => 'required|exists:barangs,id',
        ]);

        // Cari barang
        $barang = Barang::findOrFail($request->barang_id);

        if ($barang->stok <= 0) {
            return redirect()->back()->with('error', 'Barang ini sudah habis, tidak bisa dipinjam.');
        }

        // Simpan data peminjaman
        Peminjam::create([
            'peminjam_id' => $peminjam['id'],
            'peminjam_type' => $peminjam['type'],
            'barang_id' => $request->barang_id,
            'pinjam_date' => now(),
            'kembali_date' => now()->addDays(7), 
            'status' => 'dipinjam',
        ]);

        // Kurangi stok barang
        $barang->decrement('stok');

        return redirect('/scan')->with('success', 'Barang berhasil dipinjam.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
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
   
    public function edit($id)
    {
        $peminjaman = Peminjam::findOrFail($id);
        return view('crdpeminjam.kembalikan', compact('peminjaman'));
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $request->validate([
            'foto_bukti' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $peminjaman = Peminjam::findOrFail($id);

        // Simpan bukti foto
        $image = $request->file('foto_bukti');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('bukti_pengembalian'), $imageName);

        // Tanggal pengembalian
        $kembalinya_date = now();
        $kembali_date = $peminjaman->kembali_date;

        // Hitung denda jika telat
        $denda = 0;
        if ($kembalinya_date->greaterThan($kembali_date)) {
            $hari_telat = $kembalinya_date->diffInDays($kembali_date);
            $denda = $hari_telat * 2000;
        }

        // Update data peminjaman
        $peminjaman->update([
            'kembalinya_date' => $kembalinya_date,
            'denda' => $denda,
            'status' => 'dikembalikan',
            'foto_bukti' => $imageName,
        ]);

        // Tambah kembali stok barang
        $barang = Barang::findOrFail($peminjaman->barang_id);
        $barang->increment('stok');

        return redirect('/pengembalian')->with('success', 'Barang berhasil dikembalikan.');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
    }
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
