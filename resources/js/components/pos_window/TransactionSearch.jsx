import React from 'react'

export default function TransactionSearch({ getTransaction, transactionFilter, searchTransaction}) {
  return (
    <div className="item-search" style={{ position: "relative" }}>
        <input type="text" autoFocus  value={transactionFilter} onChange={ (e) => getTransaction(e) } className="form-control" placeholder="Transaction ID"/>
        <span style={{ position: "absolute",  top:"0", right: '0', background: "#f00", width: "34px", padding: "6px", "borderRadius": "0 50px 50px 0", textAlign: "center", cursor: "pointer" }} onClick={searchTransaction}>X</span>
    </div>
  )
}
