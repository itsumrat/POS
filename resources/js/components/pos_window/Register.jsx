import React, { Component } from 'react';

class Register extends Component {
    render() {
        return (
            <div className="tv-content">
                <h3>Register</h3>
                <p><i>Fill up. *marks are mandatory field!</i></p>
                <div className="entry-form">
                    <form>
                        <div className="row">
                            <div className="col-12">
                                <table className="tbl-2 trnx-tbl">
                                    <thead>
                                        <tr className="bg-gray">
                                            <th>Reg ID</th>
                                            <th>Staff ID</th>
                                            <th>Status</th>
                                            <th>Opened</th>
                                            <th>Closed</th>
                                            <th>Sales</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>101</td>
                                            <td>1022</td>
                                            <td>Open</td>
                                            <td>9:30am</td>
                                            <td>10:00pm</td>
                                            <td>1,28,560.85</td>
                                            <td>X Report | Close Register</td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br />
                                <div className="row">
                                    <div className="col-12">
                                        <p><i>Search For Previous Date Sale Report</i></p>
                                    </div>
                                </div>

                                <form>
                                    <div className="row">
                                        <div className="col-4">
                                            <input type="date" className="form-control" />
                                        </div>
                                        <div className="col-3">
                                            <button className="save-btn">Search</button>
                                        </div>
                                    </div>
                                </form>

                                <br />
                                <table className="tbl-2 trnx-tbl">
                                    <thead>
                                        <tr className="bg-gray">
                                            <th>Reg ID</th>
                                            <th>Staff ID</th>
                                            <th>Status</th>
                                            <th>Opened</th>
                                            <th>Closed</th>
                                            <th>Sales</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>101</td>
                                            <td>1022</td>
                                            <td>Open</td>
                                            <td>9:30am</td>
                                            <td>10:00pm</td>
                                            <td>1,28,560.85</td>
                                            <td>Z Report</td>
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

export default Register;
