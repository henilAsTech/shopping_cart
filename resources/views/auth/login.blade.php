@extends('layouts.auth')

@section('title','Sign-In')

@section('content')
    <div class="align-self-center">
        <div class="sign-in-from">
            <h1 class="mb-0">Sign in</h1>
            <p>Enter your email address and password to access panel.</p>
            <form class="mt-4" method="POST" action="{{ route('login') }}" id="myForm">
                @csrf
                <h4>
                    <div class="form-group">
                        <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline ml-5">
                            <input type="radio" id="user" name="role" class="custom-control-input bg-primary" value="0" {{ old('role',0) == '0' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="user"> User </label>
                        </div>
                        <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                            <input type="radio" id="admin" name="role" class="custom-control-input bg-primary" value="1" {{ old('role') == '1' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="admin"> Admin </label>
                        </div>
                        <div class="custom-control custom-radio custom-radio-color-checked custom-control-inline">
                            <input type="radio" id="superAdmin" name="role" class="custom-control-input bg-primary" value="2" {{ old('role') == '2' ? 'checked' : '' }}>
                            <label class="custom-control-label" for="superAdmin"> Super Admin </label>
                        </div>
                    </div>
                </h4>
                <div class="form-group">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email" value="{{ old('email', 'user@gmail.com') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control mb-0" id="password" name="password" placeholder="Password" value="Test@123">
                </div>
                <div class="d-inline-block w-100">
                    <button type="submit" class="btn btn-primary float-right">
                        <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>
                        Sign in
                    </button>
                </div>
                Don't have account? <a href="{{ route('register') }}" class="float-center">click here to Create an Account</a><br>
                No need to sign in you see the product on <a href="{{ route('product') }}" class="float-center">Click here</a>
            </form>
        </div>
    </div>
@endsection