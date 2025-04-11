<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;

class Scan1Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function check($kode)
    {
        $barang = \App\Models\Barang::where('kode', $kode)->first();

        if ($barang) {
            return redirect("/crdpeminjams/showbrng/{$barang->id}");
        } else {
            return redirect('/scans')->with('error', 'Barang tidak ditemukan!');
        }
    }


    public function index()
    {
        return view('crdpeminjams.scan');
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $barang = Barang::findOrFail($id);
        return view('crdpeminjams.showbrng', compact('barang'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
