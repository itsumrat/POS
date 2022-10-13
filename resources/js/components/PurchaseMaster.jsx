import React, { Component } from 'react';
import NavBar from '../NavBar';

class Purchasemaster extends Component {
    render() {
        return (
            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <label className="tv-tab" htmlFor="tv-tab-1">New Purchase</label>
                                    <label className="tv-tab" htmlFor="tv-tab-2">Manage Purchase</label>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
                                <div className="tv-content">
                                    <h3>Purchase</h3>
                                    <div className="entry-form">
                                        <form action="">
                                            <div className="row">
                                                <div className="col-3">
                                                    <select name="" id="">
                                                        <option value="">Select Vendor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <div className="row">
                                                <div className="col-4">
                                                    <input type="text" className="form-control" placeholder="Scan Barcode" />
                                                    <span className="font-gray">Item Name Here</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="UoM" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="Qty" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="Old Cost" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="New Cost" />
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-9">
                                                </div>
                                                <div className="col-3">
                                                    <button className="save-btn">Add</button>
                                                </div>
                                            </div>
                                            <br />
                                            <div className="row">
                                                <h6>Order List</h6>
                                                <table className="tbl-1 mb-10">
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
                                                    <tbody>
                                                        <tr className="bg-light-coral">
                                                            <td>1</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr className="bg-light-coral">
                                                            <td>4</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>1</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>3</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                        <tr>
                                                            <td>4</td>
                                                            <td>9876543210987</td>
                                                            <td>Nivea Body Lotion</td>
                                                            <td>PCS</td>
                                                            <td><input type="text" className="form-control mb-0" value="1" /></td>
                                                            <td><input type="text" className="form-control mb-0" value="275.00" disabled /></td>
                                                            <td><input type="text" className="form-control mb-0" value="295.00" /></td>
                                                            <td>275.00</td>
                                                            <td><i className="fa fa-trash"></i></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                                <div className="col-12">
                                                    <div className="row order-list">
                                                        <div className="col-2">
                                                            <p>Total</p>
                                                            <span>2,750.00</span>
                                                        </div>
                                                        <div className="col-3">
                                                            <p><input type="checkbox" name="vatOn" id="" />VAT</p>
                                                            <span>0.00</span>
                                                        </div>
                                                        <div className="col-2">
                                                            <p>Other Charges</p>
                                                            <input type="text" placeholder="0.00" />
                                                        </div>
                                                        <div className="col-2">
                                                            <p>Discount</p>
                                                            <input type="text" placeholder="0.00" />
                                                        </div>
                                                        <div className="col-3">
                                                            <p>Grand Total</p>
                                                            <span>3,075.00</span>
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div className="row">
                                                        <div className="col-12">
                                                            <input type="text" placeholder="Note" />
                                                        </div>
                                                    </div>
                                                    <br />
                                                    <div className="row">
                                                        <div className="col-12">
                                                            <button className="save-btn">Save Order</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <input className="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
                                <div className="tv-content">
                                    <h3>Purchase Details</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>

                                    <div className="row">
                                        <div className="bottom-report">
                                            <div className="tbl-action-btn">
                                                <div className="float-left col-3">
                                                    <input className="form-control" placeholder="Search by order#, name..." />
                                                </div>
                                                <div className="col-6"></div>
                                                <div className="float-right col-3">
                                                    <span>Filters <i className="fa fa-angle-down"></i></span> <i className="fa fa-ellipsis-h"></i>
                                                </div>
                                            </div>
                                            <table className="tbl-1 mb-10">
                                                <thead>
                                                    <tr>
                                                        <th width="10%">Purchase Date</th>
                                                        <th width="10%">Purchase ID</th>
                                                        <th width="12%">Vendor Name</th>
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
                                                    <tr>
                                                        <td>10-Apr-22</td>
                                                        <td>4656446</td>
                                                        <td>Unilever</td>
                                                        <td>13,000.00</td>
                                                        <td>2,000.00</td>
                                                        <td>0.00</td>
                                                        <td>0.00</td>
                                                        <td>15,000.00</td>
                                                        <td>Partial</td>
                                                        <td>Received</td>
                                                        <td>
                                                            <i className="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
                                                            <i className="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
                                                            <i className="fa fa-print"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default Purchasemaster;
