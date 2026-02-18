@extends('admin.layout.app')
@section('content')
    <div class="row layout-spacing">
        <div class="col-lg-12">
            <div class="statbox widget box box-shadow">
                <div class="widget-content widget-content-area">
                    <div id="style-2_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer">
                        <div class="dt--top-section">
                            <div class="row">
                                <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                                    <div class="dataTables_length" id="style-2_length"><label>Results : <select
                                                name="style-2_length" aria-controls="style-2" class="form-control">
                                                <option value="5">5</option>
                                                <option value="10">10</option>
                                                <option value="20">20</option>
                                                <option value="50">50</option>
                                            </select></label></div>
                                </div>
                                <div
                                    class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                                    <div id="style-2_filter" class="dataTables_filter"><label><svg
                                                xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                                stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-search">
                                                <circle cx="11" cy="11" r="8"></circle>
                                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                            </svg><input type="search" class="form-control" placeholder="Search..."
                                                aria-controls="style-2"></label></div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="style-2" class="table style-2 dt-table-hover dataTable no-footer" role="grid"
                                aria-describedby="style-2_info" style="width: 1222px;">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="style-2" rowspan="1"
                                            colspan="1" aria-label="First Name: activate to sort column ascending"
                                            style="width: 80px;">No</th>
                                        <th class="sorting" tabindex="0" aria-controls="style-2" rowspan="1"
                                            colspan="1" aria-label="First Name: activate to sort column ascending"
                                            style="width: 80px;">Loket</th>
                                        <th class="sorting" tabindex="0" aria-controls="style-2" rowspan="1"
                                            colspan="1" aria-label="Last Name: activate to sort column ascending"
                                            style="width: 104px;">Nama Dinas</th>
                                        <th class="sorting" tabindex="0" aria-controls="style-2" rowspan="1"
                                            colspan="1" aria-label="Email: activate to sort column ascending"
                                            style="width: 177px;">Jam Petugas</th>
                                        <th class="sorting" tabindex="0" aria-controls="style-2" rowspan="1"
                                            colspan="1" aria-label="Mobile No.: activate to sort column ascending"
                                            style="width: 130px;">Jam Masuk</th>
                                        <th class="text-center sorting" tabindex="0" aria-controls="style-2"
                                            rowspan="1" colspan="1"
                                            aria-label="Status: activate to sort column ascending" style="width: 103px;">
                                            Jam keluar</th>
                                        <th class="text-center dt-no-sorting sorting" tabindex="0" aria-controls="style-2"
                                            rowspan="1" colspan="1"
                                            aria-label="Action: activate to sort column ascending" style="width: 68px;">
                                            Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($lokets as $loket)
                                        @php
                                            $aktif = false;
                                            $petugasAktif = null;

                                            foreach ($loket->petugas as $petugas) {
                                                if (
                                                    $petugas->absensiHariIni &&
                                                    $petugas->absensiHariIni->jam_masuk &&
                                                    !$petugas->absensiHariIni->jam_pulang
                                                ) {
                                                    $aktif = true;
                                                    $petugasAktif = $petugas;
                                                    break;
                                                }
                                            }
                                        @endphp
                                        <tr role="row" class="odd">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $loket->no_loket }}</td>
                                            <td>{{ $loket->dinas }}</td>
                                            <td> {{ $aktif ? $petugasAktif->nama_petugas : '-' }}</td>
                                            <td>{{ $aktif ? $petugasAktif->absensiHariIni->jam_masuk : '-' }}</td>
                                            <td>jam keluar</td>
                                            <td class="text-center">
                                                @if ($aktif)
                                                    <span class="badge bg-success">AKTIF</span>
                                                @else
                                                    <span class="badge bg-danger">TIDAK AKTIF</span>
                                                @endif
                                            </td>
                                        </tr>
                                </tbody>
                                @endforeach
                            </table>
                        </div>
                        <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                            <div class="dt--pages-count  mb-sm-0 mb-3">
                                <div class="dataTables_info" id="style-2_info" role="status" aria-live="polite">Showing
                                    page 1 of 1</div>
                            </div>
                            <div class="dt--pagination">
                                <div class="dataTables_paginate paging_simple_numbers" id="style-2_paginate">
                                    <ul class="pagination">
                                        <li class="paginate_button page-item previous disabled" id="style-2_previous"><a
                                                href="#" aria-controls="style-2" data-dt-idx="0" tabindex="0"
                                                class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-arrow-left">
                                                    <line x1="19" y1="12" x2="5" y2="12">
                                                    </line>
                                                    <polyline points="12 19 5 12 12 5"></polyline>
                                                </svg></a></li>
                                        <li class="paginate_button page-item active"><a href="#"
                                                aria-controls="style-2" data-dt-idx="1" tabindex="0"
                                                class="page-link">1</a></li>
                                        <li class="paginate_button page-item next disabled" id="style-2_next"><a
                                                href="#" aria-controls="style-2" data-dt-idx="2" tabindex="0"
                                                class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                    stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                                    stroke-linejoin="round" class="feather feather-arrow-right">
                                                    <line x1="5" y1="12" x2="19" y2="12">
                                                    </line>
                                                    <polyline points="12 5 19 12 12 19"></polyline>
                                                </svg></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
