@extends('layouts.super_admin.app')

@section('title','User')

@section('breadcrumb','User')
@push('after-css')
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid card">
            <h3 class="card-header">User</h3>
            <div class="card-body">
                <table class="table table-bordered data-table">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
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
                ajax: "{{ route('superadmin.orders.index') }}",
                columns: [
                    {data: 'name', name: 'name'},
                    {data: 'email', name: 'email'},
                ]
            });
        });
  </script>
@endpush