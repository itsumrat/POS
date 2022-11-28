import { _ } from 'lodash';
import React, { useState, useEffect } from 'react';

const Permission = () => {

    const [menus, setMenus] = useState({menus: [] });
    const [actionId, setActionId] = useState({
        actionId: [], 
        roleId: '' 
    });
    const [actions, setActions] = useState({actions: [] });
    const [roles, setRoles] = useState({roles: [] });
    const [menuActivities, setMenuActivities] = useState({menuActivities: [] });

    //useEffect hook
    useEffect(() => {
            
        fatchMenuAction()
        fatchRole()

        fatchMenuWithActivity()
        
        
            
    }, []);

    // getInital Data
    const fatchMenuWithActivity = () => {

        const url = localStorage.getItem('baseUrl');

        axios.get(url+'/ActivityMenu')
        .then(function (response) {

            console.log(response.data);
            setMenuActivities({menuActivities:   response.data })

        })
        .catch(function (error) {
            console.log(error);
        })
    }

    // getInital Data
    const fatchMenuAction = () => {

        const url = localStorage.getItem('baseUrl');

        axios.get(url+'/action')
        .then(function (response) {

            setActions({actions: response.data});

        })
        .catch(function (error) {
            console.log(error);
        })
    }

    // getInital Data
    const fatchRole = () => {

        const url = localStorage.getItem('baseUrl');

        axios.get(url+'/allRole')
        .then(function (response) {

            setRoles({roles: response.data});

        })
        .catch(function (error) {
            console.log(error);
        })
    }



    const actionChangeFunction = (e) => {
        const {name, value } = e.target;
        setActionId({
            ...actionId,
            actionId: [ ...actionId.actionId, value]
        })
        
    }

    const roleChange = (e) => {
        const {name, value } = e.target;
        setActionId({
            ...actionId,
            roleId: value
        })

        
    }


    // Submi function goes here

    const handleSubmit = (e) => {

        console.log(actionId.actionId);

        const url = localStorage.getItem('baseUrl');

        const actionPermission = {
            "actionData": actionId.actionId,
            "role_id": actionId.roleId
        }
            

        axios.post(url+'/ActivityMenu', actionPermission)
        .then(function (response) {

            console.log(response);

        })
        .catch(function (error) {
            console.log(error);
        })
    
        e.preventDefault();
              
    }

    

    return (
        <div className="row">
            
            <div className="container-fluid">
                <div className="col-sm-12">
                    
                    <div className="content">
                        <h3>POS Permission</h3>
                        
                        <div className="entry-form">
                            <form onSubmit={ handleSubmit }>
                                
                                <div className="row">
                                    <div className="col-2">
                                        <select onChange={roleChange}>
                                            {
                                                roles.roles.map((role) =>(
                                                    <option  value={role.id} key={role.unique_id}>{ role.name }</option>
                                                ))
                                            }
                                            
                                        </select>
                                    </div>
                                    
                                </div>
                                <br />
                                
                                
                                
                                
                                <table className="tbl-1 mb-10">
                                    <thead>
                                        <tr>
                                        
                                            <th width="5%"><input type="checkbox" /></th>
                                            <th>Menu Name</th>
                                            {
                                                actions.actions.map( (action) => ( 
                                                                                                     
                                                    <th key={action.id}>
                                                        <input type="checkbox" /> 
                                                        { action.name }
                                                    </th>
                                                ))
                                                
                                            }

                                            
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {
                                            menuActivities.menuActivities.map((data) => (
                                                <tr  key={data.unique_id} >
                                                    <td>
                                                        <input type="checkbox" /> 
                                                    </td>
                                                    <td>                                                        
                                                        { data.name}
                                                    </td>
                                                    {
                                                        data.actions.map((action) => (
                                                            <td key={action.id}>
                                                                <input type="checkbox" name="action_id" onClick={ actionChangeFunction } defaultValue={ data.id+'_'+action.action_id }/>                                                        
                                                            </td>
                                                        ))
                                                    }

                                                </tr>
                                             ))
                                        }

                                        
                                        
                                    </tbody>
                                </table>

                                <div className="row">
                                    <div className="col-12">
                                        <button className="save-btn">Save</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
                
    );
}

export default Permission;
