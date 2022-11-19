@extends('layouts.app_back')
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">New Purchase</label>
			<label class="tv-tab" for="tv-tab-2">Manage Purchase</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
		<div class="tv-content">
			<h3>Purchase</h3>
			<div class="entry-form">
				<div class="row">
					<div class="col-3">
						<select name="req_no" id="req_no">
							<option value="">Select Requisition</option>
							@foreach ($requisitions as $reqs)
							<option value="{{ $reqs->id }}">{{ $reqs->requisition_no }}</option>
							@endforeach
						</select>
					</div>
				</div>
				<br>
				<form id="demo_form">

					<div class="row">
						<div class="col-4">
							<input type="text" id="barcode" class="form-control" placeholder="Scan Barcode">
							<span class="font-gray">Item Name Here</span>
						</div>
						<div class="col-2">
							<input type="text" id="uom" class="form-control uom" placeholder="UoM">
						</div>
						<div class="col-2">
							<input type="text" id="qty" class="form-control quantity" placeholder="Qty">
						</div>
						<div class="col-2">
							<input type="text" id="unit_price" class="form-control unit_price" placeholder="Old Cost">
						</div>
						<div class="col-2">
							<input type="text" id="new_unit_price" class="form-control new_unit_price" placeholder="New Cost">
						</div>
					</div>

				</form>
				<span>
					<p id="error_msg"></p>
				</span>

				<div class="row">
					<div class="col-9">
					</div>
					<div class="col-3">
						<input type="hidden" id="pros" value="">
						<button class="save-btn addRows">Add</button>
					</div>
				</div>
				<br>
				<div class="row">
					<form action="{{ route('purchase.store') }}" method="POST">
						@csrf
						<h6>Order List</h6>
						<table class="tbl-1 mb-10">
							<thead>
								<tr>
									<th width="5%">SL</th>
									<th width="15%">Barcode</th>
									<th width="27%">Item Name</th>
									<th width="8%">UoM</th>
									<th width="10%">Qty</th>
									<th width="10%">Old Cost</th>
									<th width="10%">New Cost</th>
									<th width="10%">Subtotal</th>
									<th width="5%">...</th>
								</tr>
							</thead>
							<tbody id="item-table">
								<!-- <tr class="bg-light-coral">
									<td>1</td>
									<td>9876543210987</td>
									<td>Nivea Body Lotion</td>
									<td>PCS</td>
									<td><input type="text" class="form-control mb-0" value="1"></td>
									<td><input type="text" class="form-control mb-0" value="275.00" disabled></td>
									<td><input type="text" class="form-control mb-0" value="295.00"></td>
									<td>275.00</td>
									<td><i class="fa fa-trash"></i></td>
								</tr> -->

							</tbody>
						</table>
						<div class="col-12">
							<div class="row order-list">
								<div class="col-2">
									<p>Total</p>
									<!-- <span id="item_total_text"></span> -->
									<input type="text" id="item_total" name="item_total" id="item_total">
								</div>
								<div class="col-3">
									<p><input type="checkbox" id="vatOn">VAT</p>
									<input type="text" id="vat" class="vat" name="vat" id="vat">

								</div>
								<div class="col-2">
									<p>Other Charges</p>
									<input type="text" class="other_charge" name="other_charge" id="other_charge" value="" placeholder="0.00">
								</div>
								<div class="col-2">
									<p>Discount</p>
									<input type="text" class="discount" name="discount" id="discount" value="" placeholder="0.00">
								</div>
								<div class="col-3">
									<p>Grand Total</p>
									<input type="text" name="grand_total" id="grand_total" value="" placeholder="0.00">
									<input type="hidden" class="requisition_id" id="requisition_id" name="requisition_id" value="">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-12">
									<input type="text" name="note" placeholder="Note">
								</div>
							</div>
							<br>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Order</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>


		<input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Purchase Details</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>

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
								<th width="10%">Purchase Date</th>
								<th width="10%">Purchase ID</th>
								<!-- <th width="12%">Vendor Name</th> -->
								<th width="10%">Subtotal</th>
								<th width="5%">VAT</th>
								<th width="10%">Other Charges</th>
								<th width="5%">Discount</th>
								<th width="10%">Grand Total</th>
								<th width="10%">Payment Status</th>
								<th width="10%">Receive Status</th>
								<th width="8%">...</th>
							</tr>
						</thead>
						<tbody>
							@foreach($purchases as $purchase)
							<tr>
								<td>{{$purchase->purchase_date}}</td>
								<td>{{$purchase->purchase_no}}</td>
								<!-- <td>Unilever</td> -->
								<td>{{$purchase->total}}</td>
								<td>{{$purchase->vat}}</td>
								<td>{{$purchase->other_charge}}</td>
								<td>{{$purchase->discount}}</td>
								<td>{{$purchase->grand_total}}</td>
								<td>Partial</td>
								<td>{{$purchase->status}}</td>
								<td>
									<i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
									<i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
									<i class="fa fa-print"></i>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>
	$('#req_no').on('change', function() {
		var reqNo = $(this).val();
		//console.log(reqNo);
		// var parentTr = $(this).closest('tr');

		if (reqNo) {
			$.ajax({
				url: 'prequisition/' + reqNo,
				type: "GET",
				dataType: "json",
				success: function(data) {
					//$('#pros').val(JSON.stringify(data));
					localStorage.setItem('req_data', JSON.stringify(data));

					//var rdata = JSON.stringify(data);

					console.log(data);

					$('.other_charge').val(data[0].reqs.other_charge);
					$('.discount').val(data[0].reqs.discount);
					$('.vat').val(data[0].reqs.vat);
					$('.requisition_id').val(data[0].requisition_id);
					//  $('discount').val(data.unit.name);
				}
			});
		}
	});

	$('#barcode').on('blur', function() {
		var productId = $(this).val();
		//alert(productId);
		//console.log(productId);
		//var parentTr = $(this).parent().closest('td').closest('tr');
		//var parentTr = $(this).closest('tr');
		//  var trid = $(this).closest('tr').attr('id');

		//console.log(index);
		// if (productId) {
		//     $.ajax({
		//         url: 'item/' + productId,
		//         type: "GET",
		//         dataType: "json",
		//         success: function(data) {
		//             $('#pros').val(JSON.stringify(data));
		//             //console.log(data);
		//             $('.unit_cost').val(data.sale_price);
		//             $('.uom').val(data.unit.name);
		//         }
		//     });
		// }
		req_data = JSON.parse(localStorage.getItem('req_data'));
		//console.log(req_data);

		let found = req_data.filter((rdata) => {
			//console.log(rdata);
			return rdata.barcode === productId;
		});
		if (found.length > 0) {
			$('#pros').val(JSON.stringify(found[0]));

			console.log(found[0].unique_id);
			$('.uom').val(found[0].uom);
			$('.quantity').val(found[0].quantity);
			$('.unit_price').val(found[0].unit_price);

		} else {
			document.getElementById("error_msg").innerHTML = "No item found!!";
		}

	});

	$('.addRows').on('click', function() {
		var pros = $('#pros').val();
		addRows(pros);
		//$('#demo_form').reset();
		//total();
		//settlePrice();
	});


	$('#item-table').on('change', '.item_qty', function() {
		var qty = $(this).val();
		var parentTr = $(this).closest('tr');

		price(parentTr);
		settlePrice();
		grandTotal();
	});

	function price(rtr) {
		var parentTr = rtr;
		//var parentTr = $(this).closest('tr');

		var qty = parentTr.find('#item_qty').val();
		console.log(qty);
		var cost = parentTr.find('#new_unit_price').val();
		var total = qty * cost;
		var cost = parentTr.find('#sub_total').val(total);
	}

	function settlePrice() {
		var settlePrice = 0;
		var netAmount = 0;
		$('.sub_total').each(function(i, e) {
			var settle_price = $(this).val() - 0;
			settlePrice += settle_price;
		})
		// $('.sub_total').val(settlePrice.toFixed(2));
		netAmount = settlePrice.toFixed(2);
		console.log(netAmount);
		$('#item_total').val(netAmount);
	}

	function grandTotal() {
		var total = 0;
		total = parseInt(document.getElementById("item_total").value);

		//var othercharge = 0;
		var othercharge = parseInt(document.getElementById("other_charge").value);
		if (othercharge) {
			othercharge = othercharge;
		} else {
			othercharge = 0;
		}
		var discount = parseInt(document.getElementById("discount").value);
		if (discount) {
			discount = discount;
		} else {
			discount = 0;
		}
		var vat = parseInt(document.getElementById("vat").value);
		if (vat) {
			vat = vat;
		} else {
			vat = 1;
		}
		var vatAmount = (total * vat) / 100;
		console.log(vatAmount);

		var grand_total = (((total - discount) + othercharge + vatAmount));
		$('#grand_total').val(grand_total);


		// var cost = parentTr.find('#unit_cost').val();
		// var total = qty * cost;
		// var cost = parentTr.find('#sub_total').val(total);
	}

	function addRows(pros) {
		var parentTr = $(this).closest('tr');
		$sl = 1;
		const obj = JSON.parse(pros);
		var barcode = document.getElementById("barcode").value;
		var qty = document.getElementById("qty").value;
		var unit_price = document.getElementById('unit_price').value;
		var new_unit_price = document.getElementById('new_unit_price').value;
		var uom = document.getElementById('uom').value;
		//console.log(vendor);
		// var item_name = 
		var tr = '<tr>' + +'-' + '<input type="hidden" class="form-control" name="id[]" value="' + obj.item_id + '" ><td>' + $sl + '</td>' + '<td>' + barcode + '<input type="hidden" class="form-control" name="barcode[]" value="' + barcode + '" ></td><td>' + obj.item_name + '<input type="hidden" class="form-control" name="item_name[]" value="' + obj.item_name + '" ></td><td>' + uom + '<input type="hidden" class="form-control" name="uom[]" value="' + uom + '" ></td>' +
			'<td><input type="text" id="item_qty" class="form-control item_qty" name="qty[]" value="' + qty + '" ></td>' +
			'<td>' + unit_price + '<input type="hidden" class="form-control" id="unit_price" name="old_unit_price[]" value="' + unit_price + '" ></td>' + '<td><input type="text" class="form-control" id="new_unit_price" name="new_unit_price[]" value="' + new_unit_price + '" ></td>' +
			'<td><input type="text" class="form-control sub_total" id="sub_total" name="sub_total[]" value="' + new_unit_price * qty + '" ></td><td><a href="javascript:void(0)" class="add-save-btn removes"><i class="fa fa-trash"></i></a></td></tr>';
		$('#item-table').append(tr);

		document.getElementById("demo_form").reset();

		settlePrice();
		grandTotal();
		// var qty = parentTr.find('#item_qty').val();
		// var cost = parentTr.find('#unit_cost').val();
		// var total = qty * cost;
		// var cost = parentTr.find('#sub_total').val(total);
	};

	$('tbody').on('click', '.removes', function() {
		var tolalLen = $('tbody tr').length
		var len = tolalLen - 1;
		if (len == 0) {
			// $('#input_vat').val('');
			// $('#other_charge').val('');
			// $('#agent_commission').val('');
			// $('.net_amount').val('');
			$(this).closest("tr").remove();
			settlePrice();
			// vatAmount();
			// otherCharge();
			// agentCommision();
			// netAmountExcludeAdAmount();
		} else {
			$(this).closest("tr").remove();
			settlePrice();
			// vatAmount();
			// otherCharge();
			// agentCommision();
			// netAmountExcludeAdAmount();
		}

	});
</script>


@endsection