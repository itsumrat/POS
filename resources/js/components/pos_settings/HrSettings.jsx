import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../Loading';
import WithHRSettings from '../HOC/WithHRSettings';
import { Icon, Pagination } from 'semantic-ui-react'

const HrSettings = (props) => {

    const { isLoading, roles, inputValueChange, fileUpload, submitData, users, handlePaginationChange, pagination, inputField, inputfile, editData, UpdateData } = props;


    return (
        <div className="content">
            <Loading load={ isLoading }/>
            <h3>HR Settings</h3>
            <div className="entry-form">
                <form onSubmit={ inputField.uniqueId ? UpdateData : submitData} encType="multipart/form-data">
                    <div className="row">
                        <div className="col-2">
                            <input type="text" value={ inputField.name } name='name' className="form-control" onChange={inputValueChange} placeholder="Staff Name" />
                        </div>
                        <div className="col-2">
                            <Loading load={isLoading} />
                            <select name="role_id" id="role_id" value={ inputField.role_id } onChange={inputValueChange}>
                                <option value="">Select Designation</option>
                                {
                                    roles.roles.map((role) => (
                                        <option key={role.unique_id} value={role.id}>{role.name}</option>
                                    ))
                                }

                            </select>
                        </div>
                        <div className="col-2">
                            <input type="text" value={ inputField.contact } name="contact" onChange={inputValueChange} className="form-control" placeholder="Contact No" />
                        </div>
                        <div className="col-2">
                            <input type="date" value={ inputField.joining_date } name="joining_date" className="form-control" onChange={inputValueChange} placeholder="Joining Date" />
                        </div>
                        <div className="col-2">
                            <input type="text" value={ inputField.salary } name="salary" className="form-control" onChange={inputValueChange} placeholder="Salary" />
                        </div>
                        <div className="col-2">
                            <input type="file" ref={ inputfile } name="profile_pic" className="form-control" onChange={fileUpload} placeholder="Image" />
                        </div>
                        <div className="col-2">
                            <input type="text" value={ inputField.staff_id } name="staff_id" className="form-control" onChange={inputValueChange} placeholder="Staff ID" />
                        </div>
                        <div className="col-2">
                            <input type="text" value={ inputField.password } name="password" className="form-control" onChange={inputValueChange} placeholder="Password" />
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-3">
                            <button className="save-btn">Save HR Data</button>
                        </div>
                    </div>
                </form>
            </div>

    
                <h6>Order List</h6>
                <table className="tbl-1 mb-10">
                    <thead>
                        <tr>
                            <th width="5%">SL</th>
                            <th width="15%">Staff ID</th>
                            <th width="15%">Name</th>
                            <th width="27%">Designation</th>
                            <th width="8%">Contact</th>
                            <th width="10%">Salary</th>
                            <th width="10%">Joining Date</th>
                            <th width="5%">...</th>
                        </tr>
                    </thead>
                    <tbody>
                        {
                            users.users.map((user, index) => {

                                return(
                                    <tr className="bg-light-coral" key={user.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ user.staff_id }</td>
                                        <td>{ user.name }</td>
                                        <td>{ user.role.name }</td>
                                        <td>{ user.contact }</td>
                                        <td>{ user.salary }</td>
                                        <td>{ user.joining_date }</td>
                                        <td><i className="fa fa-pencil" onClick={() => editData(user) } style={{ cursor: 'pointer' }}></i></td>
                                    </tr>
                                )
                                

                            } )
                        }
                        
                       
                    </tbody>
                </table>

                <Pagination
                    defaultActivePage={pagination.pagination.current_page ? pagination.pagination.current_page : 1 }
                    ellipsisItem={"..."}
                    firstItem={"⇤"}
                    lastItem={"⇥"}
                    size='mini'
                    onPageChange={ handlePaginationChange }
                    prevItem={'Previous'}
                    nextItem={'Next'}
                    totalPages={ pagination.pagination.last_page ? pagination.pagination.last_page : 1 }
                />
            
        </div>
    );

}

export default WithHRSettings(HrSettings);
