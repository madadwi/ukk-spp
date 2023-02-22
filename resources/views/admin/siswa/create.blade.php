@extends('layouts.master')
@section('content')
        <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Add new Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('siswa.index') }}"> Back</a>
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

    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nisn</strong>
                    <input type="text" name="nisn" class="form-control">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nis</strong>
                    <input type="text" name="nis" class="form-control">
                </div>
            </div>
             <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nama</strong>
                    <input type="text" name="nama" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <select name="kelas_id">
                            <option selected>Pilih Kelas</option>
                            @foreach ($kelas as $row)
                            <option {{ $row->id == old('kelas_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                {{ $row->nama_kelas }}
                            </option>
                            @endforeach
                        </select>
                </div>
            </div>
              <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    {{-- <strong>Kelas</strong>
                     <select name="kelas_id" id="" class="form-control">

                        @foreach($kelas as $row)
                    <option value="{{$row->nama_kelas}}">{{$row->nama_kelas}}</option>
                    @endforeach
                    </select> --}}
                    <select name="spp_id">
                            <option selected>Pilih spp</option>
                            @foreach ($spp as $row)
                            <option {{ $row->id == old('spp_id') ? 'selected' : '' }} value="{{ $row->id }}">
                                {{ $row->tahun }}
                            </option>
                            @endforeach
                        </select>
                </div>
            </div>
               <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nomor Tlp</strong>
                    <input type="text" name="no_telp" class="form-control">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
