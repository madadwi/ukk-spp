@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Petugas</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('petugass.create') }}"> Create</a>
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
            <th>Username</th>
            <th>Nama_Petugas</th>
            <th>Role</th>
            <th width="160px">Action</th>
        </tr>
    @foreach ($petugas as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->nama_petugas }}</td>
                <td>{{ $data->role }}</td>
                <td>
                    <form action="{{ route('petugass.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('petugass.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>



@endsection
