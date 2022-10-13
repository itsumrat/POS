import React, { useState, useEffect } from 'react';
import { Icon, Pagination } from 'semantic-ui-react'

const Role = () => {


    const [roles, setRoles] = useState({roles: [] });
    const [name, setName] = useState({ name: '' });
    const [page, setPage] = useState( 1);
    const [totalPage, setTotalPage] = useState( 1);
    const [saveButton, setSaveButton] = useState("Save");
    const [uniqueId, setUniqueId] = useState({uniqueId: ''});
    


    //useEffect hook
  useEffect(() => {
        
        fatchData(1)
        
            
  }, []);

// getInital Data
    const fatchData = (page) => {

        const url = localStorage.getItem('baseUrl');

        axios.get(url+'/role?page='+page)
        .then(function (response) {
            // console.log(response.data)
            setPage( (prevPage) =>  prevPage = response.data.current_page )
            setTotalPage( (prevTotalPage) =>  prevTotalPage = response.data.last_page ) 
            setRoles({roles: response.data.data});

        })
        .catch(function (error) {
            console.log(error);
        })
    }


   /**
   * 
   * @param Input files handle here
   */

    const handleChange = (e) =>{
        const { name, value } = e.target
        setName({name: value});
    }

    /**
     * 
     * @param Handle Pagination
    */
    const handlePaginationChange = (e, { activePage }) => {
        fatchData(activePage)
    }

    /**
     * 
     * @param unique_id
     * mehtod get
    */
    const editData = (uniqueId) => {
        const url = localStorage.getItem('baseUrl');
        axios.get(url+'/role/'+uniqueId)
            .then(function (response) {
                console.log(response);
                setSaveButton(prevSaveButton =>  prevSaveButton =  "Update");
                setName({name: response.data.name});
                setUniqueId({ uniqueId:response.data.unique_id });

            })
            .catch(function (error) {
                console.log(error);
            })
    }


const handleSubmit = (e) => {

    const url = localStorage.getItem('baseUrl');
        if(uniqueId.uniqueId != ''){
            const data = {
                "name": name.name,
                "unique_id": uniqueId.uniqueId,
            }
            const request = axios.post(url+'/role/'+uniqueId.uniqueId, data)
            
        }else{
            const data = {
                "name": name.name
            }
            const request = axios.post(url+'/role', data)
        }

        request.then(function (response) {

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
            <React.Fragment>
                
                {/* item List */}
                <div className="bottom-report">
                    <div className="tbl-action-btn col-12">
                    <form onSubmit={ handleSubmit }>
                        <div className="row">
                            
                                <div className="float-left col-3">
                                    <input className="form-control" name='name' value={name.name} onChange={ handleChange } placeholder="Role" />
                                </div>
                                <div className="float-left col-3">
                                    <input className="form-control" type="" name='unique_id' value={uniqueId.uniqueId} onChange={ handleChange } placeholder="Role" />
                                </div>
                                <div className="col-2">

                                    <div className="col-12">
                                        <button className="save-btn">{ saveButton }</button>
                                    </div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <table className="tbl-1 mb-10">
                        <thead>
                            <tr>
                                <th width="10%">SL#</th>
                                <th width="25%">Unique ID#</th>
                                <th width="60%">Role Name</th>

                                <th width="5%">...</th>
                            </tr>
                        </thead>
                        <tbody>
                            {
                                roles.roles.map((value) => (
                                    <tr key={value.unique_id}>
                                        <td>{ value.id }</td>
                                        <td>{ value.unique_id }</td>
                                        <td>{ value.name }</td>
                                        <td>
                                            <i onClick={() => editData(value.unique_id) } className="fa fa-pencil" style={{ cursor: 'pointer' }}></i>
                                        </td>
                                    </tr>
                                ))
                            }
                            
                        </tbody>
                    </table>

                    <Pagination
                        defaultActivePage={page}
                        ellipsisItem={"..."}
                        firstItem={"⇤"}
                        lastItem={"⇥"}
                        size='mini'
                        onPageChange={ handlePaginationChange }
                        prevItem={'Previous'}
                        nextItem={'Next'}
                        totalPages={totalPage}
                    />
                </div>
            </React.Fragment>
        );
    }


export default Role;
