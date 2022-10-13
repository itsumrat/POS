import React, { useState, useEffect } from 'react';
import DataTable from 'react-data-table-component'
import Button from '../Button';

const Role = () => {


    const [roles, setRoles] = useState({roles: [] });
    const [name, setName] = useState({ name: '' });
    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });

    const handleAction = value => {
        console.log(value)
    };

    const columns = [
        {
            name: 'SL#',
            selector: row => row.id,
            sortable: true,
        },
        {
            name: 'Year',
            selector: row => row.name,
            sortable: true,
        },
        {
            name: 'Unique ID',
            selector: row => row.unique_id,
            sortable: true,
        },
        {
            name: 'Created Date',
            selector: row => row.created_at,
            sortable: true,
        },
        {
            name: 'Updated Date',
            selector: row => row.updated_at,
            sortable: true,
        },
        {
            
            cell: () => <Button raised primary onClick={handleAction}/>,
            ignoreRowClick: true,
            allowOverflow: true,
            button: true,
        },
    ];

    //useEffect hook
  useEffect(() => {
            
            axios.get(url.url+'/role')
            .then(function (response) {
                setRoles({roles: response.data});

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
                console.log('done');
            });
  }, []);



    const handleChange = (e) =>{
        const { name, value } = e.target
        setName({name: value});
    }


const handleSubmit = (e) => {        

        const data = {
            "name": name.name,
        } 

        axios.post(url.url+'/role', data
        )
        .then(function (response) {

            setName({ name: '' });
            setRoles({
                roles: [ response.data, ...roles.roles]
                
            });

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        .then(function () {
            // always executed
            console.log('done');
        });

        e.preventDefault();
          
    }


        return (
            <div>
                
                {/* item List */}
                <div className="bottom-report">
                    <div className="tbl-action-btn col-12">
                    <form onSubmit={ handleSubmit }>
                        <div className="row">
                            
                                <div className="float-left col-3">
                                    <input className="form-control" name='namedd' value={name.name} onChange={ handleChange } placeholder="Role" />
                                </div>
                                <div className="col-2">

                                    <div className="col-12">
                                        <button className="save-btn">Save</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>

                        <DataTable
                            pagination 
                            columns={columns}
                            // selectableRows
                            data={roles.roles}
                        />
                            {/* {
                                roles.roles.map((value) => (
                                    <tr key={value.unique_id}>
                                        <td>{ value.id }</td>
                                        <td>{ value.unique_id }</td>
                                        <td>{ value.name }</td>
                                        <td>
                                            <i className="fa fa-pencil" style={{ cursor: 'pointer' }}></i>
                                        </td>
                                    </tr>
                                ))
                            } */}

                </div>
            </div>
        );
    }


export default Role;
