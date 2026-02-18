@extends('user.layout.app')
@section('content')
    <div class="row layout-top-spacing">
        <h1>isi dengan halaman admin nanti</h1>
    </div>
    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form action="{{ route('absen.masuk') }}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">
            Absen Masuk
        </button>
    </form>
@endsection
