
import React, { useState, useEffect } from 'react';
import Loading from '../Loading';
import { Icon, Pagination } from 'semantic-ui-react'

const ManageCustomer = () => {

        // pagination data goes here
        const [to, setTo ] = useState(0)
        const [total, setTotal ] = useState(0)
        const [currentPage, setCcurrentPage ] = useState(1)
        const [perPage, setPerPage ] = useState(1)
        const [totalPage, setTotalPage] = useState(0);

        const [customers, setCustomers] = useState({customer: []})
        const [isLoading, setIsLoading] = useState(false)
    
        useEffect(() => {
    
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
        <div className="tv-content">
            <h3>Manage Customer</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>

            <div className="row">
                <div className="bottom-report">
                    <div className="tbl-action-btn">
                        <div className="float-left col-3">
                            <input className="form-control" placeholder="Search by order#, name..."/>
                        </div>
                        <div className="col-6"></div>
                        <div className="float-right col-3">
                            <span>Filters <i className="fa fa-angle-down"></i></span> <i className="fa fa-ellipsis-h"></i>
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
                    <Loading load={isLoading} />

                    {
                        customers.customer.map((customerData, key) => (
                        <tr key={ customerData.id }>
                            <td width="10%">{ key }</td>
                            <td width="10%">{ customerData.customer_contact }</td>
                            <td width="15%">{ customerData.customer_name }</td>
                            <td width="10%">{ customerData.nid_no }</td>
                            <td width="10%">{ customerData.openning_balance }</td>
                            <td width="10%">{ customerData.address }</td>
                            <td width="10%">{ customerData.type.name }</td>
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
                </div>
            </div>
        </div>
    );
}

export default ManageCustomer;
