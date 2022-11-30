@extends('layouts.app_back')
@section('content')
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
                            <input type="text" class="form-control" name="openning_balance" placeholder="Opening Balance">
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
                    <table class="tbl-1 mb-10">
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
                                <td>{{$vend->openning_balance}}</td>
                                <td>
                                    <i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
                                    <a href="#vendorModal" class="vendor-modal" data-id="{{ $vend->id }}"><i class="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;</a>
                                    <i class="fa fa-money"></i>
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
<div class="modal" id="vendorModal">

    <div class="modal-content">
        <h6 class="modal-title" id="">Vendor Edit</h6>
        <div class="add-specs-edit">
        </div>
        <form id="vendordata">
            <div class="modal-body">
                <input type="hidden" id="vendor_id" name="id" value="">

                <div class="row">
                    <input type="text" name="vendor_contact" id="vendor_contact" class="form-control" placeholder="Contact ">
                </div>
                <div class="row">
                    <input type="text" name="vendor_name" id="vendor_name" class="form-control" placeholder="Name ">
                </div>
                <div class="row">
                    <input type="text" name="nid_no" id="nid_no" class="form-control" placeholder="NID ">
                </div>
                <div class="row">
                    <input type="text" name="address" id="address" class="form-control" placeholder="Address ">
                </div>
                <div class="row">
                    <input type="text" name="openning_balance" id="openning_balance" class="form-control" placeholder="Address ">
                </div>
                <div class="row">
                    <select name="vendor_type" id="">
                        <option value>Type of Vendor</option>
                        @foreach ($vendor_types as $vendor)
                        <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="row">
                    <input type="submit" value="Submit" id="weightsubmit" class="btn save-btn">
                </div>
            </div>
        </form>
        <a href="" class="modal-close">&times;</a>
    </div>
</div>
@endsection