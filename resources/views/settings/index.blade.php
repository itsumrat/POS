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
					<div class="col-4">
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
					<div class="col-4">
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
				<div class="col-4">
					<table class="settings-table">
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
								<td><i class="fa fa-pencil"></i></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-3 ">
					<table class="settings-table">
						<thead>
							<tr>
								<td>Name</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($vat as $k=>$v)
							<tr>
								<td>{{$v->name}}</td>
								<td><i class="fa fa-pencil"></i></td>
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
				<div class="row">
					<div class="col-2">
						<form action="{{ route('unit.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" class="form-control" name="name" placeholder="Unit Name">
									<input type="text" class="form-control" name="unit_no" placeholder="Unit No">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Unit</button>
								</div>
							</div>
						</form>
					</div>

					<div class="col-2">
						<form action="{{ route('department.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Department">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Department</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-2">
						<form action="{{ route('category.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Category">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Category</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-2">
						<form action="{{ route('brand.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Brand">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Brand</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-2">
						<form action="{{ route('size.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Size">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Size</button>
								</div>
							</div>
						</form>
					</div>
					<div class="col-2">
						<form action="{{ route('color.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Color">
								</div>
							</div>
							<div class="row">
								<div class="col-12">
									<button class="save-btn">Save Color</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
		<input class="tv-radio" id="tv-tab-3" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Company Settings</h3>
			<div class="entry-form">
				<form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">

					@csrf
					<div class="row">
						<div class="col-2">
							<input type="text" name="name" class="form-control" placeholder="Company Name">
						</div>
						<div class="col-2">
							<input type="text" name="address" class="form-control" placeholder="Address">
						</div>
						<div class="col-2">
							<input type="text" name="contact_no" class="form-control" placeholder="Contact No">
						</div>
						<div class="col-2">
							<input type="text" name="trade_license_no" class="form-control" placeholder="Trade License">
						</div>
						<div class="col-2">
							<input type="text" name="tin_no" class="form-control" placeholder="TIN No">
						</div>
						<div class="col-2">
							<input type="file" name="profile_image" class="form-control" placeholder="Logo">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save Company Data</button>
						</div>
					</div>
				</form>
			</div>
			<br>

			<table class="hr-table">
				<thead>
					<tr>
						<td>Sl</td>
						<td>Name</td>
						<td>Address</td>
						<td>Contact No</td>
						<td>Trade License</td>
						<td>TIN</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>

					@foreach($companies as $k=>$v)
					<tr>
						<td>{{$k++}}</td>
						<td>{{$v->name}}</td>
						<td>{{$v->address}}</td>
						<td>{{$v->contact_no}}</td>
						<td>{{$v->trade_license_no}}</td>
						<td>{{$v->tin_no}}</td>
						<td><i class="fa fa-pencil"></i></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<input class="tv-radio" id="tv-tab-4" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>HR Settings</h3>
			<div class="entry-form">
				<form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-2">
							<input type="text" class="form-control" name='name' placeholder="Staff Name">
						</div>
						<div class="col-2">
							<select name="role_id" id="role_id">
								<option value="">Select Designation</option>
								@foreach ($roles as $role)
								<option value="{{ $role->id }}">{{ $role->name }}</option>
								@endforeach
							</select>
						</div>
						<div class="col-2">
							<input type="text" name="contact" class="form-control" placeholder="Contact No">
						</div>
						<div class="col-2">
							<input type="text" name="joining_date" class="form-control" placeholder="Joining Date">
						</div>
						<div class="col-2">
							<input type="text" name="salary" class="form-control" placeholder="Salary">
						</div>
						<div class="col-2">
							<input type="file" name="profile_pic" class="form-control" placeholder="Image">
						</div>
						<div class="col-2">
							<input type="text" name="staff_id" class="form-control" placeholder="Staff ID">
						</div>
						<div class="col-2">
							<input type="text" name="password" class="form-control" placeholder="Password">
						</div>
					</div>
					<div class="row">
						<div class="col-3">
							<button class="save-btn">Save HR Data</button>
						</div>
					</div>
				</form>
			</div>
			<br>

			<table class="hr-table">
				<thead>
					<tr>
						<td>Sl</td>
						<td>Name</td>
						<td>Designation</td>
						<td>Contact No</td>
						<td>Joining Date</td>
						<td>Salary</td>
						<td>Staff ID</td>
						<td>Action</td>
					</tr>
				</thead>
				<tbody>

					@foreach($users as $k=>$v)
					<tr>
						<td>{{$k++}}</td>
						<td>{{$v->name}}</td>
						<td>{{$v->role->name}}</td>
						<td>{{$v->contact}}</td>
						<td>{{$v->joining_date}}</td>
						<td>{{$v->salary}}</td>
						<td>{{$v->staff_id}}</td>
						<td><i class="fa fa-pencil"></i></td>
					</tr>
					@endforeach
				</tbody>
			</table>
		</div>
		<input class="tv-radio" id="tv-tab-5" name="tv-group" type="radio" />
		<div class="tv-content">
			<h3>Other Settings</h3>
			<div class="entry-form">
				<div class="row">
					<div class="col-4">
						<form action="{{ route('customer.type.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Customer Type"">
								</div>
							</div>
							<div class=" row">
									<div class="col-12">
										<button class="save-btn">Save Data</button>
									</div>
								</div>
						</form>
					</div>
					<div class="col-4">
						<form action="{{ route('vendor.type.store') }}" method="POST">
							@csrf
							<div class="row">
								<div class="col-12">
									<input type="text" name="name" class="form-control" placeholder="Vendor Type"">
								</div>
							</div>
							<div class=" row">
									<div class="col-12">
										<button class="save-btn">Save Data</button>
									</div>
								</div>
						</form>
					</div>
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-4">
					<table class="settings-table">
						<thead>
							<tr>
								<td>Sl</td>
								<td>Name</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>

							@foreach($customer_types as $k=>$v)
							<tr>
								<td>{{$k++}}</td>
								<td>{{$v->name}}</td>
								<td><i class="fa fa-pencil"></i></td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="col-4">
					<table class="settings-table">
						<thead>
							<tr>
								<td>Name</td>
								<td>Action</td>
							</tr>
						</thead>
						<tbody>
							@foreach($vendor_types as $k=>$v)
							<tr>
								<td>{{$v->name}}</td>
								<td><i class="fa fa-pencil"></i></td>
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
	$(document).ready(function () {
		$('.settings-table').DataTable({
			scrollX: false,
			paging: false,
			searching: false,
			ordering: false,
			info: false,
		});
		$('.hr-table').DataTable({
			scrollX: false,

		});
	});
</script>

@endsection