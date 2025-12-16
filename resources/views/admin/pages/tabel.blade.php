@extends('admin.layout.app')
@section('content')
    <div class="layout-px-spacing">

        <div class="middle-content container-xxl p-0">

            <!-- BREADCRUMB -->
            <div class="page-meta">
                <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Datatables</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Miscellaneous</li>
                    </ol>
                </nav>
            </div>
            <!-- /BREADCRUMB -->



            <div class="seperator-header">
                <h4 class="">HTML5 Export</h4>
            </div>

            <div class="row">

                <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                    <div class="statbox widget box box-shadow">
                        <div class="widget-content widget-content-area">
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
                                                <a href="destroydosen/{{ $item->id }}"><button
                                                        class="btn btn-primary mb-2 me-4 _effect--ripple waves-effect waves-light">HAPUS</button></a>
                                                |<a href="editdosen/{{ $item->id }}"><button
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
