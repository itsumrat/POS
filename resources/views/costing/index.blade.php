@extends('layouts.app_back')
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Costing vs Selling Report</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
		<div class="tv-content">
			<h3>Last 10 Costing vs Selling Data</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>
			<div class="entry-form">
				<div class="row">
					<div class="col-2">
						<input type="text" id="barcode" class="form-control" placeholder="Barcode">
					</div>
					<div class="col-3">
						<input type="text" id="name" class="form-control name" placeholder="Item Name">
					</div>
				</div>
				<br>
				<div class="row">
					<div class="col-12">
						<button id="get-data" class="save-btn">Search</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="row">
	<div class="bottom-report">
		<div class="tbl-action-btn">
			<div class="row">
				<div class="col-2">
					<input type="text" placeholder="Barcode" id="barcode_id">
				</div>
				<div class="col-3">
					<input type="text" placeholder="Item Name" id="item_name">
				</div>
				<div class="col-2">
					<input type="text" placeholder="Brand Name" id="brand">
				</div>
				<div class="col-1">
					<input type="text" placeholder="Unit" id="uom">
				</div>
				<div class="col-2">
					<input type="text" placeholder="Size" id="size">
				</div>
				<div class="col-2">
					<input type="text" placeholder="Color" id="color">
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-4">
				<table class="tbl-1 mb-10">
					<thead>
						<tr>
							<th width="50%">Purchase Date</th>
							<th width="50%">Purchase Cost</th>
						</tr>
					</thead>
					<tbody id="old-data-table">

					</tbody>
				</table>
			</div>
			<div class="col-4">
				<table class="tbl-1 mb-10">
					<thead>
						<tr>
							<th width="50%">Price Change Date</th>
							<th width="50%">Updated Price</th>
						</tr>
					</thead>
					<tbody id="new-data-table">

					</tbody>
				</table>
			</div>
			<div class="col-4">
				<table class="tbl-1 mb-10">
					<thead>
						<tr>
							<th width="50%">Promo Date</th>
							<th width="50%">Promo Price</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
						<tr>
							<td>10-Apr-22</td>
							<td>275.00</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
@endsection
@section('scripts')
<script>


	//fetch_oldPrice();
	//fetch_newPrice();

	function fetch_oldPrice(query = '') {
		$.ajax({
			url: "{{route('purchase_details.oldprice')}}",
			method: 'GET',
			data: { query: query },
			dataType: 'json',
			success: function (data) {
				//console.log(data);
				$('#old-data-table').html(data.table_data);
				// $('#total_records').text(data.total_data);
			}
		})
	}

	function fetch_newPrice(query = '') {
		$.ajax({
			url: "{{route('purchase_details.newprice')}}",
			method: 'GET',
			data: { query: query },
			dataType: 'json',
			success: function (data) {
				//console.log(data);
				$('#new-data-table').html(data.table_data);
				// $('#total_records').text(data.total_data);
			}
		})
	}

	$('#get-data').on('click', function () {
		var barcode = document.getElementById("barcode").value;

		if (barcode) {
			fetch_oldPrice(barcode);
			fetch_newPrice(barcode);
			$.ajax({
				url: 'product/' + barcode,
				type: "GET",
				dataType: "json",
				success: function (data) {
					$('#barcode_id').val(data.barcode);
					$('#item_name').val(data.item_name);
					$('#brand').val(data.brand.name);
					$('#uom').val(data.unit.name);
					$('#size').val(data.size.name);
					$('#color').val(data.color.name);

				}
			});
		}
	});
	$('#barcode').on('change', function () {
		var productId = $(this).val();
		if (productId) {
			$.ajax({
				url: 'product/' + productId,
				type: "GET",
				dataType: "json",
				success: function (data) {
					$('.name').val(data.item_name);
				}
			});
		}
	});
</script>
@endsection