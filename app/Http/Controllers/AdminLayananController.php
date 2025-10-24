<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\UserLayanan;
use Illuminate\Http\Request;

class AdminLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('pages.admin_layanans.index', compact("layanan"));

    }

    public function updateStatus(Request $request, $id)
    {
        $layanan = Layanan::findOrFail($id);
        $layanan->status = !$layanan->status; // toggle boolean
        $layanan->save();
        return redirect()->route('adminlayanan.index')->with('success', 'Status berhasil diubah');
    }

    public function updateMemo(Request $request, $id)
    {
        $request->validate([
            'memo' => 'required|string'
        ]);

        $layanan = Layanan::findOrFail($id);
        $layanan->memo = $request->memo;
        $layanan->save();

        if ($request->ajax() || $request->wantsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Memo berhasil disimpan'
            ]);
        }

        return redirect()->route('adminlayanan.index')->with('success', 'Memo berhasil disimpan');
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
    public function show($id)
    {
        $layanan = Layanan::findOrFail($id);
        return view('pages.services_layanan.skkb-pdf', compact('layanan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(UserLayanan $userLayanan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, UserLayanan $userLayanan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(UserLayanan $userLayanan)
    {
        //
    }
}
