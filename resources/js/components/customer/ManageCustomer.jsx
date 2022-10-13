import React from 'react';

const ManageCustomer = () => {
    return (
        <div className="tv-content">
            <h3>Manage Customer</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>

            <div className="row">
                <div className="bottom-report">
                    <div className="tbl-action-btn">
                        <div className="float-left col-3">
                            <input className="form-control" placeholder="Search by order#, name..."/>
                        </div>
                        <div className="col-6"></div>
                        <div className="float-right col-3">
                            <span>Filters <i className="fa fa-angle-down"></i></span> <i className="fa fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <table className="tbl-1 mb-10">
                        <thead>
                            <tr>
                                <th width="8%">Customer ID</th>
                                <th width="8%">Contact No</th>
                                <th width="15%">Customer Name</th>
                                <th width="10%">NID No</th>
                                <th width="25%">Address</th>
                                <th width="10%">Customer Type</th>
                                <th width="14%">Opening Balance</th>
                                <th width="15%">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>546444</td>
                                <td>01894943850</td>
                                <td>Mohiuddin Rubel</td>
                                <td>9196221346797</td>
                                <td>192, Chawkbazar, Chottogram</td>
                                <td>Regular</td>
                                <td>0.00</td>
                                <td>
                                    <i className="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
                                    <i className="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
                                    <i className="fa fa-money"></i>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    );
}

export default ManageCustomer;
