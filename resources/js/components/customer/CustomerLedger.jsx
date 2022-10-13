import React from 'react';

const CustomerLedger = () => {
    return (
        <div class="tv-content">
            <h3>Customer Transactions</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>

            <div class="row">
                <div class="col-3">
                    <select name="" id="">
                        <option value="">Select Customer</option>
                    </select>
                </div>
                <div class="col-3">
                    <input type="date" name="" id="" />
                </div>
                <div class="col-3">
                    <input type="date" name="" id="" />
                </div>
            </div>
            <br />
            <div class="row">
                <div class="col-3">
                    <button class="save-btn">Search</button>
                </div>
            </div>
            <br />
            <div class="row">
                <div class="bottom-report">
                    <div class="col-12">
                        <button class="save-btn float-right mb-10">Print Ledger</button>
                    </div>
                    <div class="tbl-action-btn">
                        <div class="row">
                            <div class="col-3">
                                <input class="form-control" placeholder="Customer Name" />
                            </div>
                            <div class="col-2">
                                <input type="text" placeholder="Opening Balance" />
                            </div>
                            <div class="col-2">
                                <input type="text" placeholder="Total Trnx Amount" />
                            </div>
                            <div class="col-2">
                                <input type="text" placeholder="Total Paid" />
                            </div>
                            <div class="col-3">
                                <input type="text" placeholder="Current Balance" />
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
    );
}

export default CustomerLedger;


