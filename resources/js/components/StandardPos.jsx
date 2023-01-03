import React, { useState, useEffect, useRef, CSSProperties } from 'react';
import PosAdmin from './pos_admin';
import { Pos } from '../store/actions/Pos'
import Loading from './Loading';
import { useSelector, useDispatch } from 'react-redux';
import { NavLink, Outlet } from 'react-router-dom';
import Barcode from './pos_window/Barcode';
import TransactionSearch from './pos_window/TransactionSearch';
import Customer from './pos_window/Customer';
import Select from 'react-select'

const Standardpos = () => {

    // const dispatch = useDispatch();

    const [search, setSearch] = useState('');
    const [transactionFilter, setTransactionFilter] = useState('');
    
    const [items, setItems] = useState({ items: []} );
    const [transactions, setTransactions] = useState({transactions: []});
    const [returnTransaction, setReturn] =  useState({transactions: []});
    const [hold, setHold] = useState({transactions: []});
    const [total, setTotal] = useState(0);
    const [exchangeAmount, setExchangeAmount] = useState('');
    const [returnAmount, setReturnAmount] = useState('');
    const autoFocusExchange = useRef(null);
    const autoFocusBarcode = useRef();
    const [modalTarget, setModalTarget] = useState('modal');
    const [otherPaymentTarget, setOtherPaymentTarget] = useState('modal');
    const [payment, setPayment] = useState('cash');
    const [otherspaymentTransaction, setOtherspaymentTransaction] = useState('modal');
    const [discountVatWindow, setDiscountVatWindow] = useState('modal');
    const [titleDiscountVat, setTitleDiscountVat] = useState('');
    const [saleStatus, setSaleStatus] = useState({ status: "Completed" });
    const [transactionId, setTransactionId] = useState('');
    const [transactionSearch, setTransactionSearch] = useState(0);
    const [customer, setCustomer] = useState('modal');
    const [customerLists, setCustomerLists] = useState({});
    const [customerId, setCustomerId] = useState(1);
    const [customerType, setCustomerType] = useState({ type: [] })

    
    

    const [flatFixedAmount, setFlatFixedAmount] = useState({
        Vat_percentage: '',
        Vat_amount: '',
        Discount_discount: '',
        Discount_amount: '',
        Discount_parcentage: '',
        Discount_flat_percentage: ''

    });
    
    const [display, setDisplay] = useState('none');

    const ref = useRef(null);
    

    // const items = useSelector((state) => state.PosItem.posSeleItems)
    
    // Url
	let url = localStorage.getItem('baseUrl');

    // Loading 
    const [isLoading, setIsLoading] = useState(false);

    useEffect(() => {

        setTotal(items.items.reduce( (prevAmount, currentAmount ) => parseInt(prevAmount) + parseInt(currentAmount.price), 0));
        setReturnAmount( (prevReturnAmount) =>  prevReturnAmount = (exchangeAmount - ((total-flatFixedAmount.Discount_amount)+flatFixedAmount.Vat_amount) ) );
        

    }, [items, exchangeAmount]);

    useEffect(() => {
        // Call Transaction List
        getLatestTransaction()
        customerList()
        getCustomerType()

       

        autoFocusExchange.current.focus();
        // autoFocusBarcode.current.focus();
    }, [])



    useEffect(() => {
        if(saleStatus.status != "Completed"){
            paymentDone();
        }
        
    }, [saleStatus])

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

    const customerList = (e) => {

        axios.get('/customerList/')
        .then(function (response) {

            const listItems = response.data.map((item) => (
                
                    {
                        'label': item.customer_name+' '+item.customer_contact,
                        'value': item.id,
                    }
                
            ))

            setCustomerLists(listItems);

        })
        .catch(function (error) {
            console.log(error);
        })
    }

    const getProduct = (e) => {

        let searchInput = e.target.value;
        setIsLoading(true);
        setSearch(searchInput);


        axios.get('/product/'+searchInput)
        .then(function (response) {

            if(response.data == ""){
                setIsLoading(false);
                alert("No Data Found or Out of Stock")
                setSearch('');
                return false;
            }


            let addProducts = {
                id : response.data.id,
                barcode : response.data.barcode,
                product_title : response.data.item_name,
                price : response.data.sale_price,
                size : response.data.size.name,
                color : response.data.color.name,
                unit : response.data.unit.name,
                quantity : 1,
                subTotal : parseFloat(response.data.sale_price),
            }


            setItems({ 
                ...items,
                items: [addProducts, ...items.items]
            });

            setIsLoading(false);
            setSearch('');

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    }


    const getTransaction = (e) => {

        let searchInput = e.target.value;
        setIsLoading(true);
        setTransactionFilter(searchInput);


        axios.get('/transactions/'+searchInput)
        .then(function (response) {

            console.log(response.data.completed.sales);

            if(searchInput.length > 0){
                // setTransactions({
                //     transactions: response.data.completed
                    
                // })
                setItems({items: response.data.completed.sales});
                
            }else{
                getLatestTransaction();
            }

            setIsLoading(false);

        })
        .catch(function (error) {
            console.log(error);
        })
    }


    // Get Latest Transation
    const getLatestTransaction = () => {
        axios.get('/transactions')
        .then(function (response) {

            setTransactions({
                transactions: response.data.completed
            })

            setHold({
                transactions: response.data.hold
            })

            setReturn({
                transactions: response.data.return
            })

        })
        .catch(function (error) {
            console.log(error);
        })
    }


    const paymentType = (type) => {

        setPayment(type);

    }


    // Status Option function goes here

    const statusOptions = (data) => {

        setSaleStatus((prevState) => {
            return { status: prevState.status = data }
        });

    }


    // Transaction Window
    const paymentDone = () => {

        setIsLoading(true);
        let transactionData = {
            itemDatas: items.items,
            exchange: exchangeAmount,
            returnAmount: returnAmount,
            payment: payment,
            paymentTrasaction: otherspaymentTransaction,
            status: saleStatus.status,
            oldTransactionId: transactionId,
            flatFixedAmount: flatFixedAmount,
            customer_id: customerId
        }        

        axios.post('/sales/', transactionData)
        .then(function (response) {

            setItems({
                items: []
            });
            setExchangeAmount('');
            setModalTarget('modal');
            setOtherPaymentTarget('modal');

            setPayment('cash');

            setSaleStatus({ status: "Completed" });

            // autoFocusBarcode.current.focus();
            autoFocusExchange.current.focus();

            getLatestTransaction();

            setIsLoading(false);

            // window.location.replace('home/print/'+response.data);

            window.open('/home/print/'+response.data, '_blank')

          

            console.log(response);

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    }


    // Exchange function goes here
    const exchange = (e) => {
        setExchangeAmount( e.target.value);
    }


    // Others Payment Transaction goes here
    const otherPaymentTran = (e) => {
        setOtherspaymentTransaction( e.target.value);
    }


    // Cash Window
    const cashWindow = () => {

        setModalTarget('modal target');
        setDisplay('');
        autoFocusExchange.current.focus();
    }

    // others payment window
    const othersPaymentWindow = () => {

        setOtherPaymentTarget('modal target');
        setDisplay('');
        autoFocusExchange.current.focus();
    }

    const discountVat = (e) => {
        setDiscountVatWindow('modal target');
        setTitleDiscountVat(e);
        ref.current.value = '';
    }

    // Discount Window
    const flatFixed = (e) => {
        setFlatFixedAmount({
            ...flatFixedAmount,         
            [e.target.name] : e.target.value 
        })
    }

    // Add discount & Vat

    const addDiscountVat = () => {

        if(titleDiscountVat == "Vat" ){
            setFlatFixedAmount({
                ...flatFixedAmount,           
                Vat_amount: parseFloat((total*flatFixedAmount.Vat_discount)/100) 
            })
        }

        if(titleDiscountVat == "Discount" ){
            if(flatFixedAmount.Discount_flat_percentage == "flat"){
                setFlatFixedAmount({
                    ...flatFixedAmount,           
                    Discount_amount: parseFloat(flatFixedAmount.Discount_discount)  
                })
            }else if(flatFixedAmount.Discount_flat_percentage == "percentage"){
                setFlatFixedAmount({
                    ...flatFixedAmount,          
                    Discount_amount: parseFloat((total*flatFixedAmount.Discount_discount)/100) 
                })
            }  
        }

        setDiscountVatWindow('modal');

    }


    // Hold data open function goes here
    const openData = (transactionId) => {

        axios.get('/open/'+transactionId)
        .then(function (response) {

            setItems({
                items: response.data.sales
            });

            setTransactionId(transactionId);

            // setIsLoading(false);

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
        
    }


    const removeItem = (indexNumber) => {

        if(indexNumber == "Cancel"){            
            setItems({items: []})
        }else{
            const data = items.items.filter((i, index) => index !== indexNumber)
            setItems({items: data})
        } 
    }


    const searchTransaction = () => {
        if(transactionSearch == 0){
            setTransactionSearch(1);
        }else{
            setTransactionSearch(0);
        }
        
    }

    const addCustomer = () => {

        setCustomer('modal target');
        setDisplay('');
    }

    const slectedCustomer = (e) => {
        setCustomerId(e.value);
    }

    const slectedCustomerCallBack = (customer_id) => {
        setCustomerId(customer_id.id);
    }

    const close = () => {
        setModalTarget('modal');
        setOtherPaymentTarget('modal');
        setDiscountVatWindow('modal')
        setCustomer('modal');
        setPayment('cach');
        ref.current.value = '';
        autoFocusExchange.current.focus();
    }

    const customStyles = {
        option: (provided, state) => ({
          ...provided,
          borderBottom: '1px dotted pink',
          color: state.isSelected ? '#fff' : 'blue',
        }),
        
        singleValue: (provided, state) => {
          const opacity = state.isDisabled ? 0.5 : 1;
          const transition = 'opacity 300ms';
      
          return { ...provided, opacity, transition };
        }
      }
 
    

    return (
        <React.Fragment>
            <div className="container-fluid">
                <div className="row">
                    <div className="col-12">
                        <div className="row">
                            <div className="col-4">
                                <div className="row">
                                    <div className="pos-cust">
                                        <Select 
                                            defaultValue={customerLists[1]}
                                            onChange={slectedCustomer}
                                            styles={customStyles} 
                                            options={customerLists} />
                                        
                                    </div>
                                    <div className="add-cust-btn"  onClick={searchTransaction}>&#9740;</div>
                                    <div className="add-cust-btn" onClick={addCustomer}>+</div>
                                </div>
                                <br/>
                                    <div className="row">
                                        {
                                            transactionSearch ? 
                                            <TransactionSearch searchTransaction={searchTransaction} transactionFilter ={transactionFilter} getTransaction = { (e) => getTransaction(e) } />
                                            :
                                            <Barcode searchData = {search} getProduct = { (e) => getProduct(e) }/>
                                        }
                                        
                                        
                                    </div>
                                    <br/>
                                        <div className="row">
                                            <div className="add-item">
                                                <table>
                                                    {
                                                        items.items.map((item, index) => (
                                                            <>
                                                                <tr key={(item.barcode)}>
                                                                    <td>{ item.product_title }</td>
                                                                    <td>1</td>
                                                                    <td>{ item.price }</td>
                                                                    <td rowSpan={2} onClick={() => removeItem(index) }><i className="fa fa-trash font-red"></i></td>
                                                                </tr>
                                                                <tr key={(parseInt(item.barcode)+parseInt(index)+1)}>
                                                                    <td className="font-gray">{ item.size }/{ item.color }/{ item.unit } </td>
                                                                    <td className="font-gray">{ item.subTotal }</td>
                                                                    <td>
                                                                        <i className="fa fa-percent"></i>
                                                                    </td>
                                                                </tr>
                                                            </>
                                                        
                                                        ))
                                                    }
                                                </table>
                                                <Loading  load={isLoading} />
                                            </div>
                                        </div>
                                        <div className="row">
                                            <div className="total-area">
                                                <table className="w100">
                                                    <tr>
                                                        <td colSpan="2">Subtotal</td>
                                                        <td>${ total }</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button className="add-btn" onClick={ () => discountVat('Discount') }>Add</button>
                                                        </td>
                                                        <td>Discount ({flatFixedAmount.Discount_discount} { flatFixedAmount.Discount_flat_percentage == "percentage" && '%' })</td>
                                                        <td>{ flatFixedAmount.Discount_amount }</td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            <button className="add-btn" onClick={ () => discountVat('Vat') }>Add</button>
                                                        </td>
                                                        <td>VAT ({flatFixedAmount.Vat_discount}  %)</td>
                                                        <td>${ (flatFixedAmount.Vat_amount) }</td>
                                                    </tr>
                                                    <tr className="font16 bold">
                                                        <td colSpan="2">Total</td>
                                                        <td>
                                                            ${ parseFloat(((total) - (flatFixedAmount.Discount_amount == "" ? 0 : flatFixedAmount.Discount_amount)) + (flatFixedAmount.Vat_amount == "" ? 0 : flatFixedAmount.Vat_amount)).toFixed(2) }
                                                        </td>
                                                        {/* <td>${ parseFloat((total - (flatFixedAmount.Discount_amount) == "" ? 0 : flatFixedAmount.Discount_amount) + parseFloat(flatFixedAmount.Vat_amount == "" ? 0 : flatFixedAmount.Vat_amount)) }</td> */}
                                                    </tr>
                                                    <tr>
                                                        <td width="40%">
                                                                <button className="pay-btn">
                                                                    <a className="modal-btn" onClick={ othersPaymentWindow }>Other Payments</a>
                                                                </button>
                                                        </td>
                                                        <td colSpan="2" width="60%">
                                                            <button className="pay-btn">
                                                                <a className="modal-btn" onClick={ cashWindow } >Cash</a>
                                                            </button>
                                                        </td>
                                                    </tr>
                                                </table>
                                            </div>
                                        </div>
                                    <div className="row">
                                        <div className="action-btns">
                                            <button className="action-btn" onClick={() => statusOptions("Hold") }>Hold</button>
                                            <button className="action-btn" onClick={() => removeItem("Cancel") }>Cancel</button>
                                            <button className="action-btn" onClick={() => statusOptions("Drawer") }>Drawer</button>
                                            <button className="action-btn" onClick={() => statusOptions("Return") }>Return</button>
                                        </div>
                                    </div>
                            </div>


                            
                            <div className="col-3">
                                <div className="trnx-list">
                                    <h6 className="bg-title">Latest Transactions</h6>
                                    <table className="trnx-tbl w100">
                                        <thead>
                                            <tr>
                                                <th>Trnx No</th>
                                                <th>Amount</th>
                                                <th>Payment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            {
                                                transactions.transactions.map((item) => (
                                                    <tr key={item.transaction_id}>
                                                        <td>{ item.transaction_id }</td>
                                                        <td>{ item.total_amount }</td>
                                                        <td>{ item.payment_type }</td>
                                                        <td><NavLink target={"_blank"} to={`/print/${item.transaction_id}`}>Print</NavLink></td>
                                                    </tr>
                                                ))
                                            }
                                            
                                        </tbody>
                                        
                                        
                                    </table>
                                </div>
                                <div className="hold-list">
                                    <h6 className="bg-title">Hold Transactions</h6>
                                    <table className="w100">
                                        <tr>
                                            <th>Trnx No</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                            {
                                                hold.transactions.map((item) => (
                                                    <tr key={item.transaction_id}>
                                                        <td>{ item.transaction_id }</td>
                                                        <td>{ item.total_amount }</td>
                                                        <td>{ item.payment_type }</td>
                                                        <td>
                                                            <span onClick={() => openData(item.transaction_id) } style={{ cursor: "pointer" }}>Open</span>
                                                        </td>
                                                    </tr>
                                                ))
                                            }
                                        
                                        
                                    </table>
                                </div>
                                <div className="return-list">
                                    <h6 className="bg-title">Return Transactions</h6>
                                    <table className="w100">
                                        <tr>
                                            <th>Trnx No</th>
                                            <th>Amount</th>
                                            <th>Status</th>
                                            <th>Action</th>
                                        </tr>
                                      
                                        
                                            {
                                                returnTransaction.transactions.map((item) => (
                                                    <tr key={item.transaction_id}>
                                                        <td>{ item.transaction_id }</td>
                                                        <td>{ item.total_amount }</td>
                                                        <td>{ item.payment_type }</td>
                                                        <td>
                                                            <NavLink target={"_blank"} to={`/print/${item.transaction_id}`}>Print</NavLink>
                                                        </td>
                                                    </tr>
                                                ))
                                            }
                                        
                                        
                                    </table>
                                </div>
                            </div>
                            <div className="col-5">
                                <div className="row">
                                    <div className="cmd-area">
                                        <PosAdmin/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            

            <div id="cash" className={ customer } style={{ display: display }}>
                <div className="modal-content">
                   <Customer functionClose={close} types={customerType} slectedCustomer={slectedCustomerCallBack}/>
                </div>
            </div>

            {/* <!-- Modal Area --> */}
            <div id="cash" className={ modalTarget } style={{ display: display }}>
                <div className="modal-content">
                    <h6 className="bg-title">Checkout Window</h6>

                    <table className="w100">
                        <tr>
                            <td>Total Receivable</td>
                            <td className="font16 bold">
                                ${ parseFloat(((total) - (flatFixedAmount.Discount_amount == "" ? 0 : flatFixedAmount.Discount_amount)) + (flatFixedAmount.Vat_amount == "" ? 0 : flatFixedAmount.Vat_amount)).toFixed(2) }
                            </td>
                        </tr>
                        <tr>
                            <td>Tender Amount</td>
                            <td>
                                <input type="text" autoFocus ref={ autoFocusExchange } onChange={ exchange } className="discount" value={exchangeAmount}/>
                            </td>
                        </tr>
                        <tr>
                            <td>Change Amount</td>
                            <td>${ parseFloat(returnAmount).toFixed(2) }</td>
                        </tr>
                        <tr>
                            <td colSpan="2">
                                <button className="checkout-btn" onClick={ paymentDone }>Complete Payment</button>
                            </td>
                        </tr>
                    </table>

                    <span className="modal-close" onClick={close} style={{ cursor: "pointer" }}>&times;</span>
                </div>
            </div>

            <div id="other" className={ otherPaymentTarget }>
                <div className="modal-content">
                    <h6 className="bg-title">Checkout Window</h6>

                    <table className="w100">
                        <tr>
                            <td colSpan="2">Total Receivable</td>
                            <td colSpan="2" className="font16 bold">${ total }</td>
                        </tr>
                        <tr>
                            <td onClick={ () => paymentType('visa') } style={{ background: payment == "visa" && "#999", color: payment == "visa" ? "#fff" : "#000", cursor: "pointer" }}>VISA</td>
                            <td onClick={ () => paymentType('master') } style={{ background: payment == "master" && "#999", color: payment == "master" ? "#fff" : "#000", cursor: "pointer" }}>MASTER</td>
                            <td onClick={ () => paymentType('amex') } style={{ background: payment == "amex" && "#999", color: payment == "amex" ? "#fff" : "#000", cursor: "pointer" }}>AMEX</td>
                            <td onClick={ () => paymentType('bkash') } style={{ background: payment == "bkash" && "#999", color: payment == "bkash" ? "#fff" : "#000", cursor: "pointer" }}>BKASH</td>
                        </tr>
                        <tr>
                            <td colSpan="4">
                                <input type="text" name='others_transaction_id' onChange={ otherPaymentTran } className="discount" placeholder="Card No / Transaction ID"/>
                            </td>
                        </tr>
                        <tr>
                            <td colSpan="4">
                                <button className="checkout-btn" onClick={ paymentDone }>Complete Payment</button>
                            </td>
                        </tr>
                    </table>

                    <a className="modal-close" onClick={close} style={{ cursor: "pointer" }}>&times;</a>
                </div>
            </div>

            <div id="return" className={ discountVatWindow }>
                <div className="modal-content">
                    <h6 className="bg-title"> { titleDiscountVat } </h6>

                    <table className="w100">
                        <tr>
                            <td colSpan="2">{ titleDiscountVat } Type</td>
                            <td colSpan="2" className="font16 bold">
                                <select onChange={ flatFixed } name={titleDiscountVat+'_flat_percentage' } id="flat_fixed">
                                    {
                                        titleDiscountVat == "Vat" ? 
                                            <>
                                                <option value="vat_percentage">Percentage</option>
                                            </>
                                        : <>
                                            <option>---Select---</option>
                                            <option value="flat">Flat</option>
                                            <option value="percentage">Percentage</option>
                                        </>
                                    }
                                    
                                        
                                   

                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colSpan="2">
                                { titleDiscountVat } Amount
                                
                            </td>
                            <td colSpan="2" className="font16 bold">
                                <input ref={ref} type="text" value={ titleDiscountVat == "Vat" ? flatFixedAmount.Vat_discount : flatFixedAmount.Discount_discount } onChange={ flatFixed } name={titleDiscountVat+'_discount' } className="discount" placeholder="Amount"/>
                            </td>
                        </tr>
                        
                        <tr>
                            <td colSpan="4">
                                <button className="checkout-btn" onClick={ addDiscountVat }>Add</button>
                            </td>
                        </tr>
                    </table>

                    <a className="modal-close" onClick={close} style={{ cursor: "pointer" }}>&times;</a>
                </div>
            </div>


            {/* <div id="return" className="">
                <div className="modal-content">
                    <h6 className="bg-title">Sales Return Window</h6>

                    <table className="w100">
                        <tr>
                            <td colSpan="2">Total Returned Amount</td>
                            <td colSpan="2" className="font16 bold">(-) $500.00</td>
                        </tr>
                        <tr>
                            <td colSpan="2">
                                <input type="text" className="discount" placeholder="Old Invoice No"/>
                            </td>
                            <td colSpan="2" className="font16 bold">$2,500.00</td>
                        </tr>
                        <tr>
                            <td>Adjustable</td>
                            <td className="font16 bold">$500.00</td>
                            <td>Receivable</td>
                            <td className="font16 bold">$0.00</td>
                        </tr>
                        <tr>
                            <td colSpan="4">
                                <button className="checkout-btn">Complete Transaction</button>
                            </td>
                        </tr>
                    </table>

                    <a href="" className="modal-close">&times;</a>
                </div>
            </div> */}
            {/* <!-- /Modal Area --> */}
        </React.Fragment>

    );
}

export default Standardpos;
