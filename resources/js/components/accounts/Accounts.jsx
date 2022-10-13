import React from 'react';
import NavBar from '../../NavBar';
import { useSelector } from 'react-redux';
import { NavLink, Outlet } from 'react-router-dom';

const Accounts = () => {

    // user access 
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)


    return (
        <div className="container-fluid">
            <div className="row">
                <NavBar />

                <div className="col-10">
                    <div className="row">
                        <div className='col-12 tv-tabs' style={{ marginTop: '15px' }}>
                            <NavLink className="tv-tab" to="" >Create Account</NavLink>
                            {
                                (menuAccess[24] == 2 || userInof.role_id == 1) &&
                                <NavLink className="tv-tab" to="/accounts/ledger">Accounts Ledger</NavLink>
                            }
                        </div>
                    </div>

                    <div className="row">
                        <div className="col-12">
                            <Outlet />
                            <div className="bottom-report">
                                <div className="tbl-action-btn">
                                    <div className="float-left col-3">
                                        <input className="form-control" placeholder="Search by order#, name..." />
                                    </div>
                                    <div className="col-6"></div>
                                    <div className="float-right col-3">
                                        <span>Filters <i className="fa fa-angle-down"></i></span> <i className="fa fa-ellipsis-h"></i>
                                    </div>
                                </div>
                                <table className="tbl-1 mb-10">
                                    <thead>
                                        <tr>
                                            <th width="30%">Account Name</th>
                                            <th width="15%">Account Type</th>
                                            <th width="15%">Account Group</th>
                                            <th width="20%">Account Sub Group</th>
                                            <th width="10%">Opening Balance</th>
                                            <th width="10%">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Cash A/C</td>
                                            <td>Balance Sheet</td>
                                            <td>Asset</td>
                                            <td>Current Asset</td>
                                            <td>12000.00</td>
                                            <td>
                                                <i className="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;
                                                <i className="fa fa-pencil"></i>&nbsp;&nbsp;&nbsp;
                                                <i className="fa fa-money"></i>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <table className="tbl-1 mb-10">
                                    <thead>
                                        <tr>
                                            <th width="10%">JV Date</th>
                                            <th width="10%">JV No</th>
                                            <th width="25%">Account Name</th>
                                            <th width="12%">Particulars</th>
                                            <th width="7%">Debit</th>
                                            <th width="7%">Credit</th>
                                            <th width="20%">Note</th>
                                            <th width="9%">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>11-06-22</td>
                                            <td>JV10001</td>
                                            <td>Cash A/C</td>
                                            <td>PV-1001</td>
                                            <td>0.00</td>
                                            <td>12,000.00</td>
                                            <td>Supplier Payment (product purchase)</td>
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
                </div>
            </div>
        </div>
    );
}

export default Accounts;
