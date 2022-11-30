import React, { useState, useEffect } from 'react';
import Loading from '../Loading';
import { Icon, Pagination } from 'semantic-ui-react'


const CustomerMaster = (props) => {

    const [isLoading, setIsLoading] = useState(false)
    const [customerType, setCustomerType] = useState({ type: [] })
    const [customers, setCustomers] = useState({customer: []})
    const [customerData, setCustomerData] = useState({
        address: "",
        customer_contact: "",
        customer_name: "",
        nid_no: "",
        openning_balance: "",
        customer_type: ""
    })

    useEffect(() => {

        getCustomerType();


    }, []);


    


    const getCustomerType = () => {

        setIsLoading(true)
        axios.get('/customer_type')
            .then(function (response) {

                setCustomerType({ type: response.data });
                setIsLoading(false);

            })
            .catch(function (error) {
                console.log(error);
            })
    }




    const addCustomerData = (e) => {

        setIsLoading(true);
        axios.post('/customer', customerData)
            .then(function (response) {
                setIsLoading(false);

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }


    const customerField = (e) => {
        setCustomerData({
            ...customerData,
            [e.target.name]: e.target.value
        })


    }




    return (

        <>

        <div className="tv-content">
            <h3>New Customer Entry</h3>
            <div className="entry-form">
                <form onSubmit={addCustomerData}>
                    <div className="row">
                        <div className="col-2">
                            <input type="text" onChange={customerField} value={customerData.customer_contact} className="form-control" name="customer_contact" placeholder="Customer Contact" />
                        </div>
                        <div className="col-3">
                            <input type="text" onChange={customerField} value={customerData.customer_name} className="form-control" name="customer_name" placeholder="Customer Name" />
                        </div>
                        <div className="col-2">
                            <input type="text" onChange={customerField} value={customerData.nid_no} className="form-control" name="nid_no" placeholder="NID No" />
                        </div>
                        <div className="col-5">
                            <input type="text" onChange={customerField} value={customerData.address} className="form-control" name="address" placeholder="Address" />
                        </div>
                        <div className="col-2">
                            <input type="text" onChange={customerField} value={customerData.openning_balance} className="form-control" name="openning_balance" placeholder="Opening Balance" />
                        </div>
                        <div className="col-3">
                            <Loading load={isLoading} />
                            <select name="customer_type" id="customer_type" onChange={customerField} value={customerData.customer_type}>
                                {
                                    customerType.type.map((item) => (
                                        <option key={item.id} value={item.id}>{item.name}</option>
                                    ))


                                }

                            </select>
                        </div>
                    </div>
                    <div className="row">
                        <div className="col-3">
                            <button className="save-btn" type='submit'>Save Customer Data</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </>

    );
}

export default CustomerMaster;
