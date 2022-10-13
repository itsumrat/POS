import React, { Component } from 'react';
import NavBar from '../NavBar';

class CostingPricing extends Component {
    render() {
        return (
            <div className="container-fluid">

                <div className="row">
                    <NavBar />
                    <div className='col-10'>
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <label className="tv-tab" htmlFor="tv-tab-1">Costing vs Selling Report</label>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
                                <div className="tv-content">
                                    <h3>Last 10 Costing vs Selling Data</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>
                                    <div className="entry-form">
                                        <form action="">
                                            <div className="row">
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="Barcode" />
                                                </div>
                                                <div className="col-3">
                                                    <input type="text" className="form-control" placeholder="Item Name" />
                                                </div>
                                            </div>

                                            <div className="row">
                                                <div className="col-12">
                                                    <button className="save-btn">Search</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>



                                <div className="bottom-report">
                                    <div className="row">
                                        <div className="tbl-action-btn">
                                            <div className="row">
                                                <div className="col-2">
                                                    <input type="text" placeholder="Barcode" />
                                                </div>
                                                <div className="col-3">
                                                    <input type="text" placeholder="Item Name" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" placeholder="Brand Name" />
                                                </div>
                                                <div className="col-1">
                                                    <input type="text" placeholder="Unit" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" placeholder="Size" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" placeholder="Color" />
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div className="row">
                                        <div className='col-12'>
                                            <div className="row">
                                                <div className="col-4">
                                                    <table className="tbl-1 mb-10">
                                                        <thead>
                                                            <tr>
                                                                <th width="50%">Purchase Date</th>
                                                                <th width="50%">Purchase Cost</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div className="col-4">
                                                    <table className="tbl-1 mb-10">
                                                        <thead>
                                                            <tr>
                                                                <th width="50%">Price Change Date</th>
                                                                <th width="50%">Updated Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="col-4">
                                                    <table class="tbl-1 mb-10">
                                                        <thead>
                                                            <tr>
                                                                <th width="50%">Promo Date</th>
                                                                <th width="50%">Promo Price</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
                                                            </tr>
                                                            <tr>
                                                                <td>10-Apr-22</td>
                                                                <td>275.00</td>
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
                </div>
            </div>
        );
    }
}

export default CostingPricing;
