import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../Loading';

const WithSingleInputComponent = (OriginalComponent) => {

    const NewComponent = () => {

        // Initial Data
        const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
        const userInof = useSelector((state) => state.accessData.loginInfo)
        const menuAccess = useSelector((state) => state.accessData.menuPermissions);
        const [isLoading, setIsLoading] = useState(true);
        const [uniqueId, setUniqueId] = useState({ uniqueId: '' });

        // Vendor Type
        const [vendors, setVendors] = useState({ vendors: [] });
        const [inputVendor, setInputVendor] = useState({ vendorValue: '' });

        // Customer Type
        const [customers, setCustomers] = useState({ customers: [] });
        const [inputCustomer, setInputCustomer] = useState({ customerValue: '' });



        // Edit function goes here
        const [editVendor, setEditVendor] = useState({ editVendor: false });
        const [editCustomer, setEditCustomer] = useState({ editCustomer: false });


        useEffect(() => {

            vendor()
            customer()

        }, []);

        // Vendor
        const vendor = () => {
            axios.get(url.url + '/vendor_type')
            .then(function (response) {

                setVendors({ vendors: response.data });
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

        // Customer
        const customer = () => {
            axios.get(url.url + '/customer_type')
            .then(function (response) {

                setCustomers({ customers: response.data });
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

        // Vendor
        const changeVendor = (e) => {
            const { value, name } = e.target
            setInputVendor({ vendorValue: value, name });
        }

        // Customer
        const changeCustomer = (e) => {
            const { value, name } = e.target
            setInputCustomer({ customerValue: value, name });
        }

        // Venoder

        const submitVendor = (e) => {

            axios.post(url.url + '/vendor_type', inputVendor)
                .then(function (response) {
                    vendor()
                    setInputVendor({ vendorValue: '' });
                    setVendors({ vendors: [response.data, ...vendors.vendors] });


                })
                .catch(function (error) {
                    console.log(error);
                })
            e.preventDefault();
        }

        // Customer
        const submitCustomer = (e) => {

            axios.post(url.url + '/customer_type', inputCustomer)
                .then(function (response) {
                    customer()
                    setInputCustomer({ customerValue: '' });
                    setCustomers({ customers: [response.data, ...customers.customers] });


                })
                .catch(function (error) {
                    console.log(error);
                })
            e.preventDefault();
        }


        // Vendor
        const searchVendor = (e) => {
            let data = e.target.value;
            if (data.length > 0) {
                axios.get(url.url + '/vendor_type/' + e.target.value)
                    .then(function (response) {
                        setVendors({ vendors: response.data });
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            } else {
                vendor()
            }
            e.preventDefault();
        }

        // Customer
        const searchCustomer = (e) => {
            let data = e.target.value;
            if (data.length > 0) {
                axios.get(url.url + '/customer_type/' + e.target.value)
                    .then(function (response) {
                        setCustomers({ customers: response.data });
                    })
                    .catch(function (error) {
                        console.log(error);
                    })
            } else {
                customer()
            }
            e.preventDefault();
        }

        // Vendor
        const vendorEdit = (vendor) => {
            setInputVendor({ vendorValue: vendor.name });
            setUniqueId({ uniqueId: vendor.unique_id });
            setEditVendor({ editVendor: true });
        }

        // Customer
        const customerEdit = (customer) => {
            setInputCustomer({ customerValue: customer.name });
            setUniqueId({ uniqueId: customer.unique_id });
            setEditCustomer({ editCustomer: true });
        }

        // Vendor
        const updateVendor = (e) => {

            axios.post(url.url + '/vendor_type/' + uniqueId.uniqueId, inputVendor)
                .then(function (response) {
                    setInputVendor({ vendorValue: '' });
                    vendor()
                    setUniqueId({ uniqueId: '' });
                    setEditVendor({ editVendor: false });


                })
                .catch(function (error) {
                    console.log(error);
                })


            e.preventDefault();
        }

        // Customer
        const updateCustomer = (e) => {

            axios.post(url.url + '/customer_type/' + uniqueId.uniqueId, inputCustomer)
                .then(function (response) {
                    setInputCustomer({ customerValue: '' });
                    customer()
                    setUniqueId({ uniqueId: '' });
                    setEditCustomer({ editCustomer: false });

                })
                .catch(function (error) {
                    console.log(error);
                })


            e.preventDefault();
        }



        return (
            <div className="content">
                <h3>Other Settings</h3>
                <div className="entry-form">

                    <Loading load={isLoading} />

                    <div className="row">
                        {
                            (menuAccess[26] == 2 || userInof.role_id == 1) &&

                            <div className="col-4">
                                <form onSubmit={editCustomer.editCustomer ? updateCustomer : submitCustomer}>
                                    <input type="text" onKeyUp={searchCustomer} value={inputCustomer.customerValue} onChange={changeCustomer} name='name' className="form-control" placeholder="Customer Type" />
                                    <button className="save-btn">Save Data</button>
                                </form>
                            </div>
                        }

                        {
                            (menuAccess[25] == 2 || userInof.role_id == 1) &&

                            <div className="col-4">
                                <form onSubmit={editVendor.editVendor ? updateVendor : submitVendor}>
                                    <input type="text" onKeyUp={searchVendor} value={inputVendor.vendorValue} onChange={changeVendor} name='name' className="form-control" placeholder="Vendor Type" />
                                    <button className="save-btn">Save Data</button>
                                </form>
                            </div>
                        }


                    </div>

                    <div className="row">
                        {
                            (menuAccess[26] == 1 || userInof.role_id == 1) &&

                            <div className="col-4" style={{ marginTop: "10px" }}>
                                <table className="tbl-1 mb-10">
                                    <thead>
                                        <tr key="header">
                                            <th width="10%">ID</th>
                                            <th width="10%">Customer Type</th>
                                            <th width="5%">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {
                                            customers.customers.map((customer) => (
                                                <tr key={customer.unique_id}>
                                                    <td>{customer.id}</td>
                                                    <td>{customer.name}</td>

                                                    <td><i className="fa fa-pencil" onClick={() => customerEdit(customer)}> </i></td>
                                                </tr>
                                            ))
                                        }

                                    </tbody>

                                </table>
                            </div>
                        }

                        {
                            (menuAccess[25] == 1 || userInof.role_id == 1) &&

                            <div className="col-4" style={{ marginTop: "10px" }}>
                                <table className="tbl-1 mb-10">
                                    <thead>
                                        <tr key="header">
                                            <th width="10%">ID</th>
                                            <th width="10%">Vendor Type</th>
                                            <th width="5%">...</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        {
                                            vendors.vendors.map((vendor) => (
                                                <tr key={vendor.unique_id}>
                                                    <td>{vendor.id}</td>
                                                    <td>{vendor.name}</td>

                                                    <td><i className="fa fa-pencil" onClick={() => vendorEdit(vendor)}> </i></td>
                                                </tr>
                                            ))
                                        }

                                    </tbody>

                                </table>
                            </div>
                        }

                    </div>

                </div>
            </div>
        );


    }



    return NewComponent;

}

export default WithSingleInputComponent;
