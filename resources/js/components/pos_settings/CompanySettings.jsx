import React, { Component } from 'react';

class CompanySettings extends Component {
    render() {
        return (
            <div className="content">
                <h3>Company Settings</h3>
                <div className="entry-form">
                    <form action="">
                        <div className="row">
                            <div className="col-2">
                                <input type="text" className="form-control" placeholder="Company Name" />
                            </div>
                            <div className="col-2">
                                <input type="text" className="form-control" placeholder="Address" />
                            </div>
                            <div className="col-2">
                                <input type="text" className="form-control" placeholder="Contact No" />
                            </div>
                            <div className="col-2">
                                <input type="text" className="form-control" placeholder="Trade License" />
                            </div>
                            <div className="col-2">
                                <input type="text" className="form-control" placeholder="TIN No" />
                            </div>
                            <div className="col-2">
                                <input type="file" className="form-control" placeholder="Logo" />
                            </div>
                        </div>
                        <div className="row">
                            <div className="col-3">
                                <button className="save-btn">Save Company Data</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        );
    }
}

export default CompanySettings;
