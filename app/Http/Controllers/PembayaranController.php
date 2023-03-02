<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Petugas;
use App\Models\Tunggakan;
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
        $tunggakans = Tunggakan::all();
        $siswa = Siswa::all();
        return view('admin.pembayaran.create', compact('siswa', 'tunggakans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = [
            'siswa_id' => ['required'],
            'tunggakan' => ['required'],
            'bulan_dibayar' => ['required', 'numeric'],
            'jumlah_bayar' => ['required']
        ];

        if ($request->tunggakan) {
            $tunggakan = Tunggakan::find($request->tunggakan);
            array_push($rules['bulan_dibayar'], 'max:' . $tunggakan->sisa_bulan);
            array_push($rules['jumlah_bayar'], 'max:' . $tunggakan->sisa_tunggakan);
        }

        $validatedData = $request->validate($rules);

        if ($request->tunggakan) {
            $tunggakan = Tunggakan::find($request->tunggakan);
            $tunggakan->sisa_bulan -= $request->bulan_dibayar;
            $tunggakan->sisa_tunggakan -= $request->jumlah_bayar;
            $tunggakan->save();

            $validatedData['total'] = $tunggakan->total_tunggakan - $request->jumlah_bayar;
            $validatedData['tunggakan_id'] = $request->tunggakan;
            $validatedData['date'] = date('Y-m-d');
            unset($validatedData['tunggakan']);

            Pembayaran::create($validatedData);

            return to_route('pembayaran.index')->with('success', 'Berhasil menyimpan data Entri Pembayaran');
        }
    }

    // public function bayar($id)
    // {
    //     return view('admin.pembayaran.bayar', [
    //         'transaksi' => Pembayaran::find($id),
    //         'tunggakan' => Tunggakan::latest()->get()
    //     ]);
    // }

    // public function buat(Request $request, $id)
    // {
    //     $transaksi = Pembayaran::find($id);
    //     $rules = [
    //         'bayar' => ['required', 'numeric', 'min:' . $transaksi->total],
    //     ];
    //     if ($request->bayar) {
    //         $bayar = Tunggakan::find($request->bayar);
    //         array_push($rules['bayar'], 'max:' . $bayar->sisa_tunggakan);
    //     }
    //     $validatedData = $request->validate($rules);
    //     if ($request->bayar) {
    //         $bayar = Tunggakan::find($request->bayar);
    //         $bayar->sisa_tunggakan -= $request->bayar;
    //         $bayar->save();
    //         unset($validatedData['tunggakan']);
    //         $validatedData['status'] = 'Lunas';

    //         $transaksi->update($validatedData);
    //     }
    //     return to_route('pembayaran.index')->with('success', 'Berhasil bayar');
    // }



    /**

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
        $category = Pembayaran::findOrFail($id);
        if ($category) {
            $category->delete();
            return redirect()->route('pembayaran.index')->with('success', 'Berhasil Hapus!');
        }
    }
}
