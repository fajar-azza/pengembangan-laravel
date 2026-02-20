@extends('user.layout.app')
@section('content')

<br>
<br>

    <div class="card">
    <div class="card-body text-center">

        <h4 class="mb-3">Absensi Hari Ini</h4>

        {{-- Alert --}}
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        {{-- Status Info --}}
        @if(!$absenHariIni)
            <p class="text-muted">Anda belum absen hari ini</p>

            <form action="{{ route('absen.masuk') }}" method="POST">
                @csrf
                <button class="btn btn-success px-4">
                    Absen Masuk
                </button>
            </form>

        @elseif(!$absenHariIni->jam_pulang)

            <p>
                Jam Masuk:
                <strong>{{ $absenHariIni->jam_masuk }}</strong>
            </p>

            <form action="{{ route('absen.pulang') }}" method="POST">
                @csrf
                <button class="btn btn-danger px-4">
                    Absen Pulang
                </button>
            </form>

        @else

            <p>
                Jam Masuk:
                <strong>{{ $absenHariIni->jam_masuk }}</strong><br>
                Jam Pulang:
                <strong>{{ $absenHariIni->jam_pulang }}</strong>
            </p>

            <button class="btn btn-secondary px-4" disabled>
                Absensi Hari Ini Selesai
            </button>

        @endif

    </div>
</div>
@endsection
