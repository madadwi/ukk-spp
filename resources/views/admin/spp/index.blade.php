@extends('layouts.master')
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Spp</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('spp.create') }}"> Create</a>
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
            <th>tahun</th>
            <th>no_minal</th>
            <th width="160px">Action</th>
        </tr>
    @foreach ($spp as $data)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $data->tahun }}</td>
                <td>{{ $data->nominal }}</td>
                <td>
                    <form action="{{ route('spp.destroy',$data->id) }}" method="POST">
                        <a class="btn btn-primary" href="{{ route('spp.edit',$data->id) }}">Edit</a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
    </table>



@endsection
