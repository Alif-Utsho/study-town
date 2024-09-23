@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Social Icons Manage</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Social Icons</h6>
            <a href="{{ route('socialicon.create') }}" class="btn btn-sm btn-primary float-right">Create New</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Logo</th>
                            <th>Link</th>
                            <th>Status</th>
                            <th>Update</th>
                            <th></th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($show_data as $value)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td><img src="{{ asset($value->logo) }}" width="50" alt=""> </td>
                            <td>{{ $value->link }}</td>
                            <td>
                                @if($value->status) <div class="badge badge-success">Active</div>
                                @else <div class="badge badge-danger">Inactive</div>
                                @endif
                            </td>
                            <td>{{ $value->updated_at->format('d M Y') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-outline-secondary btn-sm dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Action
                                    </button>
                                    <div class="dropdown-menu">
                                        @if($value->status)
                                        <a class="dropdown-item" href="{{ route('socialicon.toggleStatus', $value->id) }}">
                                            <i class="fa fa-thumbs-down"></i> Inactive
                                        </a>
                                        @else
                                        <a class="dropdown-item" href="{{ route('socialicon.toggleStatus', $value->id) }}">
                                            <i class="fa fa-thumbs-up"></i> Active
                                        </a>
                                        @endif
                                        <a class="dropdown-item" href="{{ route('socialicon.edit', $value->id) }}">
                                            <i class="fa fa-edit"></i> Edit
                                        </a>
                                        <a class="dropdown-item text-danger" href="{{ route('socialicon.delete', $value->id) }}" onclick="return confirm('Are you sure you want to delete this socialicon?')">
                                            <i class="fa fa-trash-alt"></i> Delete
                                        </a>
                                    </div>
                                </div>
                            </td>

                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>


@endsection