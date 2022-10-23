import React, { useState } from 'react'
import Loading from '../Loading';

export default function Customer(props) {

  const [isLoading, setIsLoading] = useState(false);


  const [customerData, setCustomerData ] = useState({
        address: "",
        customer_contact: "",
        customer_name: "",
        nid_no: "",
        openning_balance: ""
    })

  const addCustomerData = (e) => {

    setIsLoading(true);
        axios.post('/customer/pos/window', customerData)
            .then(function (response) {

              props.slectedCustomer(response.data)

                props.functionClose()
                setIsLoading(false)
                setCustomerData({
                  address: "",
                  customer_contact: "",
                  customer_name: "",
                  nid_no: "",
                  openning_balance: ""
              })

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
  }


  const customerField = (e) => {
      setCustomerData({
          ...customerData,         
          [e.target.name] : e.target.value 
      })
  }


  return (
    <>
      <h6 className="bg-title">Add New Customer</h6>
        <div className="row">
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.customer_contact} name="customer_contact" className="form-control" placeholder="Customer Contact"/>
          </div>
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.customer_name} name="customer_name" className="form-control" placeholder="Customer Name"/>
          </div>
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.nid} name="nid_no" className="form-control" placeholder="NID No"/>
          </div>
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.address} name="address" className="form-control" placeholder="Address"/>
          </div>
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.openning_balance} name="openning_balance" className="form-control" placeholder="Openning Balance"/>
          </div>
          <div className="col-6">
            <select name="customer_type" id="customer_type" onChange={customerField} >
                {
                  props.types.type.map((type) => (
                      <option key={type.id} value={type.id}>{ type.name }</option>
                  ))
                }
              
            </select>
          </div>
        </div>
        <div className="row">
          <div className="col-6">
            <button className="save-btn" onClick={addCustomerData}>Save Customer Data</button>
          </div>
        </div>

        <Loading load={isLoading} />


      <span className="modal-close" onClick={props.functionClose} style={{ cursor: "pointer" }}>&times;</span>
    </>
  )
}
