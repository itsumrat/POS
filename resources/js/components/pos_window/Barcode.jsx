import React from 'react'

const Barcode = ({ getProduct, searchData}) => {


  return (

    <div className="item-search">
        <input type="text" autoFocus  value={searchData} onChange={ (e) => getProduct(e) } className="form-control" placeholder="Scan Barcode"/>
    </div>
  )
}

export default Barcode;
