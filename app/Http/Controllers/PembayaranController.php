<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Pembayaran;
use App\Exports\UsersExport;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\RedirectResponse;

class PembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::oldest()->paginate(5);
        return view('admin.pembayaran.index', compact('pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
    public function export()
    {
        return Excel::download(new UsersExport(), 'transaksi.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $petugas = User::all();
        $siswa = Siswa::all();
        return view('admin.pembayaran.create', compact('petugas', 'siswa'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'siswa_id' => ['required'],
            'tgl_bayar' => ['required', 'date'],
            'bulan_bayar' => ['required', 'max:255', 'string'],
            'tahun_bayar' => ['required', 'max:255', 'string'],
            'jumlah_bayar' => ['required']
        ]);
        Pembayaran::create($validatedData);
        return redirect()->route('pembayaran.index')->with('success', 'Berhasil Menyimpan !');
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
