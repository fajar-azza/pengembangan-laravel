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
                                    Launch modal
                                </button>
                            </div>
                            <!-- Modal -->
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close">
                                                <svg> ... </svg>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">

                <div class="col-xxl-12 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <form action="{{route('admin.store.dosen')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <p>Use input <code>type="text"</code>.</p>
                                    <label for="t-text">Nama</label>
                                    <input id="t-text" type="text" name="nama" placeholder="Nama......"
                                        class="form-control" required>

                                </div>
                                <div>
                                    <label for="t-text">NIDN</label>
                                    <input id="t-text" type="text" name="nidn" placeholder="NIDN......"
                                        class="form-control" required>

                                </div>
                                <div>
                                    <label for="t-text">Alamat</label>
                                    <input id="t-text" type="text" name="alamat" placeholder="Alamat......"
                                        class="form-control" required>

                                </div>
                                <div>
                                    <label for="t-text">No Hp</label>
                                    <input id="t-text" type="text" name="hp" placeholder="No HP......"
                                        class="form-control" required>


                                </div>
                                <br>

                                <div>

                                    <button
                                        class="btn btn-primary mb-2 me-4 btn-lg _effect--ripple waves-effect waves-light"
                                        type="submit">Create</button>
                                </div>
                        </div>
                        </form>


                    </div>
                </div>
            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button class="btn btn btn-light-dark" data-bs-dismiss="modal"><i
                                                    class="flaticon-cancel-12"></i> Discard</button>
                                            <button type="button" class="btn btn-primary">Save</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <table id="html5-extension" class="table dt-table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>NIDN</th>
                                        <th>alamat</th>
                                        <th>HP</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <TBody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->nidn }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->hp }}</td>
                                            <td>
                                                <a href="{{ route('admin.destroy.dosen', $item->id) }}"><button
                                                        class="btn btn-primary mb-2 me-4 _effect--ripple waves-effect waves-light">HAPUS</button></a>
                                                <a href="{{ route('admin.edit.dosen', $item->id) }}"><button
                                                        class="btn btn-primary mb-2 me-4 _effect--ripple waves-effect waves-light">EDIT</button></a>
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
