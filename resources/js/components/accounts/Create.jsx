import React from 'react';

const Create = () => {
    return (
        <div className="row">
            <div className="top-action">
               
                <div className="content">
                    <h3>Create Account</h3>
                    <div className="entry-form">
                        <form action="">
                            <div className="row">
                                <div className="col-4">
                                    <label className="control-label" for="">Account Name</label>
                                    <input type="text" className="form-control" value="Cash A/C" />
                                </div>
                                <div className="col-2">
                                    <label className="control-label" for="">Select Type</label>
                                    <select name="" id="">
                                        <option value="">Balance Sheet</option>
                                        <option value="">Income Statement</option>
                                    </select>
                                </div>
                                <div className="col-3">
                                    <label className="control-label" for="">Account Group</label>
                                    <select name="" id="">
                                        <option value="">Assets</option>
                                        <option value="">Liabilities</option>
                                        <option value="">Equities</option>
                                        <option value="">Revenues</option>
                                        <option value="">Expenses</option>
                                    </select>
                                </div>
                                <div className="col-3">
                                    <label className="control-label" for="">Account Sub Group</label>
                                    <select name="" className="form-control" id="">
                                        <option>Select Accounts Sub Group</option>
                                        <option value="1">Current Asset</option>
                                        <option value="2">Current Liabilities</option>
                                        <option value="3">Indirect Expenses</option>
                                        <option value="4">Long Term Assets</option>
                                        <option value="5">Direct Expenses/ Cost of Sales</option>
                                        <option value="6">Revenue</option>
                                        <option value="7">Other Income</option>
                                        <option value="8">Biological Assets</option>
                                        <option value="9">Long Term Liabilities</option>
                                    </select>
                                </div>
                                <div className="col-2">
                                    <label className="control-label" for="">Opening Balance</label>
                                    <input type="text" className="form-control" placeholder="0.00" />
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-3">
                                    <button className="save-btn">Save Accounts</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Create;
