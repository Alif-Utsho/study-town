@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Applications</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>E-Mail</th>
                            <th>Phone</th>
                            <th>City</th>
                            <th>Resident</th>
                            <th>Course</th>
                            <th>Message</th>
                            <th>Date</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($show_data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $value->name }}</td>
                            <td>{{ $value->email }}</td>
                            <td>{{ $value->phone }}</td>
                            <td>{{ $value->city }}</td>
                            <td>{{ $value->resident }}</td>
                            <td>{{ $value->course }}</td>
                            <td>{{ $value->message }}</td>

                            <td>{{ $value->created_at->format('d M Y') }}</td>
                            <td>
                                <button type="button" class="btn btn-outline-primary btn-sm border-0" data-toggle="modal" data-target="#exampleModal">
                                    <i class="fas fa-eye"></i>
                                </button>
                            </td>
                        </tr>

                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-lg" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Application Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Name:</strong> {{ $value->name }}</p>
                                        <p><strong>Email:</strong> {{ $value->email }}</p>
                                        <p><strong>Phone:</strong> {{ $value->phone }}</p>
                                        <p><strong>City:</strong> {{ $value->city }}</p>
                                        <p><strong>Resident Status:</strong> {{ $value->resident }}</p>
                                        <p><strong>Course:</strong> {{ $value->course }}</p>
                                        <p><strong>Message:</strong> {{ $value->message }}</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection