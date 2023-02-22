@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Kelas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('kelas.create') }}"> Create</a>
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
            <th>Nama_kelas</th>
            <th>Kompetensi_keahlian</th>
            <th width="160px">Action</th>
        </tr>
    @foreach ($kelas as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->nama_kelas }}</td>

                <td>{{ $data->kompetensi_keahlian }}</td>

                <td>
                    <form action="{{ route('kelas.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('kelas.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>



@endsection
