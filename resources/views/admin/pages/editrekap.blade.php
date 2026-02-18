@extends('admin.layout.app')
@section('content')
    <form method="POST" action="{{ route('admin.absen.bulk.update') }}">
        @csrf

        <input type="hidden" name="bulan" value="{{ $bulan }}">
        <input type="hidden" name="tahun" value="{{ $tahun }}">

        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                    <tr>
                        <th>Tanggal</th>
                        @foreach ($petugas as $p)
                            <th>{{ $p->nama_petugas }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>
                    @foreach ($hariKerja as $tgl)
                        <tr>
                            <td>{{ \Carbon\Carbon::parse($tgl)->format('d-m-Y') }}</td>

                            @foreach ($petugas as $p)
                                @php
                                    $dataHari = $absensi[$tgl] ?? collect();
                                    $hadir = $dataHari->firstWhere('petugas_id', $p->id);
                                @endphp



                                <td>
                                    <input type="checkbox" name="absen[{{ $tgl }}][{{ $p->id }}]"
                                        {{ $hadir ? 'checked' : '' }}>

                                </td>
                            @endforeach
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <button class="btn btn-success mt-3">Simpan Semua Perubahan</button>
    </form>
@endsection
