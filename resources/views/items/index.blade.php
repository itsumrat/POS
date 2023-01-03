@extends('layouts.app_back')
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
			<label class="tv-tab" for="tv-tab-1">Manage Items</label>
			<label class="tv-tab" for="tv-tab-2">Upload CSV</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
		<div class="tv-content">
			@if($add)

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
			@endif
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
					<th width="7%">Size</th>
					<th width="7%">Color</th>
					<th width="6%">Qty</th>
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
					<td>{{isset($item->stock->quantity) ? $item->stock->quantity : '0' }}</td>
					<td>{{$item->sale_price}}</td>
					<td>
						@if($edit)
						
							<a href="#"><i class="fa fa-pencil show_modal" data-item_id="{{ $item->unique_id }}"></i></a>
						@endif
						@if($delete)
							<a href="#"><i class="fa fa-trash delete_modal" data-item_id="{{ $item->unique_id }}"></i></a>
							{{-- <i class="fa fa-pencil"></i> --}}
						@endif
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>
</div>
<div class="action-btns">
	<a class="action-btn show_modal" href="javascript:">Return</a>
</div>
<div class="edit_modal">
	<div id="return" class="edit">
		<div class="modal-content">
			<h6 class="bg-title">Edit Item</h6>
	
			<div class="entry-form">

				<form class="update_form" method="POST">
					@csrf
					<div class="row">
						<div class="col-5">
							<input type="text" name="barcode" class="form-control barcode_edit" placeholder="Barcode">
						</div>
						<div class="col-7">
							<input type="text" name="item_name" class="form-control item_name_edit" placeholder="Item Name">
						</div>
						<div class="col-3">
							<select name="department_id" id="" class="form-control department_edit">
								<option value="">Select Department</option>
								@foreach ($departments as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="category_id" id="" class="form-control category_edit">
								<option value="">Select Category</option>
								@foreach ($categories as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="brand_id" id="" class="form-control brand_edit">
								<option value="">Select Brand</option>
								@foreach ($brands as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="unit_id" id="" class="form-control unit_edit">
								<option value="">Select UoM</option>
								@foreach ($units as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="size_id" id="" class="form-control size_edit">
								<option value="">Select Size</option>
								@foreach ($sizes as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<select name="color_id" id="" class="form-control color_edit">
								<option value="">Select Color</option>
								@foreach ($colors as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-3">
							<input type="text" name="purchase_price" class="form-control purchase_edit" placeholder="Purchase Price">
						</div>
						<div class="col-3">
							<input type="text" name="sale_price" class="form-control sale_price_edit" placeholder="Selling Price">
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
	
			<a href="" class="modal-close">&times;</a>
		</div>
	</div>
</div>

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

@section('scripts')
<script>

	$(document).on('click', '.show_modal', function(){

		let uniqueId = $(this).data('item_id');
		let updateUrl = '{{ url("item_master") }}/'+uniqueId;

		$.ajax({
			method: "get",
			url: "{{ url('item_master') }}/"+uniqueId,
			success: function(res){

				$( ".brand_edit").val(res.brand_id).change();
				$( ".department_edit").val(res.department_id).change();
				$( ".color_edit").val(res.color_id).change();
				$( ".category_edit").val(res.category_id).change();
				$( ".purchase_edit").val(res.purchase_price).change();
				$( ".sale_price_edit").val(res.sale_price).change();
				$( ".barcode_edit").val(res.barcode).change();
				$( ".size_edit").val(res.size_id).change();
				$( ".unit_edit").val(res.unit_id).change();
				$( ".item_name_edit").val(res.item_name).change();
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
				url: "{{ url('item_master') }}/"+uniqueId+'/delete',
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
		$('#item-table').DataTable({
			scrollX: false,
		});
	});
</script>

@endsection