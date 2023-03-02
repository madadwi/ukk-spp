@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Tunggakan</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('tunggakan.create') }}"> Create</a>
                {{-- <a class="btn btn-success" href="{{ route('users.export') }}"> Export</a> --}}
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
            <th>No.</th>
            <th>Nis</th>
            <th>Nisn</th>
            <th>Nama Siswa</th>
            <th>Bulan tunggakan</th>
            {{-- <th>Sisa Bulan</th> --}}
            <th>Total</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>
         @foreach ($tunggakan as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->siswa->nis }}</td>
                <td>{{ $data->siswa->nisn }}</td>
                <td>{{ $data->siswa->nama }}</td>
                {{-- <td> {{$data->bulan }}</td> --}}
                <td> {{$data->sisa_bulan }}</td>
                <td>Rp {{ number_format($data->sisa_tunggakan, 0, ',', '.') }}</td>
                <td> {{$data->deskripsi }}</td>
                <td>
                    <form action="{{ route('tunggakan.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('tunggakan.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach

    </table>



@endsection
