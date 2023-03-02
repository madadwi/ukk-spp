<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class TunggakanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tunggakan = Tunggakan::latest()->paginate(5);
        return view('admin.tunggakan.index', compact('tunggakan'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('admin.tunggakan.create', compact('siswa', 'spp'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => ['required', 'string'],
            // 'spp_id' => ['required', 'string'],
            'bulan' => ['required', 'string'],
            'total_tunggakan' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
        ]);
        $validatedData['sisa_bulan'] = $request->bulan;
        $validatedData['sisa_tunggakan'] = $request->total_tunggakan;
        Tunggakan::create($validatedData);
        return redirect()->route('tunggakan.index')->with('success', 'Berhasil Menyimpan !');
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
    public function edit(Tunggakan $tunggakan)
    {
        $siswa = Siswa::all();
        $spp = Spp::all();
        return view('admin.tunggakan.edit', compact('siswa', 'tunggakan', 'spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Tunggakan $tunggakan)
    {
        $validatedData = $request->validate([
            'siswa_id' => ['required', 'string'],
            'bulan' => ['required', 'string'],
            'total_tunggakan' => ['required', 'string'],
            'deskripsi' => ['required', 'string'],
        ]);
        $validatedData['sisa_bulan'] = $request->bulan;
        $tunggakan->update($request->all());
        return to_route('tunggakan.index')->with('success', 'Berhasil mengedit data Tunggakan!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Tunggakan::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()->route('tunggakan.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
