import React, { Component } from 'react';
import NavBar from '../NavBar';

class InventoryMaster extends Component {
    render() {
        return (
            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <label className="tv-tab" htmlFor="tv-tab-1">Item Stock Details</label>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
                                <div className="tv-content">
                                    <h3>Inventory Master</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>
                                    <div className="entry-form">
                                        <form action="">
                                            <div className="row">
                                                <div className="col-3">
                                                    <input type="text" className="form-control" placeholder="Barcode" />
                                                </div>
                                                <div className="col-3">
                                                    <select name="" id="" className="form-control">
                                                        <option value="">Select Department</option>
                                                        <option value="">Department 1</option>
                                                    </select>
                                                </div>
                                                <div className="col-3">
                                                    <select name="" id="" className="form-control">
                                                        <option value="">Select Category</option>
                                                        <option value="">Category 1</option>
                                                    </select>
                                                </div>
                                                <div className="col-3">
                                                    <select name="" id="" className="form-control">
                                                        <option value="">Select Brand</option>
                                                        <option value="">Brand 1</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <br />
                                            <div className="row">
                                                <div className="col-3">
                                                    <button className="save-btn">Search</button>
                                                </div>
                                                <div className="col-3">
                                                    <button className="save-btn">Search</button>
                                                </div>
                                                <div className="col-3">
                                                    <button className="save-btn">Search</button>
                                                </div>
                                                <div className="col-3">
                                                    <button className="save-btn">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>


                                <div className="bottom-report">
                                    <div className="tbl-action-btn">
                                        <div className="float-left col-3">
                                            <input className="form-control" placeholder="Search by order#, name..." />
                                        </div>
                                        <div className="col-4"></div>
                                        <div className="float-right col-5">
                                            <button className="save-btn bg-blue">Save All</button>
                                            <button className="save-btn bg-green">Make Adjustment</button>
                                            <button className="save-btn bg-coral">Mark As Damage</button>
                                        </div>
                                    </div>
                                    <table className="tbl-1 mb-10">
                                        <thead>
                                            <tr>
                                                <th width="5%"><input type="checkbox" /></th>
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
                                                <th width="5%">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><input type="checkbox" /></td>
                                                <td>9876543210987</td>
                                                <td>Nivea Body Lotion</td>
                                                <td>Grocery</td>
                                                <td>Non Food</td>
                                                <td>Unilever</td>
                                                <td>PCS</td>
                                                <td>XL</td>
                                                <td>Sky Blue</td>
                                                <td>125</td>
                                                <td><input type="text" value="123" /></td>
                                                <td>-2</td>
                                                <td><button className="save-btn">Save</button></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }
}

export default InventoryMaster;
