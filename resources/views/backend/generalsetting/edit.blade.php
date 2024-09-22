@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4 w-75 mx-auto">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">About Edit</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('generalsetting.update', $generalsetting->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id=" nameInput" name="name" value="{{ $generalsetting->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="customFile">Logo</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('logo') is-invalid @enderror" id="customFile" name="logo">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img src="{{ asset($generalsetting->logo) }}" width="150" alt="">
                        @error('logo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="customFileFav">Fav Icon</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('favicon') is-invalid @enderror" id="customFileFav" name="favicon">
                            <label class="custom-file-label" for="customFileFav">Choose file</label>
                        </div>
                        <img src="{{ asset($generalsetting->favicon) }}" width="150" alt="">
                        @error('favicon')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Update</button>
                </form>

            </div>
        </div>
    </div>


</div>


@endsection