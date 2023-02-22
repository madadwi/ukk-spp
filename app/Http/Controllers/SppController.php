<?php

namespace App\Http\Controllers;

use App\Models\Spp;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class SppController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $spp = Spp::oldest()->paginate(5);
        return view('admin.spp.index', compact('spp'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.spp.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',

        ]);

        Spp::create($request->all());
        return to_route('spp.index')->with('success', 'Berhasil menambah Data Spp!');
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
    public function edit(Spp $spp)
    {
        return view('admin.spp.edit', compact('spp'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Spp $spp)
    {
        $request->validate([
            'tahun' => 'required',
            'nominal' => 'required',
        ]);

        $spp->update($request->all());
        return to_route('spp.index')->with('success', 'Berhasil mengedit spp!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Spp::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()->route('spp.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
