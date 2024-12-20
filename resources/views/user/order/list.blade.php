@extends('layouts.user.app')

@section('title','Order')

@section('breadcrumb','Order')
@push('after-css')
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid card">
            <h3 class="card-header">Order</h3>
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Category</th>
                            <th>Name</th>
                            <th>Model</th>
                            <th>Price</th>
                            <th>Description</th>
                            <th>Status</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('after-js')
    <script>
    </script>
@endpush