<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use App\Models\UserLayanan;
use Illuminate\Http\Request;

class UserLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $layanan = Layanan::all();
        return view('pages.user_layanans.index', compact("layanan"));
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
    public function show(UserLayanan $userLayanan)
    {
        //
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
