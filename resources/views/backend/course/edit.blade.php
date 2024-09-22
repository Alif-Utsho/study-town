@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4 w-75 mx-auto">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Course Edit</h6>
            <a href="{{ route('course.manage') }}" class="btn btn-sm btn-primary float-right">Manage Course</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('course.update', $course->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id=" nameInput" name="name" value="{{ $course->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="customFile">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img src="{{ asset($course->image) }}" width="150" alt="">
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <input type="checkbox" id="statusInput" name="front_view" {{ $course->front_view ? 'checked' : '' }}>
                        <label for="statusInput">Front View</label>
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>


</div>


@endsection