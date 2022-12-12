@extends('layouts.app_back')
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Create Account</label>
			<label class="tv-tab" for="tv-tab-2">Accounts Ledger</label>
			<label class="tv-tab" for="tv-tab-3">Accounts Settings</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
		<div class="tv-content">
			<h3>Create Account</h3>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-4">
							<label class="control-label" for="">Account Name</label>
							<input type="text" class="form-control" value="Cash A/C">
						</div>
						<div class="col-2">
							<label class="control-label" for="">Select Type</label>
							<select name="type" id="">
								@foreach ($types as $type)
								<option value="{{$type->id}}">{{$type->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<label class="control-label" for="">Account Group</label>
							<select name="group" id="">
								@foreach ($groups as $group)
								<option value="{{$group->id}}">{{$group->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<label class="control-label" for="">Account Sub Group</label>
							<select name="subgroup" class="form-control" id="">
								@foreach ($subgroups as $subgroup)
								<option value="{{$subgroup->id}}">{{$subgroup->name}}</option>
								@endforeach
							</select>
						</div>
						<div class="col-2">
							<label class="control-label" for="">Opening Balance</label>
							<input type="text" class="form-control" placeholder="0.00">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save Accounts</button>
						</div>
					</div>
				</form>
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
					<th width="30%">Account Name</th>
					<th width="15%">Account Type</th>
					<th width="15%">Account Group</th>
					<th width="20%">Account Sub Group</th>
					<th width="10%">Opening Balance</th>
					<th width="10%">...</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>Cash A/C</td>
					<td>Balance Sheet</td>
					<td>Asset</td>
					<td>Current Asset</td>
					<td>12000.00</td>
					<td>
						<i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
						<i class="fa fa-money"></i>
					</td>
				</tr>
			</tbody>
		</table>
		<table class="tbl-1 mb-10">
			<thead>
				<tr>
					<th width="10%">JV Date</th>
					<th width="10%">JV No</th>
					<th width="25%">Account Name</th>
					<th width="12%">Particulars</th>
					<th width="7%">Debit</th>
					<th width="7%">Credit</th>
					<th width="20%">Note</th>
					<th width="9%">...</th>
				</tr>
			</thead>
			<tbody>
				<tr>
					<td>11-06-22</td>
					<td>JV10001</td>
					<td>Cash A/C</td>
					<td>PV-1001</td>
					<td>0.00</td>
					<td>12,000.00</td>
					<td>Supplier Payment (product purchase)</td>
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
		</div>

		<input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Accounts Ledger</h3>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-4">
							<label class="control-label" for="">Account Name</label>
							<input type="text" class="form-control" value="Cash A/C">
						</div>
						<div class="col-2">
							<label class="control-label" for="">Current Balance</label>
							<input type="text" class="form-control" readonly value="1,35,678.00">
						</div>
						<div class="col-3">
							<label class="control-label" for="">Start Date</label>
							<input type="date" class="form-control" value="Cash A/C">
						</div>
						<div class="col-3">
							<label class="control-label" for="">End Date</label>
							<input type="date" class="form-control" value="Cash A/C">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Search</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-3" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Accounts Settings</h3>
			<div class="entry-form">
				<div class="row">
					<div class="col-4">
						<form action="{{ route('account-types.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Account Type">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Type</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-4">
						<form action="{{ route('account-groups.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Groups">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Groups</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-4">
						<form action="{{ route('account-subgroups.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="SubGroup">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save SubGroup</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

@endsection