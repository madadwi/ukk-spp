@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pembayaran</h2>
            </div>
            {{-- <div class="pull-right">
                <a class="btn btn-success" href="{{ route('pembayaran.create') }}"> </a>
            </div> --}}
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
            <th>No.</th>
            <th>Nisn</th>
            <th>Tanggal Bayar</th>
            <th>Bulan Bayar</th>
            <th>Tahun Bayar</th>
            <th>Spp</th>
            <th>Jumlah Bayar</th>


        </tr>
    @foreach ($pembayaran as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->siswa->nama }}</td>
                <td>{{ $data->tgl_bayar }}</td>
                <td>{{ $data->bulan_bayar }}</td>
                <td>{{ $data->tahun_bayar }}</td>
                <td>{{ $data->siswa->nama }}</td>
                <td>{{ $data->jumlah_bayar }}</td>
            </tr>
            @endforeach
    </table>



@endsection
