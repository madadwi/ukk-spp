@extends('layouts.master')
@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Pembayaran</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('pembayaran.index') }}"> Back</a>
            </div>
        </div>
    </div>

    <br>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('pembayaran.buat', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Status</strong>
                    <input type="text" name="status" disabled value="{{ old('status', $transaksi->status) }}" required class="form-control">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis</strong>
                    <select type="text" name="tunggakan" disabled class="form-control">
                      @foreach ($tunggakan as $row)
                        <option value="{{ $row->id }}" {{ old('tunggakan') || $transaksi->tunggakan_id === $row->id ? 'selected' : '' }}>{{ $row->siswa->nis}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nisn</strong>
                    <select type="text" name="tunggakan" disabled class="form-control">
                      @foreach ($tunggakan as $row)
                        <option value="{{ $row->id }}" {{ old('tunggakan') || $transaksi->tunggakan_id === $row->id ? 'selected' : '' }}>{{ $row->siswa->nisn}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Siswa</strong>
                    <select type="text" name="tunggakan" disabled class="form-control">
                      @foreach ($tunggakan as $row)
                        <option value="{{ $row->id }}" {{ old('tunggakan') || $transaksi->tunggakan_id === $row->id ? 'selected' : '' }}>{{ $row->siswa->nama}}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Bayar</strong>
                    <input type="text" name="bulan_dibayar" disabled value="{{ old('bulan_dibayar', $transaksi->bulan_dibayar) }}"  class="form-control">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Bayar</strong>
                    <input type="text" name="tahun_bayar" disabled value="{{ old('tahun_bayar', $transaksi->tahun_bayar) }}"  class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total Tunggakan</strong>
                    <input type="text" name="total" disabled value="{{ old('total', number_format($transaksi->total, 0, ',', '.')) }}" class="form-control">
                </div>
            </div>
            @if ($transaksi->status === 'Lunas')
                {{-- Buy --}}
                 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bayar</strong>
                    <input type="text" name="bayar" disabled value="{{ old('bayar', number_format($transaksi->bayar, 0, ',', '.')) }}" class="form-control">
                </div>
            </div>
            @else
                   <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bayar</strong>
                    <input type="text" name="bayar" value="{{ old('bayar') }}" required class="form-control">
                </div>
            </div>
            @endif
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
