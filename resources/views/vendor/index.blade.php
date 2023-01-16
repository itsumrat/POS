@extends('layouts.app_back')
@section('styles')
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
            <label class="tv-tab" for="tv-tab-1">Create Vendor</label>
            <label class="tv-tab" for="tv-tab-2">Manage Vendor</label>
            <label class="tv-tab" for="tv-tab-3">Vendor Ledger</label>
        </div>
        <input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
        <div class="tv-content">
            <h3>New Vendor Entry</h3>
            <div class="entry-form">
                <form action="{{ route('vendor.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-2">
                            <input type="text" class="form-control" name="vendor_contact" placeholder="Vendor Contact">
                        </div>
                        <div class="col-3">
                            <input type="text" class="form-control" name="vendor_name" placeholder="Vendor Name">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="nid_no" placeholder="NID No">
                        </div>
                        <div class="col-5">
                            <input type="text" class="form-control" name="address" placeholder="Address">
                        </div>
                        <div class="col-2">
                            <input type="text" class="form-control" name="opening_balance" placeholder="Opening Balance">
                        </div>
                        <div class="col-2">
                            <select name="vendor_type" id="">
                                <option value>Type of Vendor</option>
                                @foreach ($vendor_types as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-3">
                            <button class="save-btn">Save Vendor Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
        <div class="tv-content">
            <h3>Manage Vendor</h3>
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
                    <table id="vendor-table" class="tbl-1 mb-10">
                        <thead>
                            <tr>
                                <th width="8%">Vendor ID</th>
                                <th width="8%">Contact No</th>
                                <th width="15%">Vendor Name</th>
                                <th width="10%">NID No</th>
                                <th width="25%">Address</th>
                                <th width="10%">Vendor Type</th>
                                <th width="14%">Opening Balance</th>
                                <th width="15%">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($vendors as $vend)
                            <tr>
                                <td>{{$vend->id}}</td>
                                <td>{{$vend->vendor_contact}}</td>
                                <td>{{$vend->vendor_name}}</td>
                                <td>{{$vend->nid_no}}</td>
                                <td>{{$vend->address}}</td>
                                <td>{{$vend->vendor_type}}</td>
                                <td>{{$vend->opening_balance}}</td>
                                <td>
                                    @if($edit)
                                    <a href="#"><i class="fa fa-pencil show_modal" data-item_id="{{ $vend->unique_id }}"></i></a>
                                @endif
                                @if($delete)
                                    <a href="#"><i class="fa fa-trash delete_modal" data-item_id="{{ $vend->unique_id }}"></i></a>
                                    {{-- <i class="fa fa-pencil"></i> --}}
                                @endif
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <input class="tv-radio" id="tv-tab-3" name="tv-group" type="radio" />
        <div class="tv-content">
            <h3>Vendor Transactions</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>

            <div class="row">
                <div class="col-3">
                    <select name="" id="">
                        <option value="">Select Vendor</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="date" name="" id="">
                </div>
                <div class="col-3">
                    <input type="date" name="" id="">
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-3">
                    <button class="save-btn">Search</button>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="bottom-report">
                    <div class="col-12">
                        <button class="save-btn float-right mb-10">Print Ledger</button>
                    </div>
                    <div class="tbl-action-btn">
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control" placeholder="Customer Name">
                            </div>
                            <div class="col-2">
                                <input type="text" placeholder="Opening Balance">
                            </div>
                            <div class="col-2">
                                <input type="text" placeholder="Total Trnx Amount">
                            </div>
                            <div class="col-2">
                                <input type="text" placeholder="Total Paid">
                            </div>
                            <div class="col-3">
                                <input type="text" placeholder="Current Balance">
                            </div>
                        </div>
                    </div>
                    <table class="tbl-1 mb-10">
                        <thead>
                            <tr>
                                <th width="15%">Trnx Date</th>
                                <th width="30%">Particulars</th>
                                <th width="20%">Note</th>
                                <th width="10%">Trnx Amount</th>
                                <th width="10%">Paid</th>
                                <th width="15%">Balance</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>10-Apr-22</td>
                                <td>Trnx#1001</td>
                                <td>Grocery Purchase</td>
                                <td>8,700.00</td>
                                <td>8,700.00</td>
                                <td>0.00</td>
                            </tr>
                            <tr>
                                <td>10-Apr-22</td>
                                <td>Trnx#4344</td>
                                <td>Grocery Purchase</td>
                                <td>2,800.00</td>
                                <td>2,000.00</td>
                                <td>800.00</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Vendor Modal -->
{{-- <div class="action-btns">
	<a class="action-btn show_modal" href="javascript:">Return</a>
</div> --}}
<div class="edit_modal">
	<div id="return" class="edit">
		<div class="modal-content">
			<h6 class="bg-title">Edit Vendor</h6>
	
			<div class="entry-form">

				<form class="update_form" method="POST">
					@csrf
					<div class="row">
                        <div class="col-4">
							<input type="text" name="vendor_name" class="form-control vendor_name_edit" placeholder="Vendor Name">
						</div>
						<div class="col-4">
							<input type="text" name="vendor_contact" class="form-control vendor_contact_edit" placeholder="Vendor Contact">
						</div>
						<div class="col-4">
							<input type="text" name="opening_balance" class="form-control opening_balance_edit" placeholder="Opening Balance">
						</div>
					</div>
					<br>
                    <div class="row">
                        <div class="col-4">
							<input type="text" name="nid_no" class="form-control nid_no_edit" placeholder="NID">
						</div>
						<div class="col-4">
							<input type="text" name="address" class="form-control address_edit" placeholder="Address">
						</div>
                        <div class="col-4">
							<select name="vendor_type" id="" class="form-control vendor_type_edit">
								<option value="">Select Vendor Type</option>
								@foreach ($vendor_types as $key=>$value)
								<option value="{{ $value->id }}">{{ $value->name }}</option>
								@endforeach
							</select>
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

@endsection

@section('scripts')
<script>

	$(document).on('click', '.show_modal', function(){

		let uniqueId = $(this).data('item_id');
		let updateUrl = '{{ url("vendor") }}/'+uniqueId;

		$.ajax({
			method: "get",
			url: "{{ url('vendor') }}/"+uniqueId,
			success: function(res){
            console.log(res);
				// $( ".brand_edit").val(res.brand_id).change();
				// $( ".department_edit").val(res.department_id).change();
				// $( ".color_edit").val(res.color_id).change();
				 $( ".opening_balance_edit").val(res.opening_balance).change();
				 $( ".address_edit").val(res.address).change();
				$( ".nid_no_edit").val(res.nid_no).change();
				 $( ".vendor_contact_edit").val(res.vendor_contact).change();
				$( ".vendor_type_edit").val(res.vendor_type).change();
				// $( ".unit_edit").val(res.unit_id).change();
				 $( ".vendor_name_edit").val(res.vendor_name).change();
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
				url: "{{ url('vendor') }}/"+uniqueId+'/delete',
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
		$('#vendor-table').DataTable({
			scrollX: false,
		});
	});
</script>

@endsection