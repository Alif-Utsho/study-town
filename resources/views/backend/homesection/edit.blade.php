@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4 w-75 mx-auto">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Home Sections Edit</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('homesection.update', $homesection->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="titleInput">Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id=" titleInput" name="title" value="{{ $homesection->title }}">
                        @error('title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>


                    <div class="form-group">
                        <label for="customFile">Banner</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('banner') is-invalid @enderror" id="customFile" name="banner">
                            <label class="custom-file-label" for="customFile">Choose file</label>
                        </div>
                        <img src="{{ asset($homesection->banner) }}" width="150" alt="">
                        @error('banner')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="my-4 border border-2 bg-dark" style="line-height: 5px;">&nbsp;</div>

                    <div class="form-group">
                        <label for="about_titleInput">About Title</label>
                        <input type="text" class="form-control @error('about_title') is-invalid @enderror" id=" about_titleInput" name="about_title" value="{{ $homesection->about_title }}">
                        @error('about_title')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="about_textInput">About Details</label>
                        <textarea class="form-control editor @error('about_text') is-invalid @enderror" id=" about_textInput" name="about_text">{{ $homesection->about_text }}</textarea>
                        @error('about_text')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="customFileFav">About Image</label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('about_image') is-invalid @enderror" id="customFileFav" name="about_image">
                            <label class="custom-file-label" for="customFileFav">Choose file</label>
                        </div>
                        <img src="{{ asset($homesection->about_image) }}" width="150" alt="">
                        @error('about_image')
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