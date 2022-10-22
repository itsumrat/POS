import React, { useState } from 'react'

export default function Customer(props) {

  const [isLoading, setIsLoading] = useState(false);

  const [customerData, setCustomerData ] = useState({
        address: "",
        customer_contact: "",
        customer_name: "",
        nid: "",
        opening_balance: ""
    })

  const addCustomerData = () => {
    console.log("hello 000");
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
            <input type="text" onChange={customerField} value={customerData.nid} name="nid" className="form-control" placeholder="NID No"/>
          </div>
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.address} name="address" className="form-control" placeholder="Address"/>
          </div>
          <div className="col-6">
            <input type="text" onChange={customerField} value={customerData.opening_balance} name="opening_balance" className="form-control" placeholder="Opening Balance"/>
          </div>
          <div className="col-6">
            <select name="customer_type" id="customer_type" onChange={customerField} >
              <option value="">Type of Customer</option>
            </select>
          </div>
        </div>
        <div class="row">
          <div class="col-6">
            <button class="save-btn" onClick={addCustomerData}>Save Customer Data</button>
          </div>
        </div>


      <span className="modal-close" onClick={props.functionClose} style={{ cursor: "pointer" }}>&times;</span>
    </>
  )
}
