<?php

namespace App\Http\Controllers;

use App\Models\JenisLayanan;
use App\Http\Requests\UpdateJenisLayananRequest;
use Illuminate\Http\Request;

class JenisLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = JenisLayanan::all();
        return view('pages.services.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated =  $request->validate([
            'nama_layanan' => 'required|string',
            'initial_name' => 'required|string',
        ]);

        JenisLayanan::create([
            'nama_layanan' => $request->nama_layanan,
            'initial_name' => $request->initial_name,
        ]);

        return redirect()->route('services.index')->with('success','Data berhasil disimpan');


    }

    /**
     * Display the specified resource.
     */
    public function show(JenisLayanan $jenisLayanan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $jenisLayanan = JenisLayanan::findOrFail($id);

        return view('pages.services.edit', compact('jenisLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $jenisLayanan = JenisLayanan::findOrFail($id);

        $validated =  $request->validate([
            'nama_layanan' => 'required|string',
            'initial_name' => 'required|string',
        ]);

        $jenisLayanan->update([
            'id' => $jenisLayanan,
            'nama_layanan' => $request->nama_layanan,
            'initial_name' => $request->initial_name,
        ]);

        return redirect()->route('services.index')->with('success','Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $jenisLayanan=  JenisLayanan::findOrFail($id);
        $jenisLayanan->delete();
        return redirect()->route('services.index')->with('succes', 'Data berhasil dihapus');
    }
}
