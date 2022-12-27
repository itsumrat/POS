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
			<div class="float-left col-4">
			</div>
			<div class="col-4"></div>
			<div class="float-right col-4">
				<button class="save-btn bg-green" id="adjust-btn">Make Adjustment</button>
				<button class="save-btn bg-coral" id="damage-btn">Mark As Damage</button>
			</div>
		</div>
		<table class="tbl-1 mb-10" id="tblData">
			<thead>
				<tr>
					<th width="5%"><input type="checkbox" id="chkAll"></th>
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
				</tr>
			</thead>
			<tbody>
				@foreach($stocks as $stock)
				<tr>
					<input type="hidden" name="item_id[]" class="item_id item{{$stock->id}}" value="{{$stock->item_id}}">
					<td><input type="checkbox" name="stockid[]" class="inv_check" value="{{$stock->id}}"></td>
					<td>{{$stock->barcode}}</td>
					<td>{{$stock->item_name}}Lotion</td>
					<td>{{$stock->department}}</td>
					<td>{{$stock->category}}</td>
					<td>{{$stock->brand}}</td>
					<td>{{$stock->uom}}</td>
					<td>{{$stock->size}}</td>
					<td>{{$stock->color}}</td>
					<td><input id="system-quantity" class="system-quantity " type="text" name="system-quantity"
							value="{{$stock->quantity}}"></td>
					<td><input class="physical-quantity pq{{$stock->id}}" type="text" name="physical-quantity"
							value="{{$stock->quantity}}"></td>
					<td><input id="variance" class="variance{{$stock->id}}" disabled type="text" value=""></td>
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
      $('#tblData').on('change', '.inv_check', function () {
        if ($('.inv_check:checked').length == $('.inv_check').length) {
          $('#chkAll').prop('checked', true);
        } else {
          $('#chkAll').prop('checked', false);
        }
   });

      $("#chkAll").change(function () {
        if ($(this).prop('checked')) {
          $('.inv_check').not(this).prop('checked', true);
        } else {
          $('.inv_check').not(this).prop('checked', false);
        }
      });
	  $('#tblData').DataTable({
			scrollX: false,
		});
    });
	$('.physical-quantity').on('change', function() {
			var physicalQuantity  = $(this).val();
			var parentTr = $(this).closest('tr');
			const  systemQuantity = parentTr.find('#system-quantity').val();
	if (systemQuantity > physicalQuantity) {
				var variance =  systemQuantity - physicalQuantity;
			}
			else{
				var variance = physicalQuantity - systemQuantity;

			}
			parentTr.find('#variance').val(variance);
		});
		
		$(document).on('click','#adjust-btn', function(e) {
		e.preventDefault();
		const stock_info = [];
			$('.inv_check').each(function () {
				var variance = $('.variance'+$(this).val()).val();
				if ($(this).is(":checked") && variance !=="" ) {
					var status = "Adjust";
					var pq = $('.pq'+$(this).val()).val();
					var item_id = $('.item'+$(this).val()).val();
					stock_info.push({'id':$(this).val(), 'pq':pq,'item_id':item_id, 'status':status});
				}
			});
	        $.ajax({
			url: '{{route('inventory.store')}}',
			type: 'POST',
			data: {
			"_token":"{{csrf_token()}}",
			stock_info:stock_info
			},
			success: function(response) {
				console.log(response);
			}
            });
		});

		$(document).on('click','#damage-btn', function(e) {
		e.preventDefault();
		const stock_info = [];
			$('.inv_check').each(function () {
				var variance = $('.variance'+$(this).val()).val();
				if ($(this).is(":checked") && variance !=="" ) {
					var status = "Damage";
					var pq = $('.pq'+$(this).val()).val();
					var item_id = $('.item'+$(this).val()).val();
					stock_info.push({'id':$(this).val(), 'pq':pq,'item_id':item_id, 'status':status});
				}
			});
	        $.ajax({
			url: '{{route('inventory.store')}}',
			type: 'POST',
			data: {
			"_token":"{{csrf_token()}}",
			stock_info:stock_info
			},
			success: function(response) {
				console.log(response);
			}
            });
		});

</script>
@endsection