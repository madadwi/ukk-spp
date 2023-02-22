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

    <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tanggal Bayar</strong>
                    <input type="date" name="tgl_bayar" class="form-control">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Bulan Bayar</strong>
                    <input type="text" name="bulan_bayar" class="form-control">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Tahun Bayar</strong>
                    <input type="text" name="tahun_bayar" class="form-control">
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Jumlah Bayar</strong>
                    <input type="number" name="jumlah_bayar" class="form-control">
                </div>
            </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Spp</strong>
                    <select name="siswa_id" name="role" id="" class="form-control">
                         <option selected>Pilih Spp</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->spp->nominal }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nisn</strong>
                    <select name="siswa_id" name="role" id="" class="form-control">
                         <option selected>Pilih Nisn</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nisn }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            {{-- <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="petugas_id">
                            <option selected>Pilih petugas</option>
                            @foreach ($petugas as $row)
                            <option {{ $row->id == old('petugas_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                {{ $row->nama_petugas }}
                            </option>
                            @endforeach
                        </select>
                </div>
            </div> --}}
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
