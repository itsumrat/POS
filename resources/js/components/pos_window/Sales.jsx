import React, { Component } from 'react';

class Sales extends Component {
    render() {
        return (
            <div className="tv-content">
                <h3>Sales</h3>
                <p><i>This Month Sales Data</i></p>
                <div className="entry-form">
                    <form>
                        <div className="row">
                            <div className="col-12">
                                <table className="tbl-2 trnx-tbl">
                                    <thead>
                                        <tr className="bg-gray">
                                            <th>Month</th>
                                            <th>Reg ID</th>
                                            <th>Staff ID</th>
                                            <th>Cash</th>
                                            <th>Other</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Apr-22</td>
                                            <td>101</td>
                                            <td>1022</td>
                                            <td>98,360.00</td>
                                            <td>30,200.85</td>
                                            <td>1,28,560.85</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
                <br />

                <p><i>Today Sales Data</i></p>
                <div className="entry-form">
                    <form action="">
                        <div className="row">
                            <div className="col-12">
                                <table className="tbl-2 trnx-tbl">
                                    <thead>
                                        <tr className="bg-gray">
                                            <th>Date</th>
                                            <th>Reg ID</th>
                                            <th>Staff ID</th>
                                            <th>Cash</th>
                                            <th>Other</th>
                                            <th>Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>10-Apr-22</td>
                                            <td>101</td>
                                            <td>1022</td>
                                            <td>98,360.00</td>
                                            <td>30,200.85</td>
                                            <td>1,28,560.85</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        );
    }
}

export default Sales;