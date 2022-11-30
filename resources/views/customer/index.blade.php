@extends('layouts.app_back')
@section('styles')
<style>
	/* 1. Ensure this sits above everything when visible */
	.modal {
		position: absolute;
		z-index: 10000;
		/* 1 */
		top: 0;
		left: 0;
		visibility: hidden;
		width: 100%;
		height: 100%;
	}

	.modal.is-visible {
		visibility: visible;
	}

	.modal-overlay {
		position: fixed;
		z-index: 10;
		top: 0;
		left: 0;
		width: 100%;
		height: 100%;
		background: hsla(0, 0%, 0%, 0.5);
		visibility: hidden;
		opacity: 0;
		transition: visibility 0s linear 0.3s, opacity 0.3s;
	}

	.modal.is-visible .modal-overlay {
		opacity: 1;
		visibility: visible;
		transition-delay: 0s;
	}

	.modal-wrapper {
		position: absolute;
		z-index: 9999;
		top: 6em;
		left: 50%;
		width: 32em;
		margin-left: -16em;
		background-color: #fff;
		box-shadow: 0 0 1.5em hsla(0, 0%, 0%, 0.35);
	}

	.modal-transition {
		transition: all 0.3s 0.12s;
		transform: translateY(-10%);
		opacity: 0;
	}

	.modal.is-visible .modal-transition {
		transform: translateY(0);
		opacity: 1;
	}

	.modal-header,
	.modal-content {
		padding: 1em;
	}

	.modal-header {
		position: relative;
		background-color: #fff;
		box-shadow: 0 1px 2px hsla(0, 0%, 0%, 0.06);
		border-bottom: 1px solid #e8e8e8;
	}

	.modal-close {
		position: absolute;
		top: 0;
		right: 0;
		padding: 1em;
		color: #aaa;
		background: none;
		border: 0;
	}

	.modal-close:hover {
		color: #777;
	}

	.modal-heading {
		font-size: 1.125em;
		margin: 0;
		-webkit-font-smoothing: antialiased;
		-moz-osx-font-smoothing: grayscale;
	}

	.modal-content>*:first-child {
		margin-top: 0;
	}

	.modal-content>*:last-child {
		margin-bottom: 0;
	}
</style>
@endsection
@section('content')
@php
$edit = App\Http\Controllers\PermissionAccess::viewAccess(1,3);
$delete = App\Http\Controllers\PermissionAccess::viewAccess(1,4);
$view = App\Http\Controllers\PermissionAccess::viewAccess(1,1);
$add = App\Http\Controllers\PermissionAccess::viewAccess(1,2);
@endphp
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Create Customer</label>
			<label class="tv-tab" for="tv-tab-2">Manage Customer</label>
			<label class="tv-tab" for="tv-tab-3">Customer Ledger</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
		<div class="tv-content">

			@if($add)

			<h3>New Customer Entry</h3>
			<div class="entry-form">

				<form action="{{ route('customer.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-2">
							<input type="text" class="form-control" name="customer_contact"
								placeholder="Customer Contact">
						</div>
						<div class="col-3">
							<input type="text" class="form-control" name="customer_name" placeholder="Customer Name">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" name="nid_no" placeholder="NID No">
						</div>
						<div class="col-5">
							<input type="text" class="form-control" name="address" placeholder="Address">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" name="openning_balance"
								placeholder="Opening Balance">
						</div>
						<div class="col-2">
							<select name="customer_type" id="">
								<option value="">Type of Customer</option>
								@foreach ($customer_types as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save Customer Data</button>
						</div>
					</div>
				</form>
			</div>
			@endif
		</div>

		<input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Manage Customer</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>

			<div class="row">
				<div class="bottom-report">
					<table class="tbl-1 mb-10" id="customer-table">
						<thead>
							<tr>
								<th width="8%">Customer ID</th>
								<th width="8%">Contact No</th>
								<th width="15%">Customer Name</th>
								<th width="10%">NID No</th>
								<th width="25%">Address</th>
								<th width="10%">Customer Type</th>
								<th width="14%">Opening Balance</th>
								<th width="15%">...</th>
							</tr>
						</thead>
						<tbody>
							@foreach($customers as $customer)
							<tr>
								<td>{{$customer->id}}</td>
								<td>{{$customer->customer_contact}}</td>
								<td>{{$customer->customer_name}}</td>
								<td>{{$customer->nid_no}}</td>
								<td>{{$customer->address}}</td>
								<td>{{$customer->type->name}}</td>
								<td>{{$customer->openning_balance}}</td>
								<td>
									<i class="fa fa-eye"></i>
									<i class="fa fa-pencil"></i>
									<!-- <a class="modal-toggle" href="#"></a> -->
									<i class="fa fa-money"></i>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<input class="tv-radio" id="tv-tab-3" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Customer Transactions</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>

			<div class="row">
				<div class="col-3">
					<select name="" id="">
						<option value="">Select Customer</option>
					</select>
				</div>
				<div class="col-3">
					<input type="date" name="" id="">
				</div>
				<div class="col-3">
					<input type="date" name="" id="">
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-3">
					<button class="save-btn">Search</button>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="bottom-report">
					<div class="col-12">
						<button class="save-btn float-right mb-10">Print Ledger</button>
					</div>
					<div class="tbl-action-btn">
						<div class="row">
							<div class="col-3">
								<input class="form-control" placeholder="Customer Name">
							</div>
							<div class="col-2">
								<input type="text" placeholder="Opening Balance">
							</div>
							<div class="col-2">
								<input type="text" placeholder="Total Trnx Amount">
							</div>
							<div class="col-2">
								<input type="text" placeholder="Total Paid">
							</div>
							<div class="col-3">
								<input type="text" placeholder="Current Balance">
							</div>
						</div>
					</div>
					<table class="tbl-1 mb-10">
						<thead>
							<tr>
								<th width="15%">Trnx Date</th>
								<th width="30%">Particulars</th>
								<th width="20%">Note</th>
								<th width="10%">Trnx Amount</th>
								<th width="10%">Paid</th>
								<th width="15%">Balance</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>10-Apr-22</td>
								<td>Trnx#1001</td>
								<td>Grocery Purchase</td>
								<td>8,700.00</td>
								<td>8,700.00</td>
								<td>0.00</td>
							</tr>
							<tr>
								<td>10-Apr-22</td>
								<td>Trnx#4344</td>
								<td>Grocery Purchase</td>
								<td>2,800.00</td>
								<td>2,000.00</td>
								<td>800.00</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="modal">
	<div class="modal-overlay modal-toggle"></div>
	<div class="modal-wrapper modal-transition">
		<div class="modal-header">
			<button class="modal-close modal-toggle"><svg class="icon-close icon" viewBox="0 0 32 32">
					<use xlink:href="#icon-close"></use>
				</svg></button>
			<h2 class="modal-heading">This is a modal</h2>
		</div>

		<div class="modal-body">
			<div class="modal-content">
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit eum delectus, libero, accusantium
					dolores
					inventore obcaecati placeat cum sapiente vel laboriosam similique totam id ducimus aperiam, ratione
					fuga
					blanditiis maiores.</p>
				<button class="modal-toggle">Update</button>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')

<script>
	$(document).ready(function () {
		$('#customer-table').DataTable({
			scrollX: false,
		});
	});
</script>
<script>
	// Quick & dirty toggle to demonstrate modal toggle behavior
	$('.modal-toggle').on('click', function (e) {
		e.preventDefault();
		$('.modal').toggleClass('is-visible');
	});

</script>

@endsection