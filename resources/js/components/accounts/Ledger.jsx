import React from 'react';

const Ledger = () => {
    return (
        <div className="row">
            <div className="top-action">
                <div className="content">
                    <h3>Accounts Ledger</h3>
                    <div className="entry-form">
                        <form action="">
                            <div className="row">
                                <div className="col-4">
                                    <label className="control-label" for="">Account Name</label>
                                    <input type="text" className="form-control" value="Cash A/C" />
                                </div>
                                <div className="col-2">
                                    <label className="control-label" for="">Current Balance</label>
                                    <input type="text" className="form-control" readonly value="1,35,678.00" />
                                </div>
                                <div className="col-3">
                                    <label className="control-label" for="">Start Date</label>
                                    <input type="date" className="form-control" value="Cash A/C" />
                                </div>
                                <div className="col-3">
                                    <label className="control-label" for="">End Date</label>
                                    <input type="date" className="form-control" value="Cash A/C" />
                                </div>
                            </div>
                            <div className="row">
                                <div className="col-3">
                                    <button className="save-btn">Search</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    );
}

export default Ledger;
