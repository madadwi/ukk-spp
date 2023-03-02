@extends('layouts.master')
@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tambah Tunggakan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('tunggakan.index') }}"> Back</a>
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

    <form action="{{ route('tunggakan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
           <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis</strong>
                    <select name="siswa_id" id="" class="form-control">
                         <option selected>Pilih Nis</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nis }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>nisn</strong>
                    <select name="siswa_id" id="" class="form-control">
                         <option selected>Pilih Nisn</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nisn }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Siswa</strong>
                    <select name="siswa_id" id="" class="form-control">
                         <option selected>Pilih siswa</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nama }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>bulan Tunggakan</strong>
                    <input type="string" name="bulan" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nominal</strong>
                     {{-- <select name="spp_id" id="" class="form-control">
                         <option selected>Pilih Nominal</option> --}}
                      {{-- @foreach ( $spp  as $row)
                    <option {{ $row->id == old('spp_id') ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nominal }}</option>
                    @endforeach
                    </select> --}}
                     <input type="number" name="total_tunggakan" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi</strong>
                    <input type="string" name="deskripsi" class="form-control" >
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
