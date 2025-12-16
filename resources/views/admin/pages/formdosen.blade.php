@extends('admin.layout.app')
@section('content')
    <div class="auth-container d-flex">

        <div class="container mx-auto align-self-center">

            <div class="row">

                <div class="col-xxl-12 col-xl-5 col-lg-5 col-md-8 col-12 d-flex flex-column align-self-center mx-auto">
                    <div class="card mt-3 mb-3">
                        <div class="card-body">
                            <form action="storeDosen" method="post">
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

    </div>

    </div>
@endsection
