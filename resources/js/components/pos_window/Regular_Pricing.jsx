import React, { Component } from 'react';

class Regular_Pricing extends Component {
    render() {
        return (
            <div className="tv-content">
                <h3>Regular Pricing</h3>
                <p>Regular Price Change</p>
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
                                            <th>Old Price</th>
                                            <th>New Price</th>
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
                                            <td><i className="fa fa-pencil"></i></td>
                                        </tr>
                                        <tr>
                                            <td>9876543210987</td>
                                            <td>Nivea Face Wash</td>
                                            <td>PCS</td>
                                            <td>285.00</td>
                                            <td>275.00</td>
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

export default Regular_Pricing;