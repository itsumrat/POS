@extends('layouts.app_back')
@section('styles')
<style>

@page {
            size: 80mm;
            margin: 0;
        }
	  .pos_print {
    width: 270px;
    border: 1px solid #ddd;
    padding: .15in;
  }

  .pos_print p {
      padding: 0;
        margin: 0;
        text-transform: uppercase;
  }
</style>

@endsection
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">Print Barcode</label>
			<label class="tv-tab" for="tv-tab-2">Print Label</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
		<div class="tv-content">
			<h3>Barcode Printing Window</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-2">
							<input type="checkbox"class="barcode"> <span class="float-left">Barcode</span>
						</div>
						<div class="col-2">
							<input type="checkbox" id="itemname" class="item_name"> <span class="float-left">Item Name</span>
						</div>
						<div class="col-2">
							<input type="checkbox" class="selling_price" id="selling_price"> <span class="float-left">Selling Price</span>
						</div>
						<div class="col-2">
							<input type="checkbox" class="promo_price"> <span class="float-left">Promo Price</span>
						</div>
						<div class="col-1">
							<input type="checkbox" class="size"> <span class="float-left">Size</span>
						</div>
						<div class="col-1">
							<input type="checkbox" class="color"> <span class="float-left">Color</span>
						</div>
						<div class="col-1">
							<input type="checkbox" id="unit" class="unit"> <span class="float-left">Unit</span>
						</div>
						<div class="col-1">
							<input type="checkbox" class="expire_date"> <span class="float-left">Expiry</span>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<div id="barcode-view" class="barcode-view pos_print">
								
							</div>
						</div>
						<div class="col-3 offset-1">
							<div class="barcode-generate">
								<input type="button" class="generate_barcode" value="Get Barcode">

						</div>
						</div>

					</div>
					<br>
					<div class="row"></div>
					<br>
					<div class="row">
						<div class="col-3">
							<input type="text" id="barcode" class="form-control" placeholder="Search Barcode">
						</div>
						<div class="col-4">
							<input type="text" class="form-control" id="item_name" disabled value="">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="No of Copy">
						</div>
						<div class="col-2">
							<input type="button" value="Print this page" onClick="printReport()">
							{{-- <button class="save-btn">Print Barcode</button> --}}
						</div>
					</div>
				</form>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Label Printing Window</h3>
			<p><i>Fill up. *marks are mandatory field!</i></p>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-2">
							<input type="checkbox"> <span class="float-left">Barcode</span>
						</div>
						<div class="col-2">
							<input type="checkbox" class="item_name"> <span class="float-left">Item Name</span>
						</div>
						<div class="col-2">
							<input type="checkbox"> <span class="float-left">Selling Price</span>
						</div>
						<div class="col-2">
							<input type="checkbox"> <span class="float-left">Promo Price</span>
						</div>
						<div class="col-1">
							<input type="checkbox"> <span class="float-left">Size</span>
						</div>
						<div class="col-1">
							<input type="checkbox"> <span class="float-left">Color</span>
						</div>
						<div class="col-1">
							<input type="checkbox"> <span class="float-left">Unit</span>
						</div>
						<div class="col-1">
							<input type="checkbox"> <span class="float-left">Expiry</span>
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<div class="barcode-view">
								label sample design
							</div>
						</div>
					</div>
					<br>
					<div class="row"></div>
					<br>
					<div class="row">
						<div class="col-3">
							<input type="text" id="barcode" class="form-control" placeholder="Search Barcode">
						</div>
						<div class="col-4">
							<input type="text" id="item_name" class="form-control" disabled value="">
						</div>
						<div class="col-2">
							<input type="text" id="no_of_copy" class="form-control" placeholder="No of Copy">
						</div>
						<div class="col-2">
							<input type="button" value="Print this page" onClick="printReport()">

							{{-- <button class="save-btn">Print Label</button> --}}
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
<script>

    $('#barcode').on('change', function() {
        var productId = $(this).val();
        if (productId) {
            $.ajax({
                url: 'item/' + productId,
                type: "GET",
                dataType: "json",
                success: function(data) {
					console.log(data);
                    // $('#pros').val(JSON.stringify(data));
                    // //console.log(data);
                    $('#item_name').val(data.item_name);
                    $('.item_name').val(data.item_name);
                    $('.selling_price').val(data.sale_price);
                    $('.promo_price').val(data.sale_price);
                    $('.size').val(data.size.name);
                    $('.color').val(data.color.name);
                    $('.unit').val(data.unit.name);
                    // $('.uom').val(data.unit.name);
                }
            });
        }
    });


    $('.generate_barcode').on('click', function() {
		var barcode = document.getElementById("barcode").value;
			var name;
			var price;

			if(document.getElementById("itemname").checked)
			{
				name = document.getElementById("itemname").value;
			}
			else{
				name ='';
			}		
			if(document.getElementById("selling_price").checked)
			{
				price = document.getElementById("selling_price").value;
			}
			else{
				price ='';
			}		
			if(document.getElementById("unit").checked)
			{
				unit = document.getElementById("unit").value;
			}
			else{
				unit ='';
			}		
            $.ajax({
                url: 'generate-barcode/?barcode=' + barcode,
                type: "GET",
                dataType: "json",
                success: function(data) {
					 var template = data.html;
					$('.barcode-view').html("<p>Item Name: "+name+"</p><br/><p>"+template+"</p><br/><p style='float: left;'>Unit: "+unit+"</p></br><p style='float: right;'>Price: "+price+"</p>");
					
                }
            });

    });

	function printReport()
    {
		
        var prtContent = document.getElementById("barcode-view");
		//alert(prtContent);
        var WinPrint = window.open('', '', 'left=150,top=130,height=400,width=400');
        // WinPrint.document.write( "<link rel='stylesheet' href='style.css' type='text/css' media='print'/>" );
		WinPrint.screenX=0;
		WinPrint.screenY=0;
        WinPrint.document.write(prtContent.innerHTML);
        WinPrint.document.close();
        WinPrint.focus();
        WinPrint.print();
        WinPrint.close();
    }
</script>

@endsection