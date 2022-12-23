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
                                                <th>Dcotor Name</th>
                                                <th>Phone</th>
                                                <th>Speciality</th>
                                                <th>Room No</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	@foreach($doctors as $doctor)

                                            <tr>
                                                <td>{{ $doctor->name }}</td>
                                                <td>{{ $doctor->phone }}</td>
                                                <td>{{ $doctor->speciality }}</td>
                                                <td>{{ $doctor->room }}</td>
                                                <td><img src="admin/images/user/{{ $doctor->image }}" class=" rounded-circle mr-3" alt="" width="50px" height="50px"></td>
                                                <td><a href="{{ url('/edit-doctor/'.$doctor->id) }}" class="btn btn-primary">Edit </a>
                                                	<a onclick="return confirm('Are you sure?')" href="{{ url('/delete-doctor/'.$doctor->id) }}" class="btn btn-danger">Delete</a></td>
                                            </tr>
                                            @endforeach

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Dcotor Name</th>
                                                <th>Phone</th>
                                                <th>Speciality</th>
                                                <th>Room</th>
                                                <th>Image</th>
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