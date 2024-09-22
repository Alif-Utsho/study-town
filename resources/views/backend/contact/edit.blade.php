@extends('backend.layouts.master')
@section('title', 'Dashboard')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4 w-75 mx-auto">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">Contact Edit</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('contact.update', $contact->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id=" nameInput" name="name" value="{{ $contact->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="bioInput">Bio</label>
                        <textarea class="form-control editor @error('bio') is-invalid @enderror" id=" bioInput" name="bio">{{ $contact->bio }}</textarea>
                        @error('bio')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phoneInput">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id=" phoneInput" name="phone" value="{{ $contact->phone }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="emailInput">E-Mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id=" emailInput" name="email" value="{{ $contact->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="addressInput">Address</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id=" addressInput" name="address">{{ $contact->address }}</textarea>
                        @error('address')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="google_mapInput">Google Map (embedded)</label>
                        <textarea class="form-control @error('google_map') is-invalid @enderror" id=" google_mapInput" name="google_map">{{ $contact->google_map }}</textarea>
                        @error('google_map')
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