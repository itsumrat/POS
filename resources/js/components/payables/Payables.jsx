import React from 'react';
import NavBar from '../../NavBar';

const Payables = () => {

    return (
        <div className="container-fluid">
            <div className="row">

                <NavBar />
                <div className="col-10">
                    <div className="row">
                        <div className="top-action">
                            <div className="tv-tabs">
                                <label className="tv-tab" for="tv-tab-1">Accounts Payable</label>
                            </div>
                            <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
                            <div className="tv-content">
                                <h3>Add Payment</h3>
                                <div className="entry-form">
                                    <form action="">
                                        <div className="row">
                                            <div className="col-2">
                                                <label className="control-label" for="">Payment Date</label>
                                                <input type="date" className="form-control" value="11-06-22" />
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-3">
                                                <label className="control-label" for="">Select Account</label>
                                                <select name="" id="">
                                                    <option value="">Supplier One</option>
                                                    <option value="">Supplier Two</option>
                                                    <option value="">Supplier Three</option>
                                                </select>
                                            </div>
                                            <div className="col-2">
                                                <label className="control-label" for="">Balance</label>
                                                <input type="text" className="form-control" readonly value="23592.00" />
                                            </div>
                                            <div className="col-2">
                                                <label className="control-label" for="">Pay Amount</label>
                                                <input type="text" className="form-control" placeholder="Type Pay Amount" />
                                            </div>
                                            <div className="col-2">
                                                <label className="control-label" for="">Payment Type</label>
                                                <select name="" id="">
                                                    <option value="">Cash</option>
                                                    <option value="">Bkash</option>
                                                    <option value="">Card/Bank</option>
                                                </select>
                                            </div>
                                            <div className="col-3">
                                                <label className="control-label" for="">Cheque / Ref</label>
                                                <input type="text" className="form-control" placeholder="Cheque/Ref" />
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-3">
                                                <label className="control-label" for="">Select Source</label>
                                                <select name="" id="">
                                                    <option value="">Cash-1001</option>
                                                    <option value="">Islami Bank-6674</option>
                                                    <option value="">City Bank-7701</option>
                                                    <option value="">Bkash Merchant-7879</option>
                                                </select>
                                            </div>
                                            <div className="col-9">
                                                <label className="control-label" for="">Type Note</label>
                                                <input type="text" className="form-control" placeholder="Note" />
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="col-3">
                                                <button className="save-btn">Save Payment Data</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="row">
                        <div className="col-12">
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
                                                <th width="7%">Trnx Date</th>
                                                <th width="8%">Supplier ID</th>
                                                <th width="15%">Supplier Name</th>
                                                <th width="10%">Trnx Type</th>
                                                <th width="10%">Ref No</th>
                                                <th width="10%">Pay Amount</th>
                                                <th width="10%">Payment Date</th>
                                                <th width="20%">Note</th>
                                                <th width="10%">...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>11-06-22</td>
                                                <td>S-10001</td>
                                                <td>Mostafa Kamal</td>
                                                <td>Due Payment</td>
                                                <td>PV-10001</td>
                                                <td>12000.00</td>
                                                <td>29-06-22</td>
                                                <td>Note</td>
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


                </div>
            </div>
        </div>
    );
}

export default Payables;
