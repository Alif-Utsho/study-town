@extends('backend.layouts.master')
@section('title', 'User Edit')
@section('content')


<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800"></h1>

    <div class="card shadow mb-4 w-75 mx-auto">
        <div class="card-header py-3 d-flex justify-content-between align-items-center">
            <h6 class="m-0 font-weight-bold text-primary">User Edit</h6>
            <a href="{{ route('user.manage') }}" class="btn btn-sm btn-primary float-right">Manage User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form action="{{ route('user.update', $user->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="nameInput">Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="nameInput" placeholder="Enter name" name="name" value="{{ $user->name }}">
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="emailInput">Email address</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="emailInput" placeholder="Enter email" name="email" value="{{ $user->email }}">
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="phoneInput">Phone</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="phoneInput" placeholder="Enter phone" name="phone" value="{{ $user->phone }}">
                        @error('phone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="passwordInput">Password</label>
                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="passwordInput" aria-describedby="passwordHelp" placeholder="Password" name="password">
                        <small id="passwordHelp" class="form-text text-muted">Fillup only if want to change Password</small>
                        @error('password')
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