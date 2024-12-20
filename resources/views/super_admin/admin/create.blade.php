@extends('layouts.super_admin.app')

@section('title',$pageTitle . ' Admin')

@section('breadcrumb','Admin')
@push('after-css')
@endpush

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid card sign-in-from">
        <form class="mt-4" method="POST" action="{{ $admin->id ? route('superadmin.admins.update', $admin->id) : route('superadmin.admins.store') }}" id="myForm">
            @csrf
            @method($admin->id ? 'PUT' : 'POST')
            
            <input type="hidden" id="user" name="role" value="1">
            <div class="form-group">
                <label for="name">Full Name</label> <span class="error"> *</span>
                <input type="text" class="form-control mb-0" id="name" name="name" placeholder="Enter name" value="{{ $admin->name ?? old('name') }}">
            </div>
            <div class="form-group">
                <label for="email">Email address</label><span class="error"> *</span>
                <input type="email" class="form-control mb-0" id="email" name="email" placeholder="Enter email address" value="{{ $admin->email ?? old('email') }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label> <span class="error">{{ $admin->id ? '' : '*'}}</span>
                <input type="password" class="form-control mb-0" id="password" name="password" placeholder="password">
            </div>
            <div class="form-group">
                <label for="cpassword">Confirm Password</label> <span class="error">{{ $admin->id ? '' : '*'}}</span>
                <input type="password" class="form-control mb-0" id="cpassword" name="password_confirmation" placeholder="confirm password">
            </div>
            <div class="d-inline-block w-100">
                <button type="submit" class="btn btn-primary float-right">
                    <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>
                    {{ $admin->id ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection