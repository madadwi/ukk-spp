<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Kelas;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswa = Siswa::oldest()->paginate(5);
        return view('admin.siswa.index', compact('siswa'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.create', compact('kelas', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nisn' => ['required', 'max:255', 'string'],
            'nis' => ['required', 'max:255', 'string'],
            'kelas_id' => ['required'],
            'spp_id' => ['required'],
            'nama' => ['required', 'max:255', 'string'],
            'alamat' => ['required', 'max:255', 'string'],
            'no_telp' => ['required', 'max:255', 'string'],
        ]);
        Siswa::create($validatedData);
        return redirect()->route('siswa.index')->with('success', 'Berhasil Menyimpan !');
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
    public function edit(Siswa $siswa)
    {
        $kelas = Kelas::all();
        $spp = Spp::all();
        return view('admin.siswa.edit', compact('kelas', 'spp', 'siswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nisn' => ['required', 'max:255', 'string'],
            'nis' => ['required', 'max:255', 'string'],
            'kelas_id' => ['required'],
            'spp_id' => ['required'],
            'nama' => ['required', 'max:255', 'string'],
            'alamat' => ['required', 'max:255', 'string'],
            'no_telp' => ['required', 'max:255', 'string'],
        ]);

        $siswa->update($request->all());
        return to_route('siswa.index')->with('success', 'Berhasil mengedit Siswa!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Siswa::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()->route('siswa.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
