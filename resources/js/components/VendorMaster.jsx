import React, { Component } from 'react';
import NavBar from '../NavBar';

class VendorMaster extends Component {
    render() {
        return (
            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <label className="tv-tab" htmlFor="tv-tab-1">Create Vendor</label>
                                    <label className="tv-tab" htmlFor="tv-tab-2">Manage Vendor</label>
                                    <label className="tv-tab" htmlFor="tv-tab-3">Vendor Ledger</label>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
                                <div className="tv-content">
                                    <h3>New Vendor Entry</h3>
                                    <div className="entry-form">
                                        <form action="">
                                            <div className="row">
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="Vendor Contact" />
                                                </div>
                                                <div className="col-3">
                                                    <input type="text" className="form-control" placeholder="Vendor Name" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="NID No" />
                                                </div>
                                                <div className="col-5">
                                                    <input type="text" className="form-control" placeholder="Address" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="Opening Balance" />
                                                </div>
                                                <div className="col-2">
                                                    <select name="" id="">
                                                        <option value="">Type of Vendor</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-3">
                                                    <button className="save-btn">Save Vendor Data</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>

                                <input className="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
                                <div className="tv-content">
                                    <h3>Manage Vendor</h3>
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
                                                    <tr>
                                                        <td>546444</td>
                                                        <td>01894943850</td>
                                                        <td>Mohiuddin Rubel</td>
                                                        <td>9196221346797</td>
                                                        <td>192, Chawkbazar, Chottogram</td>
                                                        <td>Regular</td>
                                                        <td>0.00</td>
                                                        <td>
                                                            <i className="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
                                                            <i className="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
                                                            <i className="fa fa-money"></i>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>

                                <input className="tv-radio" id="tv-tab-3" name="tv-group" type="radio" />
                                <div className="tv-content">
                                    <h3>Vendor Transactions</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>

                                    <div className="row">
                                        <div className="col-3">
                                            <select name="" id="">
                                                <option value="">Select Vendor</option>
                                            </select>
                                        </div>
                                        <div className="col-3">
                                            <input type="date" name="" id="" />
                                        </div>
                                        <div className="col-3">
                                            <input type="date" name="" id="" />
                                        </div>
                                    </div>
                                    <br />
                                    <div className="row">
                                        <div className="col-3">
                                            <button className="save-btn">Search</button>
                                        </div>
                                    </div>
                                    <br />
                                    <div className="row">
                                        <div className="bottom-report">
                                            <div className="col-12">
                                                <button className="save-btn float-right mb-10">Print Ledger</button>
                                            </div>
                                            <div className="tbl-action-btn">
                                                <div className="row">
                                                    <div className="col-3">
                                                        <input className="form-control" placeholder="Customer Name" />
                                                    </div>
                                                    <div className="col-2">
                                                        <input type="text" placeholder="Opening Balance" />
                                                    </div>
                                                    <div className="col-2">
                                                        <input type="text" placeholder="Total Trnx Amount" />
                                                    </div>
                                                    <div className="col-2">
                                                        <input type="text" placeholder="Total Paid" />
                                                    </div>
                                                    <div className="col-3">
                                                        <input type="text" placeholder="Current Balance" />
                                                    </div>
                                                </div>
                                            </div>
                                            <table className="tbl-1 mb-10">
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
                    </div>
                </div>
            </div>
        );
    }
}

export default VendorMaster;
