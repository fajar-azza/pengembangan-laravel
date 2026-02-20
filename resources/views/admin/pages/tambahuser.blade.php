@extends('admin.layout.app')
@section('content')
<div class="layout-px-spacing">
    <div class="row layout-top-spacing">
        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                    <div class="dt--top-section">
                        <div class="row">
                            <div class="text-left">
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Data Petugas
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Form Pengisian</h5>
                                        </div>
                                        <div class="modal-body">
                                            <div
                                                class="col-xxl-12 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                                                <div class="card mt-3 mb-3">
                                                    <div class="card-body">

                                                        <form action="{{ route('admin.petugas.store') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="t-text">NIK</label>
                                                                <input id="t-text" type="text" name="nik"
                                                                    placeholder="nik......" class="form-control" required>
                                                            </div>
                                                            <div>
                                                                <label for="t-text">Nama Petugas</label>
                                                                <input id="t-text" type="text" name="nama_petugas"
                                                                    placeholder="Nama......" class="form-control" required>
                                                            </div>
                                                            <div>
                                                                <label for="t-text">Nama Loket</label>
                                                                <select name="loket_id">
                                                                    @foreach ($lokets as $loket)
                                                                        <option value="{{ $loket->id }}">
                                                                            {{ $loket->no_loket }}</option>
                                                                    @endforeach
                                                                </select>
                                                            </div>
                                                            <div>
                                                                <label for="t-text">Username</label>
                                                                <input id="t-text" type="text" name="email"
                                                                    placeholder="Username......" class="form-control"
                                                                    required>
                                                            </div>
                                                            <div>
                                                                <label for="t-text">Password</label>
                                                                <input id="t-text" type="text" name="password"
                                                                    placeholder="password......" class="form-control"
                                                                    required>
                                                            </div>
                                                            <br>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn btn-light-dark" data-bs-dismiss="modal"><i
                                                    class="flaticon-cancel-12"></i> Discard</button>
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                        </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table id="zero-config" class="table table-striped dt-table-hover dataTable" style="width: 100%;"
                            role="grid" aria-describedby="zero-config_info">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-sort="ascending"
                                        aria-label="Name: activate to sort column descending" style="width: 10px;">No
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Position: activate to sort column ascending"
                                        style="width: 198px;">Nik</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Office: activate to sort column ascending"
                                        style="width: 191px;">Nama Petugas</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Age: activate to sort column ascending"
                                        style="width: 30px;">Loket </th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Start date: activate to sort column ascending"
                                        style="width: 77px;">Aksi</th>
                                    <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                        colspan="1" aria-label="Salary: activate to sort column ascending"
                                        style="width: 75px;"></th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($petugas as $item)
                                    <tr role="row">

                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $item->nik }}</td>
                                        <td>{{ $item->nama_petugas }}</td>
                                        <td>{{ $item->loket_id }}</td>
                                        <td>
                                            <div class="d-flex align-items-center gap-2">
                                                <a href="{{ route('admin.destroy.petugas', $item->id) }}"
                                                    class="btn btn-primary me-4 _effect--ripple waves-effect waves-light">Hapus</button></a>

                                                <button type="button" class="btn btn-warning mr-2"
                                                    data-bs-toggle="modal" data-bs-target="#PetugasEdit">
                                                    Edit
                                                </button>
                                            </div>
                                            <!-- Modal -->
                                            <div class="modal fade" id="PetugasEdit" tabindex="-1" role="dialog"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data
                                                                Loket</h5>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div
                                                                class="col-xxl-12 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                                                                <div class="card mt-3 mb-3">
                                                                    <div class="card-body">
                                                                        <form action="{{ route('admin.update.petugas',$item->id) }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="form-group">
                                                                                <label for="t-text">NIK</label>
                                                                                <input id="t-text" type="text"
                                                                                    name="nik" 
                                                                                    value="{{ $item->nik }}"
                                                                                    placeholder="nik......"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div>
                                                                                <label for="t-text">Nama Petugas</label>
                                                                                <input id="t-text" type="text"
                                                                                    name="nama_petugas"
                                                                                    value="{{ $item->nama_petugas }}"
                                                                                    placeholder="Nama......"
                                                                                    class="form-control" required>
                                                                            </div>
                                                                            <div>
                                                                                <label for="t-text">Nama Loket</label>
                                                                                <select name="loket_id">
                                                                                    @foreach ($lokets as $loket)
                                                                                        <option
                                                                                            value="{{ $loket->id }}">
                                                                                            {{ $loket->no_loket }}</option>
                                                                                    @endforeach
                                                                                </select>
                                                                            </div>
                                                                            <br>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>
                                                        <div class="modal-footer">
                                                            <button class="btn btn btn-danger" data-bs-dismiss="modal"><i
                                                                    class="flaticon-cancel-12"></i>Batal</button>
                                                            <button type="submit" class="btn btn-success">Simpan</button>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th rowspan="1" colspan="1">No</th>
                                    <th rowspan="1" colspan="1">Nik</th>
                                    <th rowspan="1" colspan="1">Nama Petugas</th>
                                    <th rowspan="1" colspan="1">Loket</th>
                                    <th rowspan="1" colspan="1">Aksi</th>
                                    <th rowspan="1" colspan="1"></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="dt--bottom-section d-sm-flex justify-content-sm-between text-center">
                        <div class="dt--pages-count  mb-sm-0 mb-3">
                            <div class="dataTables_info" id="zero-config_info" role="status" aria-live="polite">Showing
                                page 1 of 1</div>
                        </div>
                        <div class="dt--pagination">
                            <div class="dataTables_paginate paging_simple_numbers" id="zero-config_paginate">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous disabled" id="zero-config_previous"><a
                                            href="#" aria-controls="zero-config" data-dt-idx="0" tabindex="0"
                                            class="page-link"><svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-arrow-left">
                                                <line x1="19" y1="12" x2="5" y2="12">
                                                </line>
                                                <polyline points="12 19 5 12 12 5"></polyline>
                                            </svg></a></li>
                                    <li class="paginate_button page-item active"><a href="#"
                                            aria-controls="zero-config" data-dt-idx="1" tabindex="0"
                                            class="page-link">1</a></li>

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
