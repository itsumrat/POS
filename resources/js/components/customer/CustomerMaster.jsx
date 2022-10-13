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

    // pagination data goes here
    const [to, setTo ] = useState(0)
    const [total, setTotal ] = useState(0)
    const [currentPage, setCcurrentPage ] = useState(1)
    const [perPage, setPerPage ] = useState(1)
    const [totalPage, setTotalPage] = useState(0);

    useEffect(() => {

        getCustomerType();
        getCustomer();


    }, []);


    const getCustomer = () => {
        
        setIsLoading(true)
        axios.get('/customer')
            .then(function (response) {

                console.log(response.data);

                setTotal(response.data.total)
                setTo(response.data.to)
                setCcurrentPage(response.data.current_page)
                setPerPage(response.data.per_page)
                setTotalPage(response.data.last_page);

                setCustomers({customer: response.data.data})
                setIsLoading(false);

            })
            .catch(function (error) {
                console.log(error);
            })
    }


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

                setTotal(response.data.total)
                setTo(response.data.to)
                setCcurrentPage(response.data.current_page)
                setPerPage(response.data.per_page)
                setTotalPage(response.data.last_page);

                setCustomers({customer: response.data.data})
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
/**
 * 
 * @param Handle Pagination
*/
    const handlePaginationChange = (e, { activePage }) => { 
        setIsLoading(true);       
        axios.get('/customer?page='+activePage)
        .then(function (response) {

            setTotal(response.data.total)
            setTo(response.data.to)
            setCcurrentPage(response.data.current_page)
            setPerPage(response.data.per_page)
            setTotalPage(response.data.last_page);

            setCustomers({customer: response.data.data})
            setIsLoading(false);

        })
        .catch(function (error) {
            // handle error
            console.log(error);
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

        <table className="tbl-1 mb-10" style={{ marginTop: "9px" }}>
                <thead>
                    <tr key="header">
                        <th width="10%">Id</th>
                        <th width="10%">Contact</th>
                        <th width="15%">Name</th>
                        <th width="10%">NID</th>
                        <th width="10%">Openning Balance</th>
                        <th width="10%">Address</th>
                        <th width="10%">Type</th>
                        <th width="5%">...</th>
                    </tr>
                </thead>
                <tbody>

                    {
                        customers.customer.map((customerData, key) => (
                        <tr key={ customerData.id }>
                            <td width="10%">{ key }</td>
                            <td width="10%">{ customerData.customer_contact }</td>
                            <td width="15%">{ customerData.customer_name }</td>
                            <td width="10%">{ customerData.nid_no }</td>
                            <td width="10%">{ customerData.openning_balance }</td>
                            <td width="10%">{ customerData.address }</td>
                            <td width="10%">{ customerData.customer_type }</td>
                            <td width="5%">...</td>
                        </tr>
                        ))
                    }

                    

                </tbody>

            </table>

            <Pagination
                defaultActivePage={currentPage}
                ellipsisItem={"..."}
                firstItem={"⇤"}
                lastItem={"⇥"}
                size='mini'
                onPageChange={handlePaginationChange}
                prevItem={'Previous'}
                nextItem={'Next'}
                totalPages={totalPage}
            />

        </>

    );
}

export default CustomerMaster;
