@extends('layouts.auth')

@section('title','Sign-Up')

@section('content')
    <div class="align-self-center">
        <div class="sign-in-from">
            @php
                $segments = Request::segments();
                $secondToLast = isset($segments[count($segments) - 2]) ? $segments[count($segments) - 2] : null;
            @endphp

            <h1 class="mb-0">Sign in</h1>
            <p>Create an New Account</p>
            <form class="mt-4" method="POST" action="{{ route('register') }}" id="myForm">
                @csrf

                <input type="hidden" id="user" name="role" value="{{ $secondToLast == null ? '0' : ($secondToLast== 'admin' ? '1' : '2') }}">
                <div class="form-group">
                    <label for="name">Full Name</label> <span class="error"> *</span>
                    <input type="text" class="form-control mb-0" id="name" name="name" placeholder="John Doe" value="{{ old('name', 'John Doe') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email address</label><span class="error"> *</span>
                    <input type="email" class="form-control mb-0" id="email" name="email" placeholder="john@gmail.com" value="{{ old('email', 'user@gmail.com') }}">
                </div>
                <div class="form-group">
                    <label for="password">Password</label> <span class="error"> *</span>
                    <input type="password" class="form-control mb-0" id="password" name="password" placeholder="password" value="Test@123">
                </div>
                <div class="form-group">
                    <label for="cpassword">Confirm Password</label> <span class="error"> *</span>
                    <input type="password" class="form-control mb-0" id="cpassword" name="password_confirmation" placeholder="confirm password" value="Test@123">
                </div>
                <div class="d-inline-block w-100">
                    <button type="submit" class="btn btn-primary float-right">
                        <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>
                        Sign Up
                    </button>
                </div>
                Already have account an account? <a href="{{ route('login') }}" class="float-center">click here to Login</a><br>
                No need to sign up you see the product on <a href="{{ route('product') }}" class="float-center">Click here</a>
            </form>
        </div>
    </div>
@endsection

@push('after-js')
@endpush