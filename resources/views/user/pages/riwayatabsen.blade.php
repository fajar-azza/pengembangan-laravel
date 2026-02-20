@extends('user.layout.app')
@section('content')

<div class="container mt-4">
    <h4 class="mb-3">Riwayat Absensi</h4>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($riwayat as $r)
                <tr>
                    <td>{{ $r->tanggal }}</td>
                    <td>{{ $r->jam_masuk }}</td>
                    <td>{{ $r->jam_pulang ?? '-' }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center">
                        Belum ada data absensi
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

</div>



@endsection