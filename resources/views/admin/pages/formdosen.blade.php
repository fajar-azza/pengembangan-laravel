@extends('admin.layout.app')
@section('content')

<div class="container">
                 
                        <div id="basic" class="col-lg-12 layout-spacing">
                            <div class="statbox widget box box-shadow">
                                <div class="widget-header">
                                    <div class="row">
                                        <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                            <h4>Input Text</h4>
                                        </div>                 
                                    </div>
                                </div>
                                <div class="widget-content widget-content-area">

                                    <div class="row">
                                        <div class="col-lg-6 col-12 ">
                                            <form action="storeDosen" method="post">
                                                @csrf
                                                <div class="form-group">
                                                    <p>Use input <code>type="text"</code>.</p>
                                                     <label for="t-text" >Nama</label>
                                                    <input id="t-text" type="text" name="nama" placeholder="Nama......" class="form-control" required>
                                                    
                                                    </div>
                                                    <div>
                                                    <label for="t-text" >NIDN</label>
                                                    <input id="t-text" type="text" name="nidn" placeholder="NIDN......" class="form-control" required>
                                                    
                                                    </div>
                                                    <div>
                                                    <label for="t-text" >Alamat</label>
                                                    <input id="t-text" type="text" name="alamat" placeholder="Alamat......" class="form-control" required>
                                                    
                                                    </div>
                                                    <div>
                                                    <label for="t-text" >No Hp</label>
                                                    <input id="t-text" type="text" name="hp" placeholder="No HP......" class="form-control" required>
                                                       

                                                    </div>
                                                    <br>
                                                        
                                                    <div>
                                            
                                                    <button class="btn btn-primary mb-2 me-4 btn-lg _effect--ripple waves-effect waves-light" type="submit">Create</button>
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