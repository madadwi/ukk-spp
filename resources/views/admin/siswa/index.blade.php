@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Siswa</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('siswa.create') }}"> Create</a>
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
            <th>Nisn</th>
            <th>Nis</th>
            <th>Kelas</th>
            <th>Spp</th>
            <th>Nomor tlp</th>
            <th width="160px">Action</th>
        </tr>
    @foreach ($siswa as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->nisn }}</td>
                <td>{{ $data->nis }}</td>
                <td>{{ $data->kelas->nama_kelas }}</td>
                <td>{{ $data->spp->tahun }}</td>
                <td>{{ $data->no_telp }}</td>
                <td>
                    <form action="{{ route('siswa.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('siswa.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>



@endsection
