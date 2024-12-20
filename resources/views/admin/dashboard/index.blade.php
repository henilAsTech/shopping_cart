@extends('layouts.admin.app')

@section('title','Dashboard')

@section('breadcrumb','Dashboard')
@push('after-css')
@endpush

@section('content')
	<div id="content-page" class="content-page">
		<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="iq-card iq-card-block iq-card-stretch iq-card-height iq-border-box iq-border-box-1 text-primary">
						<div class="iq-card-body">
							<div class="d-flex align-items-center justify-content-between"> 
								<h5>Welcome to Dashboard</h5>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row">
                <div class="col-md-6 col-lg-4">
                    <div class="iq-card iq-card-block iq-card-stretch iq-card-height overflow-hidden">
                        <div class="iq-card-body pb-0">
                            <div class="rounded-circle iq-card-icon iq-bg-primary">
                                <i class="ri-user-fill"></i>
                            </div>
                            <span class="float-right line-height-6">Total User</span>
                            <div class="clearfix"></div>
                            <div class="text-center">
                                <h2 class="mb-0"><span class="counter">{{ $userCount }}</span><span></span></h2>
                            </div>
                        </div>
                    </div>
                </div>
			</div>
		</div>
	</div>

	<!-- Modal for Export Format -->
	<div class="modal fade" id="exportModal" tabindex="-1" role="dialog" aria-labelledby="exportModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exportModalLabel">Export Customer Data</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label for="export-format">Select Export Format <span class="text-danger">*</span></label>
						<select id="export-format" class="form-control">
							<option value="">Select Export Format</option>
							<option value="csv">CSV</option>
							<option value="pdf">PDF</option>
						</select>
					</div>
					<div class="form-group">
						<label for="customer-id">Select Customer <span class="text-danger">*</span></label>
						<select id="customer-id" class="form-control" required>
							<option value="">Select Customer</option>
							<option value="0">All Customer</option>
							{{-- @foreach ($customers as $customer)
								<option value="{{ $customer->id }}">{{ ucfirst($customer->name) }}</option>
							@endforeach --}}
						</select>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="export-data">Export</button>
				</div>
			</div>
		</div>
	</div>
@endsection

@push('after-js')
	<script>
		$('#addStockModal').modal('show');
		$('#add-stock').click(function() {
			$('#addStockModal').modal('hide');
		});

		$('#add-stock-data').click(function(e) {
            e.preventDefault();
            var stockValue = $('#stock').val();
            var machineId = $('#machine_id').val();
            if (stockValue <= 0) {
                alert('Stock quantity must be greater than 0.');
                return false;
            }

            if (!machineId) {
                alert('Please select a machine.');
                return false;
            }
            $('#addStockForm').submit();
        });
		
		$('#export-data').on('click', function() {
			let format = $('#export-format').val();
			let customerId = $('#customer-id').val();
			if (customerId && format) {
				window.location.href = `/user/export/machines?format=${format}&customer_id=${customerId}`;
				$('#exportModal').modal('hide');
			} else {
				alert('Please select both format and customer.');
			}
		});

		$('#machine_id').change(function () {
			var machineId = $(this).val();
			// To get machine stock and production
			$.ajax({
				url: '/user/get_stock/'+machineId,
				method:"GET",
				success:function(result)
				{
					if (result.status == 200) {
						console.log(result.data.current_stock);
						$('#current_stock').val(result.data.current_stock);
					}
				}
			});
		});
	</script>
@endpush