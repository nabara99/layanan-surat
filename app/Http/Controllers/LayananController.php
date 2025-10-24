<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Http\Requests\StoreLayananRequest;
use App\Http\Requests\UpdateLayananRequest;
use App\Models\JenisLayanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::with('jenisLayanan')->get();
        return view('pages.services_layanan.index', compact("layanan"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenisLayanan = JenisLayanan::all();
        return view('pages.services_layanan.create', compact('jenisLayanan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
             $validated = $request->validate([
                'id_layanan'        => 'required|exists:jenis_layanans,id',
                'nomor'             => 'required|string',
                'nama'              => 'required|string',
                'tempat'            => 'required|string',
                'tanggal'           => 'required|date',
                'agama'             => 'nullable|in:Islam,Kristen,Katolik,Hindu,Budha',
                'nik'               => 'nullable|string|max:16|min:16',
                'pekerjaan'         => 'nullable|string',
                'status_perkawinan' => 'required|in:Kawin,Belum Kawin,Cerai Hidup,Cerai Mati',
                'jenis_kelamin'     => 'required|in:Laki-laki,Perempuan',
                'alamat'            => 'required|string',
                'keperluan'         => 'nullable|string',
                'tanggal_meninggal' => 'nullable|date',
                'tempat_meninggal'  => 'nullable|string',
                'penyebab_meninggal'=> 'nullable|string',
            ]);

        Layanan::create([
            'id_layanan'        => $validated['id_layanan'],
            'nomor'             => $validated['nomor'],
            'nama'              => $validated['nama'],
            'tempat'            => $validated['tempat'],
            'tanggal'           => $validated['tanggal'],
            'agama'             => $validated['agama'] ?? null,
            'nik'               => $validated['nik'] ?? null,
            'pekerjaan'         => $validated['pekerjaan'] ?? null,
            'status_perkawinan' => $validated['status_perkawinan'],
            'jenis_kelamin'     => $validated['jenis_kelamin'],
            'alamat'            => $validated['alamat'],
            'keperluan'         => $validated['keperluan'] ?? null,
            'tanggal_meninggal' => $validated['tanggal_meninggal'] ?? null,
            'tempat_meninggal'  => $validated['tempat_meninggal'] ?? null,
            'penyebab_meninggal'=> $validated['penyebab_meninggal'] ?? null,
        ]);

        return redirect()->route('layanan.index')->with('success','Data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('pages.services_layanan.skkb-pdf', compact('layanan'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $layanan = Layanan::with('jenisLayanan')->findOrFail($id);
        $jenisLayanan = JenisLayanan::all();

        return view('pages.services_layanan.edit', compact('layanan', 'jenisLayanan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
     $layanan = Layanan::findOrFail($id);

        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor' => 'required|string|max:255',
            'tempat' => 'required|string|max:255',
            'tanggal' => 'required|date',
            'agama' => 'nullable|string|max:100',
            'status_perkawinan' => 'nullable|string|max:100',
            'jenis_kelamin' => 'nullable|string|max:50',
            'pekerjaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string',
            'keperluan' => 'nullable|string',
        ]);

        $layanan->update($validated);

        return redirect()->route('layanan.index')
            ->with('success', 'Data layanan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->delete();
        return redirect()->route('layanan.index')->with('succes', 'Data berhasil dihapus');

    }
}
