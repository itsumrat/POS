@extends('layouts.app_back')
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
				<form action="">
					<div class="row">
						<div class="col-2">
							<label class="control-label" for="">Payment Date</label>
							<input type="date" class="form-control" value="11-06-22">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label class="control-label" for="">Select Account</label>
							<select name="" id="">
								@foreach ($vendors as $vendor)
								<option value="{{$vendor->id}}">{{$vendor->vendor_name}}</option>
								@endforeach

							</select>
						</div>
						<div class="col-2">
							<label class="control-label" for="">Balance</label>
							<input type="text" class="form-control" readonly value="23592.00">
						</div>
						<div class="col-2">
							<label class="control-label" for="">Pay Amount</label>
							<input type="text" class="form-control" placeholder="Type Pay Amount">
						</div>
						<div class="col-2">
							<label class="control-label" for="">Payment Type</label>
							<select name="" id="">
								<option value="">Cash</option>
								<option value="">Bkash</option>
								<option value="">Card/Bank</option>
							</select>
						</div>
						<div class="col-3">
							<label class="control-label" for="">Cheque / Ref</label>
							<input type="text" class="form-control" placeholder="Cheque/Ref">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<label class="control-label" for="">Select Source</label>
							<select name="" id="">
								@foreach ($accounts as $account)
								<option value="{{$account->id}}">{{$account->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-9">
							<label class="control-label" for="">Type Note</label>
							<input type="text" class="form-control" placeholder="Note">
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
		<div class="tbl-action-btn">
			<div class="float-left col-3">
				<input class="form-control" placeholder="Search by order#, name...">
			</div>
			<div class="col-6"></div>
			<div class="float-right col-3">
				<span>Filters <i class="fa fa-angle-down"></i></span> <i class="fa fa-ellipsis-h"></i>
			</div>
		</div>
		<table class="tbl-1 mb-10">
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
				<tr>
					<td>11-06-22</td>
					<td>S-10001</td>
					<td>Mostafa Kamal</td>
					<td>Due Payment</td>
					<td>PV-10001</td>
					<td>12000.00</td>
					<td>29-06-22</td>
					<td>Note</td>
					<td>
						<i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-money"></i>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>
@endsection