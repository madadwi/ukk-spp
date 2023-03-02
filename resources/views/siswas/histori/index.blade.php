@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pembayaran</h2>
            </div>
        </div>
    </div>

    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered">
      <tr>
                    {{-- Table Header --}}
                    <th>No</th>
                    <th>Nis</th>
                    <th>Nisn</th>
                    <th>Nama Siswa</th>
                    <th>Bulan Dibayar</th>
                    <th>Jumlah dibayar</th>
                    <th>Total Tunggakan</th>
                    <th>Tanggal</th>
                    <th>Status</th>

                </tr>
                @forelse ($pembayaran as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                       <td>{{ $row->siswa->nis }}</td>
                        <td>{{ $row->siswa->nisn }}</td>
                        <td>{{ $row->siswa->nama }}</td>
                        <td>{{ $row->bulan_dibayar }}</td>
                        <td>Rp {{ number_format($row->jumlah_bayar, 0, ',', '.') }}</td>
                        <td>Rp {{ number_format($row->total, 0, ',', '.') }}</td>
                        <td>{{ $row->date }}</td>
                        <td>{{ $row->status }}</td>
            </tr>
            @endforeach
    </table>



@endsection
