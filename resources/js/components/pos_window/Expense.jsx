import React, { Component } from 'react';

class Expense extends Component {
    render() {
        return (
            <div className="tv-content">
                <h3>Expense</h3>
                <div className="entry-form">
                    <form action="">
                        <div className="row">
                            <div className="col-3">
                                <select name="" id="" className="form-control">
                                    <option value="">Select Account</option>
                                    <option value="">Cash</option>
                                    <option value="">Bank</option>
                                </select>
                            </div>
                            <div className="col-6">
                                <select name="" id="" className="form-control">
                                    <option value="">Select Expense Category</option>
                                    <option value="">Cat one</option>
                                    <option value="">Cat two</option>
                                </select>
                            </div>
                            <div className="col-3">
                                <input type="text" className="form-control" placeholder="Expensed Amount" />
                            </div>
                            <div className="col-12">
                                <input type="text" className="form-control" placeholder="Note" />
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
                            <h6>Expense List</h6>
                            <table className="tbl-2 mb-10">
                                <thead>
                                    <tr>
                                        <th width="5%">SL</th>
                                        <th width="20%">Barcode</th>
                                        <th width="35%">Item Name</th>
                                        <th width="10%">Qty</th>
                                        <th width="10%">Unit Cost</th>
                                        <th width="15%">Subtotal</th>
                                        <th width="5%">...</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>9876543210987</td>
                                        <td>Nivea Body Lotion</td>
                                        <td><input type="text" className="form-control mb-0" value="1" /></td>
                                        <td><input type="text" className="form-control mb-0" value="275" /></td>
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
                                        <span>325.00</span>
                                    </div>
                                    <div className="col-2">
                                        <p>Other Fee</p>
                                        <span>0.00</span>
                                    </div>
                                    <div className="col-2">
                                        <p>Discount</p>
                                        <span>0.00</span>
                                    </div>
                                    <div className="col-3">
                                        <p>Grand Total</p>
                                        <span>3,075.00</span>
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
        );
    }
}

export default Expense;