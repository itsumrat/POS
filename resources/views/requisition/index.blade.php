@extends('layouts.app_back')
@php
$edit = App\Http\Controllers\PermissionAccess::viewAccess(1,3);
$delete = App\Http\Controllers\PermissionAccess::viewAccess(1,4);
$view = App\Http\Controllers\PermissionAccess::viewAccess(1,1);
$add = App\Http\Controllers\PermissionAccess::viewAccess(1,2);
@endphp
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
<div class="row">
    <div class="top-action">
        <div class="tv-tabs">
            <label class="tv-tab" for="tv-tab-1">New Requisition / Pre-Order</label>
            <label class="tv-tab" for="tv-tab-2">Manage Requisition / Order</label>
        </div>
        <input class="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
        <div class="tv-content">
            <h3>New Requisition / Pre-Order</h3>
            <div class="entry-form">

                <form id="demo_form">
                    <div class="row">
                        <div class="col-3">
                            <select name="vendor_type" id="vendor_type">
                                <option value>Type of Vendor</option>
                                @foreach ($vendor_types as $vendor)
                                <option value="{{ $vendor->id }}">{{ $vendor->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-4">
                            <input type="text" id="barcode" name="barcode" class="form-control barcode"
                                placeholder="Scan Barcode">
                            <span class="font-gray itemName"></span>
                        </div>
                        <div class="col-2">
                            <input type="text" name="uom" class="form-control uom" placeholder="UoM">
                        </div>
                        <div class="col-2">
                            <input type="text" id="qty" name="qty" class="form-control qty" placeholder="Qty">
                        </div>
                        <div class="col-2">
                            <input type="text" name="unit_cost" class="form-control unit_cost" placeholder="Unit Cost">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-9">
                        </div>
                        <div class="col-3">
                            <input type="hidden" id="pros" value="">
                            <a class="save-btn addRows" href="javascript:void(0)">
                                Add
                            </a>
                            <!-- <button class="save-btn addRows">Add</button> -->
                        </div>
                    </div>
                </form>
                <br>
                <div class="row">
                    <form action="{{ route('requisition.store') }}" method="POST">
                        @csrf
                        <h6>Order List</h6>
                        <table class="tbl-1 mb-10">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="15%">Barcode</th>
                                    <th width="32%">Item Name</th>
                                    <th width="10%">UoM</th>
                                    <th width="10%">Qty</th>
                                    <th width="10%">Unit Cost</th>
                                    <th width="12%">Subtotal</th>
                                    <th width="6%">...</th>
                                </tr>
                            </thead>
                            <tbody id="item-table">
                            </tbody>
                        </table>
                        <div class="col-12">
                            <div class="row order-list">
                                <div class="col-2">
                                    <p>Total</p>
                                    <!-- <span id="item_total_text"></span> -->
                                    <input type="text" id="item_total" name="item_total" class="item_total">
                                </div>
                                <div class="col-3">
                                    <p><input type="checkbox" id="vatOn" value="0">VAT</p>
                                    <input type="text" class="vat_amount" name="vat" id="vat" >

                                </div>
                                <div class="col-2">
                                    <p>Other Charges</p>
                                    <input type="text" class="other_charge" name="other_charge" id="other_charge"
                                        value="" placeholder="0.00">
                                </div>
                                <div class="col-2">
                                    <p>Discount</p>
                                    <input type="text" class="discount" name="discount" id="discount" value=""
                                        placeholder="0.00">
                                </div>
                                <div class="col-3">
                                    <p>Grand Total</p>
                                    <input type="text" name="grand_total" id="grand_total" value="" placeholder="0.00">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <input type="text" placeholder="Note">
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-12">
                                    <button class="save-btn">Save Requisition / Order</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>


        <input class="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
        <div class="tv-content">
            <h3>Requisition / Pre-Order Details</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>

            <div class="row">
                <table class="tbl-1 mb-10" id="requisition-table">
                    <thead>
                        <tr>
                            <th width="10%">Req / Order Date</th>
                            <th width="10%">Req / Order ID</th>
                            <th width="12%">Vendor Name</th>
                            <th width="10%">Subtotal</th>
                            <th width="5%">VAT</th>
                            <th width="10%">Other Charges</th>
                            <th width="5%">Discount</th>
                            <th width="10%">Grand Total</th>
                            <th width="10%">Type</th>
                            <th width="8%">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($reqs as $requisition)

                        <tr>

                            <td>{{$requisition->requisition_date}}</td>
                            <td>{{$requisition->requisition_no}}</td>
                            <td>{{$requisition->vendor_id}}</td>
                            <td>{{$requisition->total}}</td>
                            <td>{{$requisition->vat}}</td>
                            <td>{{$requisition->other_charge}}</td>
                            <td>{{$requisition->discount}}</td>
                            <td>{{$requisition->grand_total}}</td>
                            <td>{{$requisition->type}}</td>
                            <td>
                                @if($requisition->type=="order")
                                @if($edit)
                                <a href="#"><i class="fa fa-pencil show_modal"
                                        data-item_id="{{ $requisition->unique_id }}">
                                    </i></a>
                                @endif
                                @if($delete)
                                <a href="#"><i class="fa fa-trash delete_modal"
                                        data-item_id="{{ $requisition->unique_id }}">
                                    </i></a>
                                {{-- <i class="fa fa-pencil"></i> --}}
                                @endif
                                @endif
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
<div class="edit_modal">
    <div id="return" class="edit">
        <div class="modal-content">
            <h6 class="bg-title">Edit Vendor</h6>

                <form class="update_form" method="POST">
                    @csrf
                    <div class="row">
                    <table id="item_edit_table" class="tbl-1 mb-10">
                        <thead>

                        <th width="15%">Barcode</th>
                        <th width="32%">Item Name</th>
                        <th width="10%">UoM</th>
                        <th width="10%">Qty</th>
                        <th width="10%">Unit Cost</th>
                        <th width="12%">Subtotal</th>
                        <th width="6%">...</th>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    </div>
                    <div class="row order-list">
                        <div class="col-2">
                            <p>Total</p>
                            <!-- <span id="item_total_text"></span> -->
                            <input type="text" class="item_total_edit" name="item_total" id="item_total_edit">
                        </div>
                        <div class="col-3">
                            <p><input type="checkbox" id="vatOn_edit" value="">VAT</p>
                            <input type="text" class="vat_edit" name="vat" id="vat_edit">

                        </div>
                        <div class="col-2">
                            <p>Other Charges</p>
                            <input type="text" class="other_charge_edit" name="other_charge" id="other_charge_edit"
                                value="" placeholder="0.00">
                        </div>
                        <div class="col-2">
                            <p>Discount</p>
                            <input type="text" class="discount_edit" name="discount" id="discount_edit" value=""
                                placeholder="0.00">
                        </div>
                        <div class="col-3">
                            <p>Grand Total</p>
                            <input type="text" name="grand_total"  class="grand_total_edit" id="grand_total_edit" value="" placeholder="0.00">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <button class="save-btn">Save</button>
                        </div>
                    </div>
                </form>
              <a href="" class="modal-close">&times;</a>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>

 $(document).on('click', '.show_modal', function() {

    let uniqueId = $(this).data('item_id');
    let updateUrl = '{{ url("requisition") }}/' + uniqueId;

    $.ajax({
        method: "get",
        url: "{{ url('requisition') }}/" + uniqueId,
        success: function(res) {
            for (var car of res.reqs) {
                var newRow = $('<tr>');
                newRow.append('<td>' + car.barcode + '</td>');
                newRow.append('<td>' + car.item_name + '</td>');
                newRow.append('<td>' + car.uom + '</td>');
                newRow.append('<input type="hidden" name="req_item_id[]" value="' + car.id + '">');
                newRow.append('<td><input type="text" class="form-control qty_edit" name="qty[]" value="' + car.quantity + '" ></td>');
                newRow.append('<td><input type="hidden" class="form-control unit_price_edit"  id="unit_price_edit" name="unit_price[]" value="' + car.unit_price + '">' + car.unit_price + '</td>');
                newRow.append('<td><input type="text" class="form-control sub_total_edit" id="sub_total_edit" name="sub_total[]" value="' + car.subtotal + '"></td>');
                newRow.append('<td><a href="javascript:void(0)" class="add-save-btn delete_item removes_edit" data-item_id="'+ car.id  +'"><i class="fa fa-trash"></i></a></td>');
                $('#item_edit_table tbody').append(newRow);
            }
            $(".item_total_edit").val(res.total).change();
            $(".vat_edit").val(res.vat).change();
            $(".other_charge_edit").val(res.other_charge).change();
            $(".discount_edit").val(res.discount).change();
            $(".grand_total_edit").val(res.grand_total).change();
            $('.update_form').attr('action', updateUrl)
        },
        error: function(xhr) {
            console.log(xhr);
        }

    });
    $('.edit, .edit_modal').css("display", "block");
})

$(document).on('click', '.delete_item', function() {

let uniqueId = $(this).data('item_id');
console.log(uniqueId);
let confirmData = confirm("Are you confirm to delete this item!");

if (confirmData == true) {
    $.ajax({
        method: "get",
        url: "{{ url('requisition-details') }}/" + uniqueId + '/delete',
        success: function(res) {
            //return location.reload();
        },
        error: function(xhr) {
            console.log("error");
        }
    });
}

})


$(document).on('click', '.delete_modal', function() {

    let uniqueId = $(this).data('item_id');

    let confirmData = confirm("Are you confirm to delete this item!");

    if (confirmData == true) {
        $.ajax({
            method: "get",
            url: "{{ url('requisition') }}/" + uniqueId + '/delete',
            success: function(res) {
                return location.reload();
            },
            error: function(xhr) {
                console.log("error");
            }
        });
    }

})


$('tbody').on('click', '.removes_edit', function() {
    var tolalLen = $('tbody tr').length
    var len = tolalLen - 1;
    if (len == 0) {
        // $('#input_vat').val('');
        // $('#other_charge').val('');
        // $('#agent_commission').val('');
        // $('.net_amount').val('');
        $(this).closest("tr").remove();
            editSettlePrice();
            editVatAmount();
        // otherCharge();
        // agentCommision();
        // netAmountExcludeAdAmount();
    } else {
        $(this).closest("tr").remove();
        editSettlePrice();
        editVatAmount();
        // otherCharge();
        // agentCommision();
        // netAmountExcludeAdAmount();
    }

});


$('#item_edit_table').on('change', '.qty_edit', function() {
    var qty = $(this).val();
    var parentTr = $(this).closest('tr');

    var cost = parentTr.find('#unit_price_edit').val();
    var total = qty * cost;
    var cost = parentTr.find('#sub_total_edit').val(total);

    editSettlePrice();
    editGrandTotal();
});



function editSettlePrice() {
    var settlePrice = 0;
    var netAmount = 0;
    $('.sub_total_edit').each(function(i, e) {
        var settle_price = $(this).val() - 0;
        settlePrice += settle_price;
    })
     //$('.sub_total').val(settlePrice.toFixed(2));
    netAmount = settlePrice.toFixed(2);
   $('.item_total_edit').val(netAmount);
   editVatAmount();
    editGrandTotal();
}

function editVatAmount() {
            var vatAmount = 0;
            var netAmount = 0;
            var inputVat = 0;
            var settleTotalPrice =  $('.item_total_edit').val();
           // console.log(settleTotalPrice);

            var inputVat = $('#vatOn_edit').val();
            //console.log(inputVat);

            if (inputVat != 0) {
                vatAmount = (settleTotalPrice*inputVat)/100;
            }
           // console.log(vatAmount);


            //netAmount = parseInt(settleTotalPrice) + Math.floor(vatAmount);
            //console.log(netAmount);
            $('.vat_edit').val(Math.floor(vatAmount));
            // if (inputVat != 0) {
            //     $('.net_amount').val(netAmount.toFixed(2));
            //     $('.vatSettleAmount').val(netAmount.toFixed(2));
            // }else{
            //     $('.net_amount').val(parseInt(settleTotalPrice).toFixed(2));
            // }
            editGrandTotal();

        }


        $('#vatOn_edit').on('change', function() {
    if (this.checked) {
        $.ajax({
            url: 'reqvat',
            type: "GET",
            dataType: "json",
            success: function(data) {
                // $('#pros').val(JSON.stringify(data));
               // console.log(data);
                $('#vatOn_edit').val(data.name);
                editVatAmount();
                grandTotal();
                // $('.uom').val(data.unit.name);
            }
        });
    }
    else{
        $('#vat_edit').val(0);

    }
});
function editGrandTotal() {
    var total = 0;
    total = parseInt(document.getElementById("item_total_edit").value);

    //var othercharge = 0;
    var othercharge = parseInt(document.getElementById("other_charge_edit").value);
    if (othercharge) {
        othercharge = othercharge;
    } else {
        othercharge = 0;
    }
    var discount = parseInt(document.getElementById("discount_edit").value);
    if (discount) {
        discount = discount;
    } else {
        discount = 0;
    }
    var vat = parseInt(document.getElementById("vat_edit").value);
    // if (vat) {
    //     vat = vat;
    // } else {
    //     vat = 1;
    // }
    // var vatAmount = (total * vat) / 100;
    // console.log(vatAmount);

    var grand_total = (((total - discount) + othercharge + vat));
    $('#grand_total_edit').val(grand_total);


    // var cost = parentTr.find('#unit_cost').val();
    // var total = qty * cost;
    // var cost = parentTr.find('#sub_total').val(total);
}











$(document).ready(function() {
    $('#requisition-table').DataTable({
        scrollX: false,
    });
});

$(function() {
    $('#demo_form').on('submit', function(event) {
        event.preventDefault();
        event.stopPropagation();
        alert("Form Submission prevented / stopped.");
    });
});
$('#barcode').on('change', function() {
    var productId = $(this).val();
    var parentTr = $(this).closest('tr');
    if (productId) {
        $.ajax({
            url: 'item/' + productId,
            type: "GET",
            dataType: "json",
            success: function(data) {
                $('#pros').val(JSON.stringify(data));
                //console.log(data);
                $('.unit_cost').val(data.sale_price);
                $('.itemName').text(data.item_name);
                $('.uom').val(data.unit.name);
            }
        });
    }
});

$('#vatOn').on('change', function() {
    if (this.checked) {
        $.ajax({
            url: 'reqvat',
            type: "GET",
            dataType: "json",
            success: function(data) {
                // $('#pros').val(JSON.stringify(data));
                console.log(data);
                $('#vatOn').val(data.name);
                vatAmount();
                grandTotal();
                // $('.uom').val(data.unit.name);
            }
        });
    }
    else{
        $('.vat_amount').val(0);

    }
});

$('.addRows').on('click', function() {
    var pros = $('#pros').val();
    addRows(pros);
    //$('#demo_form').reset();
    //total();
    settlePrice();
});


$('#item-table').on('change', '.item_qty', function() {
    var qty = $(this).val();
    var parentTr = $(this).closest('tr');

    var cost = parentTr.find('#unit_cost').val();
    var total = qty * cost;
    var cost = parentTr.find('#sub_total').val(total);

    settlePrice();
    grandTotal();
});
$('#other_charge,#discount').on('change', function() {
    //alert('ok');
    settlePrice();
    grandTotal();
});

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
    vatAmount();
    grandTotal();
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
    // if (vat) {
    //     vat = vat;
    // } else {
    //     vat = 1;
    // }
    // var vatAmount = (total * vat) / 100;
    // console.log(vatAmount);

    var grand_total = (((total - discount) + othercharge + vat));
    $('#grand_total').val(grand_total);


    // var cost = parentTr.find('#unit_cost').val();
    // var total = qty * cost;
    // var cost = parentTr.find('#sub_total').val(total);
}


function vatAmount() {
            var vatAmount = 0;
            var netAmount = 0;
            var inputVat = 0;
            var settleTotalPrice =  $('.item_total').val();
           // console.log(settleTotalPrice);

            var inputVat = $('#vatOn').val();
            //console.log(inputVat);

            if (inputVat != 0) {
                vatAmount = (settleTotalPrice*inputVat)/100;
            }
           // console.log(vatAmount);


            //netAmount = parseInt(settleTotalPrice) + Math.floor(vatAmount);
            //console.log(netAmount);
            $('.vat_amount').val(Math.floor(vatAmount));
            // if (inputVat != 0) {
            //     $('.net_amount').val(netAmount.toFixed(2));
            //     $('.vatSettleAmount').val(netAmount.toFixed(2));
            // }else{
            //     $('.net_amount').val(parseInt(settleTotalPrice).toFixed(2));
            // }
        }

        // function total() {
        //     var sub_total = document.getElementById("sub_total").value;
        //     var total = +sub_total;
        //     //  console.log(total);
        // }
// start Add row for sale item
function addRows(pros) {
    var parentTr = $(this).closest('tr');
    $sl = 1;
    const obj = JSON.parse(pros);
    console.log(obj);
    var qty = document.getElementById("qty").value;
    var vendor = document.getElementById('vendor_type').value;
    //console.log(vendor);
    // var item_name = 
    var tr = '<tr>' + +'-' + '<input type="hidden" class="form-control" name="id[]" value="' + obj.id + '" ><td>' + $sl + '</td>' + '<td>' + obj.barcode + '<input type="hidden" class="form-control" name="barcode[]" value="' + obj.barcode + '" ></td><td>' + obj.item_name + '<input type="hidden" class="form-control" name="item_name[]" value="' + obj.item_name + '" ></td><td>' + obj.unit.name + '<input type="hidden" class="form-control" name="uom[]" value="' + obj.unit.name + '" ></td>' +
        '<td><input type="text" id="item_qty" class="form-control item_qty" name="qty[]" value="' + qty + '" ></td>' +
        '<td>' + obj.sale_price + '<input type="hidden" class="form-control" id="unit_cost" name="unit_cost[]" value="' + obj.sale_price + '" ></td>' +
        '<td><input type="text" class="form-control sub_total" id="sub_total" name="sub_total[]" value="" ></td><td><a href="javascript:void(0)" class="add-save-btn removes"><i class="fa fa-trash"></i></a></td><input class="text" name="vendor" type="hidden" value="' + vendor + '"/></tr>';
    $('#item-table').append(tr);

    document.getElementById("demo_form").reset();

    var qty = parentTr.find('#item_qty').val();
    var cost = parentTr.find('#unit_cost').val();
    var total = qty * cost;
    var cost = parentTr.find('#sub_total').val(total);
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
            vatAmount();
        // otherCharge();
        // agentCommision();
        // netAmountExcludeAdAmount();
    } else {
        $(this).closest("tr").remove();
        settlePrice();
        vatAmount();
        // otherCharge();
        // agentCommision();
        // netAmountExcludeAdAmount();
    }

});
</script>
@endsection