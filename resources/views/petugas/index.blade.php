@extends('layouts.master')
@section('content')
    Halo, selamat datang <b>{{ Auth::user()->username }}</b>. Ini adalah halaman Petugas
@endsection
