@extends('layouts.userLayout.user_layout')
@section('content')


        <!--**********************************
            Content body start
        ***********************************-->
        <div class="content-body">

            <div class="row page-titles mx-0">
                <div class="col p-md-0">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Dashboard</a></li>
                        <li class="breadcrumb-item active"><a href="javascript:void(0)">Home</a></li>
                    </ol>
                </div>
            </div>
            <!-- row -->

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Doctor's Name</th>
                                                <th>Date</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($appointments as $appointment)
                                            <tr>
                                                <td>{{$appointment->doctor}}</td>
                                                <td>{{$appointment->date}}</td>
                                                <td>{{$appointment->message}}</td>
                                                <td>{{$appointment->status}}</td>
                                                <td><a onclick="return confirm('Are you sure you want to delete this?')" href="{{ url('/cancel-appointment/'.$appointment->id) }}" class="btn btn-danger">cancel appointment</a></td>

                                            </tr>
											@endforeach
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Doctor's Name</th>
                                                <th>Date</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!--**********************************
            Content body end
        ***********************************-->





  

@endsection

