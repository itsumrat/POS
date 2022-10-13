import React, { Component } from 'react';
import NavBar from '../../NavBar';
import { NavLink, Outlet } from 'react-router-dom';

class Index extends Component {
    render() {
        return (
            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div class="top-action">
                                <div class="tv-tabs">
                                    <NavLink className="tv-tab" to="/customer_master">Create Customer</NavLink>
                                    <NavLink className="tv-tab" to="/customer_master/customerManage">Manage Customer</NavLink>
                                    <NavLink className="tv-tab" to="/customer_master/customerLedger">Customer Ledger</NavLink>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked />
                                <Outlet/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>           
        );
    }
}

export default Index;