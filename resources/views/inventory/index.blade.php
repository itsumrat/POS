@extends('layouts.app_back')
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Item Stock Details</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
		<div class="tv-content">
			<h3>Inventory Master</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-3">
							<input type="text" class="form-control" placeholder="Barcode">
						</div>
						<div class="col-3">
							<select name="" id="" class="form-control">
								<option value="">Select Department</option>
								<option value="">Department 1</option>
							</select>
						</div>
						<div class="col-3">
							<select name="" id="" class="form-control">
								<option value="">Select Category</option>
								<option value="">Category 1</option>
							</select>
						</div>
						<div class="col-3">
							<select name="" id="" class="form-control">
								<option value="">Select Brand</option>
								<option value="">Brand 1</option>
							</select>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Search</button>
						</div>
						<div class="col-3">
							<button class="save-btn">Search</button>
						</div>
						<div class="col-3">
							<button class="save-btn">Search</button>
						</div>
						<div class="col-3">
							<button class="save-btn">Search</button>
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
			<div class="col-4"></div>
			<div class="float-right col-5">
				<button class="save-btn bg-blue">Save All</button>
				<button class="save-btn bg-green">Make Adjustment</button>
				<button class="save-btn bg-coral">Mark As Damage</button>
			</div>
		</div>
		<table class="tbl-1 mb-10">
			<thead>
				<tr>
					<th width="5%"><input type="checkbox"></th>
					<th width="10%">Barcode</th>
					<th width="15%">Item Name</th>
					<th width="10%">Dept</th>
					<th width="10%">Cat</th>
					<th width="10%">Brand</th>
					<th width="5%">UoM</th>
					<th width="5%">Size</th>
					<th width="5%">Color</th>
					<th width="10%">Sys Qty</th>
					<th width="10%">Phys Qty</th>
					<th width="10%">Variance</th>
					<th width="5%">Action</th>
				</tr>
			</thead>
			<tbody>
				@foreach($stocks as $stock)
				<tr>
					<td><input type="checkbox"></td>
					<td>{{$stock->barcode}}</td>
					<td>{{$stock->item_name}}Lotion</td>
					<td>{{$stock->department}}</td>
					<td>{{$stock->category}}</td>
					<td>{{$stock->brand}}</td>
					<td>{{$stock->uom}}</td>
					<td>{{$stock->size}}</td>
					<td>{{$stock->color}}</td>
					<td>{{$stock->quantity}}</td>
					<td><input type="text" value="{{$stock->quantity}}"></td>
					<td></td>
					<td><button class="save-btn">Save</button></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('scripts')
@endsection