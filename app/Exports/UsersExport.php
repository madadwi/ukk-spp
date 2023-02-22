<?php

namespace App\Exports;

use App\Models\Pembayaran;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Pembayaran::all()
            ->map(function ($row) {
                return [
                    'nisn' => $row->siswa->nisn,
                    'tanggal_bayar' => $row->tgl_bayar,
                    'bulan_bayar' => $row->bulan_bayar,
                    'tahun_bayar' => $row->tahun_bayar,
                    'spp' => $row->siswa->spp->nominal,
                ];
            });
    }
}
