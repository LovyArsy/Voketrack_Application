<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use Illuminate\Support\Facades\Storage;

use SimpleSoftwareIO\QrCode\Facades\QrCode;


class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangs = Barang::all();
        return view('guru.barang', compact('barangs'));
    }
    public function indexs()
    {
        $barangs = Barang::all();
        return view('siswa.barang', compact('barangs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('crudbarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
        'stok' => 'required|integer|min:1',
        'image' => 'required|image|mimes:jpeg,jpg,png|max:2048'
    ]);

    // Simpan gambar ke storage
    $image = $request->file('image');
    $imageName = time() . '.' . $image->extension(); // Buat nama unik untuk gambar
    $image->move(public_path('barangs'), $imageName); // Simpan di public/barangs

    // Generate kode unik untuk barang
    $kode = 'BRG' . strtoupper(substr(md5(time()), 0, 6));

    // Simpan ke database
    Barang::create([
        'kode' => $kode,
        'nama' => $request->nama,
        'stok' => $request->stok,
        'image' => $imageName // Simpan nama gambar, bukan objek request
    ]);

    // Buat QR Code dan simpan di public/qrcodes
    $qrCodePath = public_path("qrcodes/{$kode}.png");
    \QrCode::format('png')->size(200)->generate($kode, $qrCodePath);

    return redirect('/barang')->with('success', 'Barang berhasil ditambahkan!');
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('crudbarang.show', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('crudbarang.edit', compact('barang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
{
    $barang = Barang::findOrFail($id);

    $request->validate([
        'nama' => 'required',
        'stok' => 'required|integer|min:1',
        'image' => 'nullable|image|mimes:jpeg,jpg,png|max:2048'
    ]);

    // Jika user upload gambar baru
    if ($request->hasFile('image')) {
        // Hapus gambar lama jika ada
        if ($barang->image && file_exists(public_path('barangs/' . $barang->image))) {
            unlink(public_path('barangs/' . $barang->image));
        }   

        // Simpan gambar baru
        $image = $request->file('image');
        $imageName = $image->hashName();
        $image->move(public_path('barangs'), $imageName);
        
        // Update data barang dengan gambar baru
        $barang->update([
            'nama' => $request->nama,
            'stok' => $request->stok,
            'image' => $imageName
        ]);
    } else {
        // Jika tidak ada gambar baru, update hanya nama dan stok
        $barang->update([
            'nama' => $request->nama,
            'stok' => $request->stok
        ]);
    }

    return redirect('/barang')->with('success', 'Barang berhasil diperbarui!');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id); // Cari barang berdasarkan ID
        $barang->delete();

        return redirect('/barang')->with('success', 'Barang berhasil dihapus!');
    }


   
   
}
