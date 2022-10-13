import React, { useEffect, useState } from 'react';
import { NavLink } from 'react-router-dom'
import { useSelector} from 'react-redux';
import  store from './store';
const NavBar = () => {

    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)



        return (
            <React.Fragment>
                <div className="col-2">
                    <div className="row">
                        <div className="left-nav">
                            <ul className="main-nav">
                                <li><NavLink className="nav-title" to="#">{ userInof.name }</NavLink></li>
                                <li><NavLink to="/">Sales / Invoicing</NavLink></li>
                                <li><NavLink to="/">POS Dashboard</NavLink></li>
                                { 
                                    (menuAccess[1] == 1 || userInof.role_id == 1) && 

                                    <li><NavLink to="/item_master">Item Master</NavLink></li>
                                }
                                
                                {
                                    (menuAccess[2] == 2 || userInof.role_id == 1) && 
                                    <li><NavLink to="/inventory_master">Inventory Master</NavLink></li>
                                }

                                {
                                    (menuAccess[3] == 3 || userInof.role_id == 1) && 
                                    <li><NavLink to="/costing_pricing">Costing vs Pricing</NavLink></li>
                                }

                                {
                                    (menuAccess[4] == 4 || userInof.role_id == 1) && 
                                    <li><NavLink to="/print_barcode">Print Barcode</NavLink></li>
                                }

                                {
                                    (menuAccess[5] == 5 || userInof.role_id == 1) && 
                                    <li><NavLink to="/item_requisition">Requisition / Pre-Order</NavLink></li>
                                }

                                {
                                    (menuAccess[6] == 6 || userInof.role_id == 1) && 
                                    <li><NavLink to="/purchase_master">Purchase Master</NavLink></li>
                                }

                                {
                                    (menuAccess[7] == 7 || userInof.role_id == 1) && 
                                    <li><NavLink to="/customer_master">Customer Master</NavLink></li>
                                }

                                {
                                    (menuAccess[8]  == 8 || userInof.role_id == 1) && 
                                    <li><NavLink to="/vendor_master">Vendor Master</NavLink></li>
                                }

                                {
                                    (menuAccess[22]  == 22 || userInof.role_id == 1) && 
                                    <li><NavLink to="/payables">Payables</NavLink></li>
                                }

                                {
                                    (menuAccess[23]  == 23 || userInof.role_id == 1) && 
                                    <li><NavLink to="/receivables">Receivables</NavLink></li>
                                }

                                {
                                    (menuAccess[24]  == 24 || userInof.role_id == 1) && 
                                    <li><NavLink to="/accounts">Manage Accounts</NavLink></li>
                                }

                                {
                                    (menuAccess[9] == 9 || userInof.role_id == 1) && 
                                    <li><NavLink to="/spos_settings">Standard POS Settings</NavLink></li>
                                }
                                {
                                    (menuAccess[10] == 10 || userInof.role_id == 1) && 
                                    <li><NavLink to={{ pathname: "/standard_pos", state: { fromDashboard: true } }} >POS Window</NavLink></li>
                                }


                                {
                                    
                                    <li><NavLink to={{ pathname: "/logout" }} >Logout</NavLink></li>
                                }
                                
                                
                                {/* <!-- <li><NavLink to="basic_pos.php">Basic Point of Sales</NavLink></li> --> */}
                                
                                {/* <!-- <li><NavLink to="premium_pos.php">Premium Point of Sales</NavLink></li> --> */}
                            </ul>
                        </div>
                    </div>
                </div>
            </React.Fragment>
        );
    }


export default NavBar;
