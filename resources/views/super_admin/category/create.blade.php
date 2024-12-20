@extends('layouts.super_admin.app')

@section('title',$pageTitle . ' Category')

@section('breadcrumb','Category')
@push('after-css')
@endpush

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid card sign-in-from">
        <form class="mt-4" method="POST" action="{{ $category->id ? route('superadmin.categories.update', $category->id) : route('superadmin.categories.store') }}" id="myForm">
            @csrf
            @method($category->id ? 'PUT' : 'POST')
            
            <div class="form-group">
                <label for="name">Name</label> <span class="error"> *</span>
                <input type="text" class="form-control mb-0" id="name" name="name" placeholder="Category name" value="{{ $category->name ?? old('name') }}">
            </div>
            <div class="d-inline-block w-100">
                <button type="submit" class="btn btn-primary float-right">
                    <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span> 
                    {{ $category->id ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection