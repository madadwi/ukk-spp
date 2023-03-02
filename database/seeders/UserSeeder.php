<?php

namespace Database\Seeders;

use App\Models\Spp;
use App\Models\User;
use App\Models\Kelas;
use App\Models\Pembayaran;
use App\Models\Siswa;
use App\Models\Tunggakan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'username' => 'admin',
            'nama_petugas' => 'admin',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);
        User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'username' => 'petugas',
            'nama_petugas' => 'petugas',
            'password' => Hash::make('password'),
            'role' => 'Petugas',
        ]);

        $kelas = Kelas::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'nama_kelas' => 'rpl 5',
            'kompetensi_keahlian' => 'rekayasa',
        ]);

        $spp = Spp::create([
            'tahun' => '2023',
            'nominal' => '20000',
        ]);

        $siswa = Siswa::create([
            'nis' => '12007875',
            'nisn' => '1200787578',
            'alamat' => 'ciawi',
            'nama' => 'maduy',
            'no_telp' => '098765',
            'kelas_id' => $kelas->id,
            'spp_id' => $spp->id
        ]);
        $tunggakan = Tunggakan::create([
            'bulan' => '10',
            'total_tunggakan' => '450000',
            'sisa_tunggakan' => '440000',
            'sisa_bulan' => '9',
            'deskripsi' => 'asdadasdsa',
            'siswa_id' => $siswa->id
        ]);

        $pembayaran = Pembayaran::create([
            'bulan_dibayar' => '1',
            'jumlah_bayar' => '10000',
            'total' => '440000',
            'status' => 'Lunas',
            'date' => '2023-02-28',
            'tunggakan_id' => $tunggakan->id,
            'siswa_id' => $siswa->id

        ]);

        User::create([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'username' => 'siswa',
            'nama_petugas' => 'siswa',
            'password' => Hash::make('password'),
            'role' => 'Siswa',
            'siswa_id' => $siswa->id
        ]);
    }
}
