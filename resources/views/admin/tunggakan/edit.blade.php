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

    <form action="{{ route('tunggakan.update', $tunggakan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
         @method('PUT')
        <div class="row">
 <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Nis</strong>
                    <select name="siswa_id" id="" class="form-control">
                         <option selected>Pilih Nis</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id', $tunggakan->siswa_id) ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nis }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Nisn</strong>
                    <select name="siswa_id" id="" class="form-control">
                         <option selected>Pilih Nisn</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id', $tunggakan->siswa_id) ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nisn }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama Nama Siswa</strong>
                    <select name="siswa_id" id="" class="form-control">
                         <option selected>Pilih Nama Siswa</option>
                      @foreach ($siswa as $row)
                    <option {{ $row->id == old('siswa_id', $tunggakan->siswa_id) ? 'selected' : '' }} value="{{ $row->id }}"> {{ $row->nama }}</option>
                    @endforeach
                    </select>
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>bulan</strong>
                    <input type="string" name="bulan" class="form-control" value="{{$tunggakan->bulan}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Total</strong>
                    <input type="string" name="total_tunggakan" class="form-control" value="{{$tunggakan->total_tunggakan}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Deskripsi</strong>
                    <input type="string" name="deskripsi" class="form-control" value="{{$tunggakan->deskripsi}}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
