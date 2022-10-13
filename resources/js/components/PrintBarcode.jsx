import React, { Component } from 'react';
import NavBar from '../NavBar';

class PrintBarcode extends Component {
    render() {
        return (
            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <label className="tv-tab" htmlFor="tv-tab-1">Print Barcode</label>
                                    <label className="tv-tab" htmlFor="tv-tab-2">Print Label</label>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
                                <div className="tv-content">
                                    <h3>Barcode Printing Window</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>
                                    <div className="entry-form">
                                        <form>
                                            <div className="row">
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Barcode</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Item Name</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Selling Price</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Promo Price</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Size</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Color</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Unit</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Expiry</span>
                                                </div>
                                            </div>

                                            <div className="row">
                                                <div className="col-3">
                                                    <div className="barcode-view">
                                                        barcode sample design
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div className="row"></div>
                                            <br />
                                            <div className="row">
                                                <div className="col-3">
                                                    <input type="text" className="form-control" placeholder="Search Barcode" />
                                                </div>
                                                <div className="col-4">
                                                    <input type="text" className="form-control" disabled value="Nivea Body Lotion 100ml" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="No of Copy" />
                                                </div>
                                                <div className="col-2">
                                                    <button className="save-btn">Print Barcode</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <input className="tv-radio" id="tv-tab-2" name="tv-group" type="radio" />
                                <div className="tv-content">
                                    <h3>Label Printing Window</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>
                                    <div className="entry-form">
                                        <form>
                                            <div className="row">
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Barcode</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Item Name</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Selling Price</span>
                                                </div>
                                                <div className="col-2">
                                                    <input type="checkbox" /> <span className="float-left">Promo Price</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Size</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Color</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Unit</span>
                                                </div>
                                                <div className="col-1">
                                                    <input type="checkbox" /> <span className="float-left">Expiry</span>
                                                </div>
                                            </div>
                                            <div className="row">
                                                <div className="col-3">
                                                    <div className="barcode-view">
                                                        label sample design
                                                    </div>
                                                </div>
                                            </div>
                                            <br />
                                            <div className="row"></div>
                                            <br />
                                            <div className="row">
                                                <div className="col-3">
                                                    <input type="text" className="form-control" placeholder="Search Barcode" />
                                                </div>
                                                <div className="col-4">
                                                    <input type="text" className="form-control" disabled value="Nivea Body Lotion 100ml" />
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" className="form-control" placeholder="No of Copy" />
                                                </div>
                                                <div className="col-2">
                                                    <button className="save-btn">Print Label</button>
                                                </div>
                                            </div>
                                        </form>
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

export default PrintBarcode;