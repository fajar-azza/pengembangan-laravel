@extends('admin.layout.app')
@section('content')

<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <div id="zero-config_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="dt--top-section">
                    <div class="row">
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center">
                            <div class="dataTables_length" id="zero-config_length"><label>Results : <select
                                        name="zero-config_length" aria-controls="zero-config" class="form-control">
                                        <option value="7">7</option>
                                        <option value="10">10</option>
                                        <option value="20">20</option>
                                        <option value="50">50</option>
                                    </select></label></div>
                        </div>
                        <div class="col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3">
                            <div id="zero-config_filter" class="dataTables_filter"><label><svg
                                        xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg><input type="search" class="form-control" placeholder="Search..."
                                        aria-controls="zero-config"></label></div>
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
                                    aria-label="Name: activate to sort column descending" style="width: 101px;">Name
                                </th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                    colspan="1" aria-label="Position: activate to sort column ascending"
                                    style="width: 198px;">Position</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                    colspan="1" aria-label="Office: activate to sort column ascending"
                                    style="width: 91px;">Office</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                    colspan="1" aria-label="Age: activate to sort column ascending"
                                    style="width: 30px;">Age</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                    colspan="1" aria-label="Start date: activate to sort column ascending"
                                    style="width: 77px;">Start date</th>
                                <th class="sorting" tabindex="0" aria-controls="zero-config" rowspan="1"
                                    colspan="1" aria-label="Salary: activate to sort column ascending"
                                    style="width: 75px;">Salary</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr role="row">
                                <td class="sorting_1">
                                    <div class="d-flex">
                                        <div class="usr-img-frame me-2 rounded-circle">
                                            <img alt="avatar" class="img-fluid rounded-circle"
                                                src="../src/assets/img/girl-3.png">
                                        </div>
                                        <p class="align-self-center mb-0 admin-name"> Haley </p>
                                    </div>
                                </td>
                                <td>Senior Marketing Designer</td>
                                <td>London</td>
                                <td>43</td>
                                <td>2012/12/18</td>
                                <td>$313,500</td>
                            </tr>
                        </tbody>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">Name</th>
                                <th rowspan="1" colspan="1">Position</th>
                                <th rowspan="1" colspan="1">Office</th>
                                <th rowspan="1" colspan="1">Age</th>
                                <th rowspan="1" colspan="1">Start date</th>
                                <th rowspan="1" colspan="1">Salary</th>
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
@endsection