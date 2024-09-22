@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4 w-75 mx-auto">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Concern Add</h6>
            <a href="{{ route('concern.manage') }}" class="btn btn-sm btn-primary float-right">Manage Concern</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('concern.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf


                    <div class="form-group">
                        <label for="customFile">Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('image') is-invalid @enderror" id="customFile" name="image">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        @error('image')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>
    </div>


</div>


@endsection