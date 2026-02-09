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
                            <table id="html5-extension" class="table dt-table-hover dataTable no-footer" style="width: 100%;"
                                role="grid" aria-describedby="html5-extension_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_asc" tabindex="0" aria-controls="html5-extension"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="Name: activate to sort column descending" style="width: 129px;">Name
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Position: activate to sort column ascending"
                                            style="width: 198px;">Position</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Office: activate to sort column ascending"
                                            style="width: 91px;">Office</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Age: activate to sort column ascending"
                                            style="width: 30px;">Age</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Start date: activate to sort column ascending"
                                            style="width: 77px;">Start date</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Salary: activate to sort column ascending"
                                            style="width: 75px;">Salary</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Extn.: activate to sort column ascending"
                                            style="width: 38px;">Extn.</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Avatar: activate to sort column ascending"
                                            style="width: 49px;">
                                            Avatar</th>
                                        <th class="sorting" tabindex="0" aria-controls="html5-extension" rowspan="1"
                                            colspan="1" aria-label="Action: activate to sort column ascending"
                                            style="width: 92px;">
                                            Action</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr role="row">
                                        <td class="sorting_1">Airi Satou</td>
                                        <td>Accountant</td>
                                        <td>Tokyo</td>
                                        <td>33</td>
                                        <td>2008/11/28</td>
                                        <td>$162,700</td>
                                        <td>5407</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="usr-img-frame mr-2 rounded-circle">
                                                    <img alt="avatar" class="img-fluid rounded-circle"
                                                        src="../src/assets/img/girl-1.png">
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button"
                                                    class="btn btn-dark btn-sm _effect--ripple waves-effect waves-light">Open</button>
                                                <button type="button"
                                                    class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split _effect--ripple waves-effect waves-light"
                                                    id="dropdownMenuReference5" data-bs-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false" data-reference="parent">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                        viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                        stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                        class="feather feather-chevron-down">
                                                        <polyline points="6 9 12 15 18 9"></polyline>
                                                    </svg>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5"
                                                    style="">
                                                    <a class="dropdown-item" href="#">Action</a>
                                                    <a class="dropdown-item" href="#">Another action</a>
                                                    <a class="dropdown-item" href="#">Something else here</a>
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item" href="#">Separated link</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                            <table class="table table-bordered table-sm">
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
                                                <td>{{ $petugas->nama_petugas }}</td>

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
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
