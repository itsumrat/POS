import React, { Component } from 'react';

class PromoPricing extends Component {
    render() {
        return (
            <div className="tv-content">
                <h3>Promo Pricing</h3>
                <p>Promotional Price Change</p>
                <div className="entry-form">
                    <form action="">
                        <div className="row">
                            <div className="col-6">
                                <input type="text" className="form-control" placeholder="Type Barcode" />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-6">
                                <input type="text" className="form-control" value="Nivea Body Lotion" disabled />
                            </div>
                            <div className="col-3">
                                <input type="text" className="form-control" value="PCS" disabled />
                            </div>
                            <div className="col-3">
                                <input type="text" className="form-control" value="325.00" />
                            </div>
                            <div className="col-3">
                                <input type="text" className="form-control" placeholder="Promotion Start Date" />
                            </div>
                            <div className="col-3">
                                <input type="text" className="form-control" placeholder="Promotion End Date" />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-12">
                                <button className="save-btn">Save</button>
                            </div>
                        </div>
                        <br />
                        <div className="row">
                            <div className="col-7"></div>
                            <div className="col-5">
                                <input type="text" className="form-control" placeholder="Search Barcode" />
                            </div>
                        </div>
                        <div className="row">
                            <h6>Price Change Data</h6>
                            <div className="col-12">
                                <table className="w100">
                                    <thead>
                                        <tr>
                                            <th>Barcode</th>
                                            <th>Item Name</th>
                                            <th>Unit</th>
                                            <th>Regular Price</th>
                                            <th>Promo Price</th>
                                            <th>Promo Start</th>
                                            <th>Promo End</th>
                                            <th>...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>9876543210987</td>
                                            <td>Nivea Body Lotion</td>
                                            <td>PCS</td>
                                            <td>325.00</td>
                                            <td>305.00</td>
                                            <td>10-Apr-22</td>
                                            <td>15-Apr-22</td>
                                            <td><i className="fa fa-pencil"></i></td>
                                        </tr>
                                        <tr>
                                            <td>9876543210987</td>
                                            <td>Nivea Face Wash</td>
                                            <td>PCS</td>
                                            <td>285.00</td>
                                            <td>275.00</td>
                                            <td>10-Apr-22</td>
                                            <td>17-Apr-22</td>
                                            <td><i className="fa fa-pencil"></i></td>
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

export default PromoPricing;
