@extends('admin.layout.app')
@section('content')
    <div class="row">

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div id="html5-extension_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="dt--top-section">
                            <div class="row">


                            </div>
                        </div>
                        <div class="table-responsive">

                            {{-- untuk Menampilkan Pemilihan Bulan dan tahun --}}
                            <form method="GET" class="mb-3">
                                <div class="row g-2">
                                    <div class="col-md-3">
                                        <select name="bulan" class="form-control">
                                            @for ($i = 1; $i <= 12; $i++)
                                                <option value="{{ $i }}" {{ $bulan == $i ? 'selected' : '' }}>
                                                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <select name="tahun" class="form-control">
                                            @for ($y = now()->year; $y >= 2022; $y--)
                                                <option value="{{ $y }}" {{ $tahun == $y ? 'selected' : '' }}>
                                                    {{ $y }}
                                                </option>
                                            @endfor
                                        </select>
                                    </div>

                                    <div class="col-md-2">
                                        <button class="btn btn-primary">Tampilkan</button>
                                    </div>
                                </div>
                            </form>
                            <a href="{{ route('admin.absen.bulk.edit', [
                                'bulan' => $bulan,
                                'tahun' => $tahun,
                            ]) }}"
                                class="btn btn-warning mb-3">
                                Edit Absensi Bulan Ini
                            </a>


                            <table id="html5-extension" class="table dt-table-hover dataTable no-footer"
                                style="width: 100%;" role="grid" aria-describedby="html5-extension_info">
                                <thead class="table-light">
                                    <tr>
                                        <th>Loket</th>
                                        <th>Petugas</th>

                                        @foreach ($hariKerja as $tanggal)
                                            <th class="text-center">
                                                {{ \Carbon\Carbon::parse($tanggal)->format('d') }}
                                            </th>
                                        @endforeach

                                        <th class="text-center">Total</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    @foreach ($lokets as $loket)
                                        @foreach ($loket->petugas as $petugas)
                                            <tr>
                                                <td>{{ $loket->no_loket }}</td>
                                                <td>{{ $loket->dinas }}</td>

                                                @php $totalHadir = 0; @endphp

                                                @foreach ($hariKerja as $tanggal)
                                                    @php
                                                        $absen = $petugas->absensis->first(function ($a) use (
                                                            $tanggal,
                                                        ) {
                                                            return $a->tanggal->toDateString() === $tanggal;
                                                        });
                                                    @endphp

                                                    <td class="text-center">
                                                        @if ($absen)
                                                            <span class="text-success fw-bold">hadir</span>
                                                            @php $totalHadir++; @endphp
                                                        @else
                                                            <span class="text-muted">–</span>
                                                        @endif
                                                    </td>
                                                @endforeach

                                                <td class="fw-bold text-center">
                                                    {{ $totalHadir }}
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center table-responsive">
                            <table class="table table-bordered table-sm">

                            </table>



                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
