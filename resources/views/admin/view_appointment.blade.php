@extends('layouts.adminLayout.admin_layout')
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
                            	@if(Session::has('message_error'))
                                    <div class="alert alert-error alert-block">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{!! session('message_error') !!}</strong>
                                    </div>
                                @endif
                                @if(Session::has('message_success'))
                                    <div class="alert alert-success alert-block">
                                        <button type="button" class="close" data-dismiss="alert">x</button>
                                        <strong>{!! session('message_success') !!}</strong>
                                    </div>
                                @endif
                                <h4 class="card-title">Data Table</h4>
                                <div class="table-responsive">
                                    <table class="table table-striped table-bordered zero-configuration">
                                        <thead>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Doctor Name</th>
                                                <th>Date</th>
                                                <th>Message</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($appointments as $appointment)

                                            <tr>
                                                <td>{{ $appointment->name }}</td>
                                                <td>{{ $appointment->email }}</td>
                                                <td>{{ $appointment->phone }}</td>
                                                <td>{{ $appointment->doctor }}</td>
                                                <td>{{ $appointment->date }}</td>
                                                <td>{{ $appointment->message }}</td>
                                                <td>{{ $appointment->status }}</td>
                                                <td><a onclick="return confirm('Are you sure?')" href="{{ url('/approve/'.$appointment->id) }}" class="btn btn-success">Approve</a>
                                                	<a onclick="return confirm('Are you sure?')" href="{{ url('/cancel/'.$appointment->id) }}" class="btn btn-danger">cancel</a>
                                                    <a href="{{ url('/send-mail/'.$appointment->id) }}" class="btn btn-primary">Email</a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Customer Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Doctor Name</th>
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