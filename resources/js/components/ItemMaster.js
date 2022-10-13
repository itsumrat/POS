import React, { useEffect, useState } from 'react';
import NavBar from '../NavBar';
import { useSelector } from 'react-redux';
import { NavLink, Outlet } from 'react-router-dom';





const Itemmaster = () => {
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
							<NavLink className="tv-tab" to="">Item Master</NavLink>
							{
								(menuAccess[11] == 1 || userInof.role_id == 1) &&
								<NavLink className="tv-tab" to="/item_master/upload_csv">Upload CSV</NavLink>
							}
						</div>
					</div>

					<div className="row">
						<div className="col-12">
							<Outlet />
						</div>
					</div>
				</div>
			</div>
		</div>
	);
}


export default Itemmaster;
