<?php

namespace Database\Seeders;

use App\Models\User;
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
        $data = [
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'username' => 'admin',
                'nama_petugas' => 'maduy',
                'password' => Hash::make('password'),
                'role' => 'Admin',
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'username' => 'petugas',
                'nama_petugas' => 'mada',
                'password' => Hash::make('password'),
                'role' => 'Petugas',
            ],
            [
                'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
                'username' => 'Siswa',
                'nama_petugas' => 'test',
                'password' => Hash::make('password'),
                'role' => 'Siswa',
            ],
        ];
        User::insert($data);
    }
}
