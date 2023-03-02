<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = User::oldest()->paginate(5);
        return view('admin.petugass.index', compact('petugas'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = User::all();
        $siswa = Siswa::all();
        return view('admin.petugass.create', compact('petugas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'role' => 'required',
            'siswa_id' => 'nullable'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect()->route('petugass.index')->with('success', 'Berhasil Menyimpan !');
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
    public function edit(User $petugass)
    {
        return view('admin.petugass.edit', compact('petugass'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $petugass)
    {
        $request->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'nullable',
            'role' => 'required',
        ]);

        $request['password'] = bcrypt($request['password']);

        $petugass->update($request->all());

        return redirect()->route('petugass.index')->with('success', 'Berhasil Menyimpan !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = User::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()->route('petugass.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
