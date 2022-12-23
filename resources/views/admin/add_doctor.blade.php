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

                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-body">

                                @if($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
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
                                <div class="form-validation">
                                    <form class="form-valide" action="{{ url('/add_doctor') }}" method="post" enctype="multipart/form-data">{{ csrf_field() }}
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-name">Doctor's Name <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-name" name="name" placeholder="Enter a name.." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-phoneus">Phone (NG) <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="number" class="form-control" id="val-phoneus" name="phone" placeholder="0902-999-0000" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-speciality">Speciality <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <select class="form-control" id="val-speciality" name="speciality" required>
                                                    <option value="">Please select</option>
                                                    <option value="general">General Health</option>
                                                    <option value="cardiology">Cardiology</option>
                                                    <option value="dental">Dental</option>
                                                    <option value="neurology">Neurology</option>
                                                    <option value="orthopaedics">Orthopaedics</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-room">Room <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="text" class="form-control" id="val-room" name="room" placeholder="Enter a room no.." required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class="col-lg-4 col-form-label" for="val-image">Doctor Image <span class="text-danger">*</span>
                                            </label>
                                            <div class="col-lg-6">
                                                <input type="file" id="val-image" name="image" class="form-control-file" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-lg-8 ml-auto">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
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