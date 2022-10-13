import React, { useState, useEffect} from 'react';



import { useParams } from 'react-router-dom'

import '../../../../public/css/custom.css';

export default function Print() {

        
    // Url
	let url = localStorage.getItem('baseUrl');

    const [prints, setPrints] = useState({prints: []});
    const [transaction, setTransaction] = useState({ transaction: []});

    const {id}  = useParams();
    useEffect(() => {

 
        printData(id);
        console.log(prints)

        const timer = setTimeout(() => {
            window.print();
            
            window.close();

          }, 1000);
          return () => clearTimeout(timer);
        
        
        
    }, [])



     // Hold data open function goes here
     const printData = (transactionId) => {

        axios.get(url+'/print/'+transactionId)
        .then(function (response) {

            setPrints({
                prints: response.data.sales
            });

            setTransaction(
                {
                    transaction: response.data
                }
            )

            // setIsLoading(false);

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        
    }


    return (
        <div className='pos_print'>
            <p>Sanghu Group LTD</p>
            <p>Main Branch</p>
            <p>Location: Dhaka</p>
            <p>Tel: 0201456789</p>
            <p>TIN: </p>
            <p>VAT Reg. No.: </p>
            <table className='table'>
                <tr>
                    <td>DATE</td>
                    <td>:</td>
                    <td>03-Jun-2022 6:13:01 PM</td>
                </tr>
                <tr>
                    <td>CASHIER</td>
                    <td>:</td>
                    <td></td>
                </tr>
            </table>
            
            <table className='table'>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={4}>======================================</th>
                   
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th>ITEM</th>
                    <th>QTY</th>
                    <th>RPICE</th>
                    <th>CHE</th>
                </tr>

                <tr style={{textAlign:"right"}}>
                    <th colSpan={4}>-----------------------------------------------------------------</th>
                </tr>

                    {
                        prints.prints.map((item, index) => (
                            <tr key={index} style={{textAlign:"right"}}>
                                <td>{ item.product_title }</td>
                                <td>{ item.quantity }</td>
                                <td>{ item.price }</td>
                                <td>{ item.total_amount }</td>
                            </tr>
                        ))
                    }

                <tr style={{textAlign:"right"}}>
                    <th colSpan={4}>-----------------------------------------------------------------</th>
                </tr>

                <tr style={{textAlign:"right"}}>
                    <th colSpan={2}>Sub Total:</th>
                    <th colSpan={2}>{ transaction.transaction.total_amount }</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={2}>Discount:</th>
                    <th colSpan={2}>0</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={2}>Vat @:</th>
                    <th colSpan={2}>{ transaction.transaction.vat }</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={4}>======================================</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={2}>Bill Total:</th>
                    <th colSpan={2}>{ transaction.transaction.total_amount }</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={2}>Tendered:</th>
                    <th colSpan={2}>{ transaction.transaction.exchange_amount }</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={2}>Balance:</th>
                    <th colSpan={2}>{ transaction.transaction.return_amount }</th>
                </tr>
                <tr style={{textAlign:"right"}}>
                    <th colSpan={4}>======================================</th>
                </tr>
                <tr style={{textAlign:"center"}}>
                    <th colSpan={4}>THANK YOU</th>
                </tr>
                <tr  style={{textAlign:"right"}}>
                    <th colSpan={4}>======================================</th>
                </tr>
            </table>
            
        </div>
    )
}
