@extends('layouts.app_back')
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Manage Items</label>
			<label class="tv-tab" for="tv-tab-2">Upload CSV</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
		<div class="tv-content">
			<h3>Item Master</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>
			<div class="entry-form">
				<form action="{{ route('item.store') }}" method="POST">
					@csrf
					<div class="row">
						<div class="col-5">
							<input type="text" name="barcode" class="form-control" placeholder="Barcode">
						</div>
						<div class="col-7">
							<input type="text" name="item_name" class="form-control" placeholder="Item Name">
						</div>
						<div class="col-3">
							<select name="department_id" id="" class="form-control">
								<option value="">Select Department</option>
								@foreach ($departments as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="category_id" id="" class="form-control">
								<option value="">Select Category</option>
								@foreach ($categories as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="brand_id" id="" class="form-control">
								<option value="">Select Brand</option>
								@foreach ($brands as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="unit_id" id="" class="form-control">
								<option value="">Select UoM</option>
								@foreach ($units as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="size_id" id="" class="form-control">
								<option value="">Select Size</option>
								@foreach ($sizes as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="color_id" id="" class="form-control">
								<option value="">Select Color</option>
								@foreach ($colors as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<input type="text" name="purchase_price" class="form-control" placeholder="Purchase Price">
						</div>
						<div class="col-3">
							<input type="text" name="sale_price" class="form-control" placeholder="Selling Price">
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-12">
							<button class="save-btn">Save</button>
						</div>
					</div>
				</form>
			</div>
		</div>


		<input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Item Master</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-3">
							<input type="file" class="form-control" placeholder="Download Sample CSV File">
						</div>
						<div class="col-3">
							<a href="">Sample CSV File</a>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Upload</button>
						</div>
						<div class="col-3">
							<button class="save-btn">Download</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="bottom-report">
		<table class="tbl-1 mb-10" id="item-table">
			<thead>
				<tr>
					<th width="10%">Barcode</th>
					<th width="15%">Item Name</th>
					<th width="10%">Dept</th>
					<th width="10%">Cat</th>
					<th width="10%">Brand</th>
					<th width="10%">UoM</th>
					<th width="10%">Size</th>
					<th width="10%">Color</th>
					<th width="10%">Price</th>
					<th width="5%">...</th>
				</tr>
			</thead>
			<tbody>
				@foreach($items as $item)
				<tr>
					<td>{{$item->barcode}}</td>
					<td>{{$item->item_name}}</td>
					<td>{{$item->department->name}}</td>
					<td>{{$item->category->name}}</td>
					<td>{{$item->brand->name}}</td>
					<td>{{$item->unit->name}}</td>
					<td>{{$item->size->name}}</td>
					<td>{{$item->color->name}}</td>
					<td>{{$item->sale_price}}</td>
					<td><i class="fa fa-pencil"></i></td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$(document).ready(function () {
		$('#item-table').DataTable({
			scrollX: false,
		});
	});
</script>

@endsection