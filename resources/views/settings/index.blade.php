@extends('layouts.app_back')
@section('content')
<div class="row">
	<div class="top-action">
		<div class="tv-tabs">
			<label class="tv-tab" for="tv-tab-1">POS Settings</label>
			<label class="tv-tab" for="tv-tab-2">Item Settings</label>
			<label class="tv-tab" for="tv-tab-3">Company Settings</label>
			<label class="tv-tab" for="tv-tab-4">HR Settings</label>
			<label class="tv-tab" for="tv-tab-5">Other Settings</label>
		</div>
		<input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
		<div class="tv-content">
			<h3>POS Settings</h3>
			<div class="entry-form">
				<div class="row">
					<div class="col-2">
						<form action="{{ route('settings.register.type.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Register No">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Register</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-2">
						<form action="{{ route('vat.type.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="inputValue" class="form-control" placeholder="VAT %">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save VAT</button>
								</div>
							</div>
						</form>
					</div>
				</div>

			</div>
			<br />

			<div class="row">
				<div class="col-2">
					<table>
						<thead>
							<tr>
								<td>Sl</td>
								<td>Name</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>

							@foreach($register as $k=>$v)
							<tr>
								<td>{{$k++}}</td>
								<td>{{$v->name}}</td>
								<td><i class="fa fa-pencil"></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-2">
					<table>
						<thead>
							<tr>
								<td>Sl</td>
								<td>Name</td>
								<td>...</td>
							</tr>
						</thead>
						<tbody>
							@foreach($vat as $k=>$v)
							<tr>
								<td>{{$k++}}</td>
								<td>{{$v->name}}</td>
								<td><i class="fa fa-pencil"></td>
							</tr>
							@endforeach

						</tbody>
					</table>
				</div>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Item Settings</h3>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Unit Name">
							<input type="text" class="form-control" placeholder="Unit No">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Department">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Category">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Brand">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Size">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Color">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<button class="save-btn">Save Unit</button>
						</div>
						<div class="col-2">
							<button class="save-btn">Save Department</button>
						</div>
						<div class="col-2">
							<button class="save-btn">Save Category</button>
						</div>
						<div class="col-2">
							<button class="save-btn">Save Brand</button>
						</div>
						<div class="col-2">
							<button class="save-btn">Save Size</button>
						</div>
						<div class="col-2">
							<button class="save-btn">Save Color</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-3" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Company Settings</h3>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Company Name">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Address">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Contact No">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Trade License">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="TIN No">
						</div>
						<div class="col-2">
							<input type="file" class="form-control" placeholder="Logo">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save Company Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-4" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>HR Settings</h3>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Staff Name">
						</div>
						<div class="col-2">
							<select name="" id="">
								<option value="">Select Designation</option>
								<option value="">Cashier</option>
								<option value="">Manager</option>
							</select>
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Contact No">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Joining Date">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Salary">
						</div>
						<div class="col-2">
							<input type="file" class="form-control" placeholder="Image">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Staff ID">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save HR Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-5" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Other Settings</h3>
			<div class="entry-form">
				<form action="">
					<div class="row">
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Customer Type">
						</div>
						<div class="col-2">
							<input type="text" class="form-control" placeholder="Vendor Type">
						</div>
					</div>
					<div class="row">
						<div class="col-2">
							<button class="save-btn">Save Data</button>
						</div>
						<div class="col-2">
							<button class="save-btn">Save Data</button>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
@endsection

@section('scripts')
@endsection