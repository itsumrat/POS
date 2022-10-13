import React from 'react';
import { NavLink } from 'react-router-dom'

const NoPermission = () => {
    return (
        <div>
            You Have No Permission 
            <li><NavLink to="/">Dashboard</NavLink></li>
        </div>
    );
}

export default NoPermission;
