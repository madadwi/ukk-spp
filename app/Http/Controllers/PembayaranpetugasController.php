<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

class PembayaranpetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembayaran = Pembayaran::oldest()->paginate(5);
        return view('petugas.transaksi.index', compact('pembayaran'))->with('i', (request()->input('page', 1) - 1) * 5);
    }
}
