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
							<input type="text" name="current_balance" class="form-control current_balance" readonly value="">
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
						<i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-money"></i>
					</td>
				</tr>	
				@endforeach

			</tbody>
		</table>
	</div>
</div>
@endsection
@section('scripts')
<script>

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