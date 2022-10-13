import React, { useState } from 'react';
import { NavLink, Outlet } from 'react-router-dom';
import NavBar from '../NavBar';
import { useSelector } from 'react-redux';

const SposSettings = () => {

    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)


        return (
            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <NavLink className="tv-tab" to="">POS Settings</NavLink>
                                    { 
                                        (menuAccess[11] == 1 || userInof.role_id == 1) && 
                                        <NavLink className="tv-tab" to="/spos_settings/itemSettings">Item Settings</NavLink>
                                    }
                                    
                                    { 
                                        (menuAccess[12] == 1 || userInof.role_id == 1) && 
                                        <NavLink className="tv-tab" to="/spos_settings/companySettings">Company Settings</NavLink>
                                    }

                                    { 
                                        (menuAccess[13] == 1 || userInof.role_id == 1) && 
                                        <NavLink className="tv-tab" to="/spos_settings/hrSettings">HR Settings</NavLink>
                                    }
                                    
                                    { 
                                        (menuAccess[14] == 1 || userInof.role_id == 1) && 
                                        <NavLink className="tv-tab" to="/spos_settings/role">Role</NavLink>
                                    }
                                    
                                    { 
                                        (menuAccess[15] == 1 || userInof.role_id == 1) && 
                                        <NavLink className="tv-tab" to="/spos_settings/permission">Permission</NavLink>
                                    }
                                    
                                    { 
                                        (menuAccess[16] == 1 || userInof.role_id == 1) && 
                                        <NavLink className="tv-tab" to="/spos_settings/otherSettings">Other Settings</NavLink>
                                    }
                                    
                                    
                                </div>
                                <Outlet/>

                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }


export default SposSettings;