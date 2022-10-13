import React, { useEffect, useState, useRef } from 'react';

import { useSelector } from "react-redux"

const WithHRSettings = (OrginalComponet) => {

  

    const NewComponent = () => {

        const [isLoading, setIsLoading] = useState( true);
        const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
        const [pagination, setPagination] = useState({ pagination: [] });

        const [roles, setRoles] = useState({ roles: [] });
        const [users, setUsers] = useState({ users: [] });
        

        const inputRef = useRef(null);

        const userInof = useSelector((state) => state.accessData.loginInfo)
        const menuAccess = useSelector((state) => state.accessData.menuPermissions)

        const [inputField, setInputField] = useState({
            role_id: '',
            name: '',
            contact: '',
            joining_date: '',
            salary: '',
            staff_id: '',
            profile_pic: '',
            password: '',
            uniqueId: ''
        });
    
    
        // Input Field Refresh
        const refreshInputField = () => {
            setInputField({
                role_id: '',
                name: '',
                contact: '',
                joining_date: '',
                salary: '',
                staff_id: '',
                profile_pic: '',
                password: '',
                uniqueId: ''
            });

            resetFileInput()
        }

        const resetFileInput = () => {
            // 👇️ reset input value
            inputRef.current.value = null;
        };
        
    useEffect(() => {

        role()
        user()
        
    }, []);
    


        const role = () => {
            axios.get(url.url+'/allRole')
                .then(function (response) {
                    setRoles({roles: response.data});
                    setIsLoading(false);

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }

        const user = () => {
            setIsLoading(true);
            axios.get(url.url+'/allUser')
                .then(function (response) {
                    setUsers({ users: response.data.data});
                    setPagination({ pagination: response.data });
                    setIsLoading(false);

                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        }

        const inputValueChange = (e) => {

            setInputField(
                {
                    ...inputField,
                    [e.target.name]: e.target.value
                }
            );
    
        }

        const fileUpload = (e) => {

            setInputField(
                {
                    ...inputField,
                    [e.target.name]: e.target.files[0]
                }
            );
    
        }

        // Data submit function goes here
        const submitData = (e) => {
                setIsLoading(true);
                const data = new FormData();
                data.append("profile_pic", inputField.profile_pic);
                data.append("role_id", inputField.role_id);
                data.append("name", inputField.name);
                data.append("contact", inputField.contact);
                data.append("joining_date", inputField.joining_date);
                data.append("salary", inputField.salary);
                data.append("staff_id", inputField.staff_id);
                data.append("profile_pic", inputField.profile_pic);
                data.append("password", inputField.password);

            axios.post(url.url+'/user', data)
                .then(function (response) {

                    setUsers({ users: response.data.data });
                    setPagination({ pagination: response.data });

                    // setUsers(prevUsers => ({
                    //     users: [ response.data, ...prevUsers.users ]
                    // }));
                    refreshInputField()
                    setIsLoading(false);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
            
            e.preventDefault();
        }

    /**
     * 
     * @param user Data
     * mehtod get
    */
    const editData = (user) => {

        setInputField({
            role_id: user.role_id,
            name: user.name,
            contact: user.contact,
            joining_date: user.joining_date,
            salary: user.salary,
            staff_id: user.staff_id,
            profile_pic: user.profile_pic,
            uniqueId: user.unique_id,
            password: '',
        });
    }

            // Data submit function goes here
        const UpdateData = (e) => {
            
            setIsLoading(true);
            const data = new FormData();
            data.append("profile_pic", inputField.profile_pic);
            data.append("role_id", inputField.role_id);
            data.append("name", inputField.name);
            data.append("contact", inputField.contact);
            data.append("joining_date", inputField.joining_date);
            data.append("salary", inputField.salary);
            data.append("staff_id", inputField.staff_id);
            data.append("profile_pic", inputField.profile_pic);
            data.append("password", inputField.password);

        axios.post(url.url+'/user/'+inputField.uniqueId, data)
            .then(function (response) {

                setUsers({ users: response.data.data});
                setPagination({ pagination: response.data });

                // setUsers(prevUsers => ({
                //     users: [ response.data, ...prevUsers.users ]
                // }));
                refreshInputField()
                setIsLoading(false);
            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        
            e.preventDefault();
        }

    /**
     * pagination function goes here
     * @param Handle Pagination
     */

    const handlePaginationChange = (e, { activePage }) => {
        setIsLoading(true);
        axios.get(url.url+'/allUser?page='+activePage)
            .then(function (response) {
                setUsers({...users, users: response.data.data});
                setPagination({ pagination: response.data });
                setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            
            e.preventDefault();
    }

    return (
        <React.Fragment>
            <OrginalComponet handlePaginationChange={ handlePaginationChange } UpdateData={ UpdateData } editData={editData} inputfile={inputRef} inputField={inputField} pagination={pagination} users={users} submitData={submitData} fileUpload={fileUpload}  inputValueChange={ inputValueChange } isLoading={ isLoading }  roles={roles}/>
        </React.Fragment>
    );

    }

    return NewComponent;
}

export default WithHRSettings;
