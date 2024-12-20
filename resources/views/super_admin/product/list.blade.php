@extends('layouts.super_admin.app')

@section('title','Product')

@section('breadcrumb','Product')
@push('after-css')
@endpush

@section('content')
    <div id="content-page" class="content-page">
        <div class="container-fluid card">
            <h3 class="card-header">Product</h3>
            <div class="card-body">
                <div class="user-list-files d-flex float-right mb-3">
                    <a href="{{ route('superadmin.products.create') }}" class="chat-icon-video text-decoration-none">
                        <i class="fa fa-plus"></i> Import Data
                    </a>
                    <a href="{{ route('superadmin.products.create') }}" class="chat-icon-video text-decoration-none">
                        <i class="fa fa-plus"></i> Add
                    </a>
                </div>
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

    <!-- Modal -->
    <div class="modal" id="deleteModal" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title">Delete Product</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>
            <div class="modal-body">
            <p>Are you sure you want to delete this product?</p>
            <p><strong>This action cannot be undone!</strong></p>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
            <button type="button" class="btn btn-warning" id="softDeleteBtn">
                <span class="spinner-border spinner-border-sm text-white" id="softDeleteSpinner" style="display: none;"></span> 
                Soft Delete
            </button>
            <button type="button" class="btn btn-danger" id="hardDeleteBtn">
                <span class="spinner-border spinner-border-sm text-white" id="hardDeleteSpinner" style="display: none;"></span>
                Hard Delete
            </button>
            </div>
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
                ajax: "{{ route('superadmin.products.index') }}",
                columns: [
                    {data: 'category', name: 'category'},
                    {data: 'name', name: 'name'},
                    {data: 'model', name: 'model'},
                    {data: 'price', name: 'price'},
                    {data: 'description', name: 'description'},
                    {data: 'status', name: 'status'},
                    {data: 'action', name: 'action', orderable: false, searchable: false},
                ]
            });
        });

        let productId = null;
        function showDeleteConfirmation(id) {
            productId = id;
            $('#deleteModal').modal('show');
        }
        
        $('#softDeleteBtn').click(function() {
            if (productId !== null) {
                let url = '{{ route('superadmin.product.soft-delete', ':id') }}';
                url = url.replace(':id', productId);
                $(this).prop('disabled', true);
                $('#hardDeleteBtn').prop('disabled', true);
                $('#softDeleteSpinner').show(); 
                deleteFunctinon(url)
            }
        });

        $('#hardDeleteBtn').click(function() {
            if (productId !== null) {
                let url = '{{ route('superadmin.product.hard-delete', ':id') }}';
                url = url.replace(':id', productId);
                $(this).prop('disabled', true);
                $('#softDeleteBtn').prop('disabled', true);
                $('#hardDeleteSpinner').show(); 
                deleteFunctinon(url);
            }
        });
        
        function deleteFunctinon(url)
        {
            $.ajax({
                url: url,
                type: 'DELETE',
                success: function(result) {
                    $('#deleteModal').modal('hide');
                    $('#softDeleteBtn').prop('disabled', false);
                    $('#hardDeleteBtn').prop('disabled', false);
                    $('#softDeleteSpinner').hide(); 
                    $('#hardDeleteSpinner').hide(); 
                    $.notify({
                        message: result.message
                    }, {
                        type: 'success'
                    });
                    $('.data-table').DataTable().ajax.reload(null, false);
                },
                error: function(xhr, status, error) {
                    $.notify({
                        message: 'An error occurred while deleting the product.'
                    }, {
                        type: 'danger'
                    });
                }
            });
        }
    </script>
@endpush