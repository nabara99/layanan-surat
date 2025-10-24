<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('pages.users.index', compact("users"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Role::all();
        return view('pages.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated =  $request->validate([
            'name'     => 'required|string',
            'email'    => 'required|string|email',
            'password' => 'required|string',
            'role_id'  => 'required|exists:roles,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => $request->role_id
        ]);

        return redirect()->route('users.index')->with('success','Data berhasil disimpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $roles = Role::all();
        $users = User::findOrFail($id);
        return view('pages.users.edit', compact('users','roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {


        $validated =  $request->validate([
            'name'     => 'required|string',
            'email'    => 'string|email',
            'role_id'  => 'required|exists:roles,id',
        ]);

        if (!empty($request->password)) {
                $validated =  $request->validate([
                'password' => 'required|string',
            ]);
        }

        try {
            $users = User::findOrFail($id);

            $updateData = [
                'id' => $users,
                'name' => $request->name,
                'email' => $request->email,

                'role_id' => $request->role_id
            ];
            if(!empty($request->password))
                $updateData = [
                    'password' => Hash::make($request->password),
                ];

            $users->update($updateData);

            return redirect()->route('users.index')->with('success','Data berhasil diubah');

        } catch (\Throwable $th) {
            return redirect()->route('users.index')->with('error','Data gagal diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {

        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('users.index')->with('succes', 'Data berhasil dihapus');

    }
}
