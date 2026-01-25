@extends('admin.layout.app')
@section('content')

<div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">
            <br>
            <br>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">

                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
                            <div class="text-left">
                                <button type="button" class="btn btn-primary mr-2" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">
                                    Tambah Data Baru
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
                                                        <form action="{{ route('admin.store.loket') }}" method="post">
                                                            @csrf
                                                            <div class="form-group">
                                                                <label for="t-text">Nomor Loket</label>
                                                                <input id="t-text" type="text" name="no_loket"
                                                                    placeholder="Nama......" class="form-control" required>
                                                            </div>
                                                            <div>
                                                                <label for="t-text">Nama Dinas</label>
                                                                <input id="t-text" type="text" name="dinas"
                                                                    placeholder="NIDN......" class="form-control" required>
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

                            <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>nomor Loket</th>
                                        <th>Nama Dinas</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <TBody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->no_loket }}</td>
                                            <td>{{ $item->dinas }}</td>
                                            <td>
                                                <a href="{{ route('admin.destroy.loket', $item->id) }}"><button
                                                        class="btn btn-primary mb-2 me-4 _effect--ripple waves-effect waves-light">HAPUS</button></a>
                                                <div class="text-left">
                                                    <button type="button" class="btn btn-primary mr-2"
                                                        data-bs-toggle="modal" data-bs-target="#Modaledit">
                                                        Edit Data
                                                    </button>
                                                </div>
                                                <!-- Modal -->
                                                <div class="modal fade" id="Modaledit" tabindex="-1" role="dialog"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalLabel">ini edit
                                                                    Pengisian</h5>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div
                                                                    class="col-xxl-12 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                                                                    <div class="card mt-3 mb-3">
                                                                        <div class="card-body">
                                                                            <form
                                                                                action="{{ route('admin.update.loket', $item->id) }}"
                                                                                method="post">
                                                                                @csrf
                                                                                <div class="form-group">
                                                                                    <label for="t-text">Nomor
                                                                                        Loket</label>
                                                                                    <input id="t-text" type="text"
                                                                                        name="no_loket"
                                                                                        value="{{ $item->no_loket }}"
                                                                                        placeholder="Nama......"
                                                                                        class="form-control" required>
                                                                                </div>
                                                                                <div>
                                                                                    <label for="t-text">Nama Dinas</label>
                                                                                    <input id="t-text" type="text"
                                                                                        name="dinas"
                                                                                        value="{{ $item->dinas }}"
                                                                                        placeholder="NIDN......"
                                                                                        class="form-control" required>
                                                                                </div>
                                                                                <br>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn btn-light-dark"
                                                                    data-bs-dismiss="modal"><i
                                                                        class="flaticon-cancel-12"></i> Discard</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </TBody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection
