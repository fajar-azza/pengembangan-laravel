@extends('admin.layout.app')
@section('content')

<div class="container">

    <div class="container">

        <!-- BREADCRUMB -->
        <div class="page-meta">
            <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Form</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Basic</li>
                </ol>
            </nav>
        </div>
        <!-- /BREADCRUMB -->

        <div class="row layout-top-spacing">

            <div id="basic" class="col-lg-12 layout-spacing">
                <div class="statbox widget box box-shadow">
                    <div class="widget-header">
                        <div class="row">
                            <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                <h4>Input Text</h4>
                                <a href="/../dosen"><button
                                        class="btn btn-primary mb-2 me-4 _effect--ripple waves-effect waves-light">Kembali</button></a>
                                </td>
                            </div>
                        </div>
                    </div>
                    <div class="widget-content widget-content-area">

                        <div class="row">
                            <div class="col-lg-6 col-12 ">
                                <form action="{{route('admin.update.dosen', $dosen->id) }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <p>Use input <code>type="text"</code>.</p>
                                        <label for="t-text">Nama</label>
                                        <input id="t-text" type="text" name="nama" value="{{ $dosen->nama }}"
                                            placeholder="Nama......" class="form-control" required>

                                    </div>
                                    <div>
                                        <label for="t-text">NIDN</label>
                                        <input id="t-text" type="text" name="nidn" value="{{ $dosen->nidn }}"
                                            placeholder="NIDN......" class="form-control" required>

                                    </div>
                                    <div>
                                        <label for="t-text">Alamat</label>
                                        <input id="t-text" type="text" name="alamat" value="{{ $dosen->alamat }}"
                                            placeholder="Alamat......" class="form-control" required>

                                    </div>
                                    <div>
                                        <label for="t-text">No Hp</label>
                                        <input id="t-text" type="text" name="hp" value="{{ $dosen->hp }}"
                                            placeholder="No HP......" class="form-control" required>


                                    </div>
                                    <br>

                                    <div>

                                        <button
                                            class="btn btn-primary mb-2 me-4 btn-lg _effect--ripple waves-effect waves-light"
                                            type="submit">Submit</button>
                                    </div>
                            </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>



    </div>
</div>
</div>
</div>


</div>


@endsection