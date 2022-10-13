import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../../Loading';

const Department = () => {

    
    const [departments, setDepartments] = useState({ departments: [] });
    const [inputDepartment, setInputDepartment] = useState({ departmentValue: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editDepartment, setEditDepartment] = useState({ editDepartment: false });
    const [isLoading, setIsLoading] = useState(true);




    useEffect(() => {

        department()
    }, []);

    const department = () => {
        

        axios.get(url.url+'/departments')
            .then(function (response) {

                setDepartments({departments: response.data});
                setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            .then(function () {
                // always executed
                console.log('done');
            });
    }



    const changeDepartment = (e) => {
        const {value, name } = e.target
        setInputDepartment({departmentValue: value, name});
    }



    const submitDepartment = (e) => {

        axios.post(url.url+'/department', inputDepartment)
            .then(function (response) {
                department()
                setInputDepartment({ departmentValue: '' });
                setDepartments({ departments: [ response.data, ...departments.departments ]});
                

            })
            .catch(function (error) {
                console.log(error);
            })

        console.log(inputDepartment);
        e.preventDefault();
    }

    const searchDepartment = (e) => {

        let data = e.target.value;

        if(data.length > 0 ){
            axios.get(url.url+'/department/'+e.target.value)
            .then(function (response) {

                setDepartments({departments: response.data});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        }else{
            department()
        }

        


        e.preventDefault();
    }

    const departmentEdit = (department) => {
        setInputDepartment({ departmentValue: department.name});
        setUniqueId({ uniqueId: department.unique_id });
        setEditDepartment({ editDepartment: true});
    }

    const updateDepartment = (e) => {

        axios.post(url.url+'/department/'+uniqueId.uniqueId, inputDepartment)
            .then(function (response) {
                console.log(response);
                setInputDepartment({ departmentValue: '' });
                department()
                setUniqueId({ uniqueId: '' });
                setEditDepartment({ editDepartment: false});
                

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <div className='row'>
            { 
                (menuAccess[11] == 2 || userInof.role_id == 1) &&
                            
                <div className="col-12">
                    <div className="row">
                        <form onSubmit={ editDepartment.editDepartment ? updateDepartment : submitDepartment }>
                            <div className="col-12">
                                <input type="text" name='name' onKeyUp={ searchDepartment } value={inputDepartment.departmentValue} onChange={ changeDepartment } className="form-control" placeholder="Department" />                                
                            </div>
                            <div className="col-12">
                                <button className="save-btn">Save Department</button>
                            </div>
                        </form>
                    </div>
                </div>
            }

            <hr/>

            { 
                (menuAccess[11] == 1 || userInof.role_id == 1) && 
                <div className="col-12">
                    <table style={{'width': '100%'}}>
                        <thead>
                            <tr>
                                <td>Sl</td>
                                <td>Name</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody> 
                            {
                                departments.departments.map((department, index) => (
                                    <tr key={department.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ department.name }</td>
                                        {
                                            (menuAccess[11] == 3 || userInof.role_id == 1) &&
                                                <td><i onClick={() => departmentEdit(department) } className="fa fa-pencil"></i></td>
                                            }
                                    </tr>
                                ))
                            }                           
                            
                        </tbody>
                    </table>
                </div>
            }
            <Loading load={ isLoading }/>
        </div>
    );
}

export default Department;
