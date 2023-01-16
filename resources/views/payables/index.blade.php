@extends('layouts.app_back')
@php
$edit = App\Http\Controllers\PermissionAccess::viewAccess(1,3);
$delete = App\Http\Controllers\PermissionAccess::viewAccess(1,4);
$view = App\Http\Controllers\PermissionAccess::viewAccess(1,1);
$add = App\Http\Controllers\PermissionAccess::viewAccess(1,2);
@endphp
@section('styles')
<style>
	.edit_modal {
		width: 100%;
		background: #0000001f;
		height: 100%;
		z-index: 999999999;
		display: none;
		position: fixed;
		top: 0;
		left: 0;
	}

	.edit {
		position: fixed;
		top: 40px;
		width: 70%;
		display: none;
		margin-left: 15%;
	}

	.edit .modal-close {
		position: absolute;
		z-index: 999;
		top: -4px;
		right: 10px;
		font-size: 30px;
	}
</style>

@endsection
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Accounts Payable</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
		<div class="tv-content">
			<h3>Add Payment</h3>
			<div class="entry-form">
				<form action="{{ route('payables.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-2">
							<label class="control-label" for="payment_date">Payment Date</label>
							<input type="date" class="form-control" name="payment_date" value="">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label class="control-label" for="vendor_id">Select Account</label>
							<select name="vendor_id" id="vendor_id">
								@foreach ($vendors as $vendor)
								<option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
								@endforeach

							</select>
						</div>
						<div class="col-2">
							<label class="control-label" for="current_balance">Balance</label>
							<input type="text" name="current_balance" class="form-control current_balance" readonly
								value="">
						</div>
						<div class="col-2">
							<label class="control-label" for="pay_amount">Pay Amount</label>
							<input type="text" name="pay_amount" class="form-control" placeholder="Type Pay Amount">
						</div>
						<div class="col-2">
							<label class="control-label" for="payment_type">Payment Type</label>
							<select name="payment_type" id="">
								<option value="Cash">Cash</option>
								<option value="Bkash">Bkash</option>
								<option value="Card/Bank">Card/Bank</option>
							</select>
						</div>
						<div class="col-3">
							<label class="control-label" for="cheque_no">Cheque / Ref</label>
							<input type="text" class="form-control" name="cheque_no" placeholder="Cheque/Ref">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label class="control-label" for="account_id">Select Source</label>
							<select name="account_id" id="">
								@foreach ($accounts as $account)
								<option value="{{$account->id}}">{{$account->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-9">
							<label class="control-label" for="description">Type Note</label>
							<input type="text" name="description" class="form-control" placeholder="Note">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save Payment Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<div class="row">
	<div class="bottom-report">
		<table class="tbl-1 mb-10" id="payables-table">
			<thead>
				<tr>
					<th width="7%">Trnx Date</th>
					<th width="8%">Supplier ID</th>
					<th width="15%">Supplier Name</th>
					<th width="10%">Trnx Type</th>
					<th width="10%">Ref No</th>
					<th width="10%">Pay Amount</th>
					<th width="10%">Payment Date</th>
					<th width="20%">Note</th>
					<th width="10%">...</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($payables as $item)
				<tr>
					<td>{{$item->created_at}}</td>
					<td>{{$item->vendor_id}}</td>
					<td>{{$item->vendor->vendor_name}}</td>
					<td>Due Payment</td>
					<td>{{$item->ref_no}}</td>
					<td>{{$item->pay_amount}}</td>
					<td>{{$item->payment_date}}</td>
					<td>{{$item->description}}</td>
					<td>
						@if($edit)
						<a href="#"><i class="fa fa-pencil show_modal" data-item_id="{{ $item->unique_id }}">
							</i></a>
						@endif
						@if($delete)
						<a href="#"><i class="fa fa-trash delete_modal" data-item_id="{{ $item->unique_id }}">
							</i></a>
						{{-- <i class="fa fa-pencil"></i> --}}
						@endif
					</td>
				</tr>
				@endforeach

			</tbody>
		</table>
	</div>
</div>

<div class="edit_modal">
	<div id="return" class="edit">
		<div class="modal-content">
			<h6 class="bg-title">Edit Vendor</h6>

			<div class="entry-form">

				<form class="update_form" method="POST">
					@csrf
					<div class="row">
						<div class="col-4">
							<input type="text" name="payment_date" class="form-control payment_date_edit" value=""
								placeholder="payment Date">
						</div>
						<div class="col-4">
							<select name="vendor_id" id="" class="form-control vendor_edit">
								<option value="">Select Vendor Type</option>
								@foreach ($vendors as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->vendor_name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-4">
							<input type="text" name="pay_amount" class="form-control pay_amount_edit"
								placeholder="Pay Amount">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-4">
							<select name="payment_type" class="form-control payment_type_edit">
								<option value="Cash">Cash</option>
								<option value="Bkash">Bkash</option>
								<option value="Card/Bank">Card/Bank</option>
							</select>
						</div>
						<div class="col-4">
							<input type="text" name="cheque_no" class="form-control cheque_no_edit"
								placeholder="Cheque No">
						</div>
						<div class="col-4">
							<select name="account_id" id="" class="form-control accounts_edit">
								<option value="">Select Account</option>
								@foreach ($accounts as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>

					</div>
					<br>
					<div class="row">
						<div class="col-4">
							<input type="text" name="description" class="form-control description_edit"
								placeholder="description">
						</div>
					</div>
					<div class="row">
						<div class="col-12">
							<button class="save-btn">Save</button>
						</div>
					</div>
				</form>
			</div>

			<a href="" class="modal-close">&times;</a>
		</div>
	</div>
</div>

@endsection
@section('scripts')
<script>
	$(document).on('click', '.show_modal', function(){

	let uniqueId = $(this).data('item_id');
	let updateUrl = '{{ url("payables") }}/'+uniqueId;

	$.ajax({
		method: "get",
		url: "{{ url('payables') }}/"+uniqueId,
		success: function(res){
		console.log(res);
			// $( ".brand_edit").val(res.brand_id).change();
			$( ".cheque_no_edit").val(res.cheque_no).change();
			$( ".payment_type_edit").val(res.payment_type).change();
			//$( ".opening_balance_edit").val(res.opening_balance).change();
			//$( ".address_edit").val(res.address).change();
			$( ".pay_amount_edit").val(res.pay_amount).change();
			$( ".description_edit").val(res.description).change();
			$( ".vendor_edit").val(res.vendor_id).change();
			$( ".accounts_edit").val(res.account_id).change();
			$( ".payment_date_edit").val(res.payment_date).change();
			$('.update_form').attr('action', updateUrl)
		},
		error: function(xhr){
			console.log(xhr);
		}

});

$('.edit, .edit_modal').css("display", "block");
})

$(document).on('click', '.delete_modal', function(){

let uniqueId = $(this).data('item_id');

let confirmData = confirm("Are you confirm to delete this item!");

if (confirmData == true) {
	$.ajax({
		method: "get",
		url: "{{ url('payables') }}/"+uniqueId+'/delete',
		success: function(res){
			return location.reload();
		},
		error: function(xhr){
			console.log("error");
		}
	});
} 




})

$(document).ready(function () {
$('#payables-table').DataTable({
	scrollX: false,
});
});

$('#vendor_id').on('change', function() {
		var productId = $(this).val();
		console.log(productId);
		if (productId) {
			$.ajax({
				url: 'vendorsingle/'+ productId,
				type: "GET",
				dataType: "json",
				success: function (data) {
					console.log(data);
					$('.current_balance').val(data.current_balance);
				}
			});
		}
	});
</script>
@endsection