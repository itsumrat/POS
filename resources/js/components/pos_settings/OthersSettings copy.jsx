import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../Loading';

const OthersSettings = () => {

    const [vendors, setVendors] = useState({ vendors: [] });
    const [inputVendor, setInputVendor] = useState({ vendorValue: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editVendor, setEditVendor] = useState({ editVendor: false });

    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {

        vendor()

    }, []);

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




    const changeVendor = (e) => {
        const { value, name } = e.target
        setInputVendor({ vendorValue: value, name });
    }

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

    const vendorEdit = (vendor) => {
        console.log(vendor);
        setInputVendor({ vendorValue: vendor.name });
        setUniqueId({ uniqueId: vendor.unique_id });
        setEditVendor({ editVendor: true });
    }

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



    return (
        <div className="content">
            <h3>Other Settings</h3>
            <div className="entry-form">

                <Loading load={isLoading} />

                <div className="row">
                    <div className="col-4">
                        <form action="">
                            <input type="text" className="form-control" placeholder="Customer Type" />
                            <button className="save-btn">Save Data</button>
                        </form>
                    </div>

                    {
                        (menuAccess[25] == 2 || userInof.role_id == 1) &&

                        <div className="col-4">
                            <form onSubmit={ editVendor.editVendor ? updateVendor : submitVendor }>
                                <input type="text" onKeyUp={ searchVendor } value={inputVendor.vendorValue} onChange={ changeVendor } name='name' className="form-control" placeholder="Vendor Type" />
                                <button className="save-btn">Save Data</button>
                            </form>
                        </div>
                    }


                </div>

                <div className="row">
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

                                {/* {
                                    vendors.vendors.map((vendor) => (
                                        <tr key={vendor.unique_id}>
                                            <td>{vendor.id}</td>
                                            <td>{vendor.name}</td>
                                            
                                            <td><i className="fa fa-pencil" onClick={() => ItemEdit(item)}> </i></td>
                                        </tr>
                                    ))
                                } */}

                            </tbody>

                        </table>
                    </div>
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

export default OthersSettings;
