@extends('layouts.app_back')
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
							<input type="checkbox"> <span class="float-left">Barcode</span>
						</div>
						<div class="col-2">
							<input type="checkbox"> <span class="float-left">Item Name</span>
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
								barcode sample design
							</div>
						</div>
					</div>
					<br>
					<div class="row"></div>
					<br>
					<div class="row">
						<div class="col-3">
							<input type="text" class="form-control" placeholder="Search Barcode">
						</div>
						<div class="col-4">
							<input type="text" class="form-control" disabled value="Nivea Body Lotion 100ml">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="No of Copy">
						</div>
						<div class="col-2">
							<button class="save-btn">Print Barcode</button>
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
							<input type="checkbox"> <span class="float-left">Item Name</span>
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
							<input type="text" class="form-control" placeholder="Search Barcode">
						</div>
						<div class="col-4">
							<input type="text" class="form-control" disabled value="Nivea Body Lotion 100ml">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="No of Copy">
						</div>
						<div class="col-2">
							<button class="save-btn">Print Label</button>
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

</script>

@endsection