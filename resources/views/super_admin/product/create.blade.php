@extends('layouts.super_admin.app')

@section('title',$pageTitle . ' Product')

@section('breadcrumb','Product')
@push('after-css')
@endpush

@section('content')
<div id="content-page" class="content-page">
    <div class="container-fluid card sign-in-from">
        <form class="mt-4" method="POST" action="{{ $product->id ? route('superadmin.products.update', $product->id) : route('superadmin.products.store') }}" enctype="multipart/form-data" id="myForm">
            @csrf
            @method($product->id ? 'PUT' : 'POST')
            
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="name">Name</label> <span class="error"> *</span>
                    <input type="text" class="form-control mb-0" id="name" name="name" placeholder="Enter product name" value="{{ $product->name ?? old('name') }}">
                </div>
                <div class="form-group col-md-6">
                    <label for="model">Model</label> <span class="error"> *</span>
                    <input type="text" class="form-control mb-0" id="model" name="model" placeholder="Enter model" value="{{ $product->name ?? old('model') }}">
                </div>
            </div>
            <div class="row">
                <div class="form-group col-md-6">
                    <label for="category">Category</label> <span class="error"> *</span>
                    <select class="form-control" name="category_id" id="categoryId">
                        <option>-- Select Category --</option>
                        @forelse ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id) == $category->id ? 'selected' : '' }}>{{ ucwords($category->name) }}</option>
                        @empty
                            No Role Found!
                        @endforelse
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="price">Price</label> <span class="error"> *</span>
                    <input type="text" class="form-control mb-0" id="price" name="price" placeholder="Enter price" value="{{ $product->price ?? old('price') }}">
                </div>
            </div>
            
            <div class="row">
                <div class="form-group">
                    <label for="description">Description</label> <span class="error"> *</span>
                    <textarea name="description" class="form-control mb-0" id="description" cols="20" rows="3" placeholder="Enter Description">{{ $product->description ?? old('description') }}</textarea>
                </div>
            </div>

            <div class="row">
                <div class="form-group">
                    <label for="image">Images</label>
                    <div id="imageInputs">
                        <div class="image-input-wrapper">
                            <input type="file" name="images[]" class="form-control mb-0">
                        </div>
                    </div>
                    @forelse ($product->images as $imageData)
                        <img src="{{ $imageData->image_url }}" alt="{{ $product->name }}">
                    @empty
                    @endforelse
                </div>
                <div class="form-group">
                    <button type="button" class="btn btn-primary btn-sm" width='100px' id="addImageBtn">Add More Images</button>
                </div>
            </div>

            <div class="d-inline-block w-100">
                <button type="submit" class="btn btn-primary float-right">
                    <span class="spinner-border spinner-border-sm d-none" aria-hidden="true"></span>
                    {{ $product->id ? 'Update' : 'Create' }}
                </button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('after-js')
    <script>
        $(document).ready(function() {            
            $('#addImageBtn').click(function() {
                var newInputWrapper = $('<div class="image-input-wrapper">');
                
                var newInput = $('<input>').attr({
                    type: 'file',
                    name: 'images[]',
                    class: 'form-control mb-0 mt-2',
                    required: true
                });

                var removeButton = $('<button>').attr({
                    type: 'button',
                    class: 'btn btn-danger btn-sm remove-image-btn'
                }).text('Remove');

                newInputWrapper.append(newInput).append(removeButton);

                $('#imageInputs').append(newInputWrapper);
            });

            $(document).on('click', '.remove-image-btn', function() {
                $(this).closest('.image-input-wrapper').remove();
            });
        });
    </script>
@endpush