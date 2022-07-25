@extends('admin.layouts.admin')
@section('content')
    <div class="container-fluid disable-text-selection">
        <div class="row">
            <div class="col-12">
                <div class="mb-3 d-flex align-items-center justify-content-between">
                    <h1 class="m-0 p-0">Certificates</h1>
                    <div class="btn_group">
                        <a href="#" class="btn btn_secondary mr-2" data-toggle="modal" data-backdrop="static"
                            data-target="#exampleModalRight">Filter</a>
                        <a href="#" class="btn btn_primary">Export Excel</a>
                    </div>
                </div>

                <div class="separator mb-5"></div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <div class="card recent_certificate">
                    <div class="card-body">
                        <div class="data_card">
                            <div class="table-responsive">
                                <table class="table table-bordered mb-0">
                                    <thead>
                                        <tr>
                                            <th scope="col">
                                                Certificate No
                                            </th>
                                            <th scope="col">Test</th>
                                            <th scope="col">Item 1</th>
                                            <th scope="col">Item 2</th>
                                            <th scope="col">Lot 1</th>
                                            <th scope="col">Lot 2</th>
                                            <th scope="col">
                                                Uploaded Date
                                            </th>
                                            <th scope="col">
                                                Uploaded User
                                            </th>
                                            <th scope="col">
                                                No of Downloads
                                            </th>
                                            <th scope="col">
                                                No of Views
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>
                                                <a href="certificate_view.html">170322</a>
                                            </td>
                                            <td>AE220326P</td>
                                            <td>76184040G0</td>
                                            <td>76184040G1</td>
                                            <td>SBV4410007</td>
                                            <td>SBV4410005</td>
                                            <td>30/06/2022</td>
                                            <td>Jacob</td>
                                            <td>25</td>
                                            <td>38</td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <a href="certificate_view.html">170450</a>
                                            </td>
                                            <td>AE220326P</td>
                                            <td>76184040G0</td>
                                            <td>76184040G2</td>
                                            <td>SBV4410007</td>
                                            <td>SBV4410006</td>
                                            <td>28/06/2022</td>
                                            <td>Mark</td>
                                            <td>55</td>
                                            <td>29</td>
                                        </tr>

                                        <tr>
                                            <td>
                                                <a href="certificate_view.html">170322</a>
                                            </td>
                                            <td>AE220326P</td>
                                            <td>76184040G0</td>
                                            <td>76184040G5</td>
                                            <td>SBV4410007</td>
                                            <td>SBV4410007</td>
                                            <td>30/06/2022</td>
                                            <td>Jacob</td>
                                            <td>25</td>
                                            <td>24</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade modal-right" id="exampleModalRight" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalRight" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Filter By Certificates</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label>User</label>
                            <select class="form-control" id="exampleFormControlSelect1">
                                <option>Select User</option>
                                @if ($users)
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Start Date</label>
                            <input type="text" class="form-control datepicker" placeholder="Select Start Date">
                        </div>
                        <div class="form-group">
                            <label>End Date</label>
                            <input type="text" class="form-control datepicker" placeholder="Select End Date">
                        </div>
                    </form>
                </div>
                <div class="modal-footer justify-content-start">
                    <button type="button" data-dismiss="modal" class="btn btn_primary">Submit</button>
                </div>
            </div>
        </div>
    </div>
@endsection
