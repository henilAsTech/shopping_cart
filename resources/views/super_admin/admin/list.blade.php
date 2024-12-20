@extends('layouts.super_admin.app')

@section('title','Admin')

@section('breadcrumb','Admin')
@push('after-css')
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid card">
            <h3 class="card-header">Admin</h3>
            <div class="card-body">
                <div class="user-list-files d-flex float-right mb-3">
                    <a href="{{ route('superadmin.admins.create') }}" class="chat-icon-video text-decoration-none">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
        $(function () {    
            var table = $('.data-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('superadmin.admins.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });
  </script>
@endpush