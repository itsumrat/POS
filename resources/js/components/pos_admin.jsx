import React, { Component } from 'react';
import { NavLink, Outlet } from 'react-router-dom';

class PosAdmin extends Component {
    render() {
        return (
            <React.Fragment>
                <div className="bottom-action">
                    <div className="tv-tabs">
                        <label className="tv-tab"><NavLink to="/">Home</NavLink></label>
                        <label className="tv-tab"><NavLink to="">Register</NavLink></label>
                        <label className="tv-tab"><NavLink to="/standard_pos/sales">Sales</NavLink></label>
                        <label className="tv-tab"><NavLink to="/standard_pos/expense">Expense</NavLink></label>
                        <label className="tv-tab"><NavLink to="/standard_pos/regular_price">Regular Pricing</NavLink></label>
                        <label className="tv-tab"><NavLink to="/standard_pos/promo_price">Promo Pricing</NavLink></label>
                    </div>
                    <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" checked="checked" />
                    <Outlet/>
                </div>
            </React.Fragment>
        );
    }
}

export default PosAdmin;
