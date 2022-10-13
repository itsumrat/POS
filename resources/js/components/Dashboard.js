import React, { useEffect, useState } from 'react';
import ReactDOM from 'react-dom';
const axios = require('axios');

import NavBar from '../NavBar';

import { useNavigate } from "react-router-dom"

import { register as posRegister } from '../store/actions/Register';

import { useSelector, useDispatch } from 'react-redux';

import Loading from './Loading';

const Dashboard = () => {

    const [registers, setRegisters] = useState({ registers: [] });
    const [register, setRegister] = useState("");
    const [button, setButton] = useState({text: "Open Register"});
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const dispatch = useDispatch();
    let history = useNavigate();



    // Loading 
    const [isLoading, setIsLoading] = useState(true);

    // useEffect get Currect data
	useEffect(() => {

        fetchItems()

		
	}, []);

    const fetchItems = () => {
        axios.get('/list')
            .then(function (response) {

                setRegisters({ registers:response.data });
                setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    }

    // Select data from register number
    const getData = (e) => {
        if(e.target.name == "register_no"){
            getStatus(e.target.value)
        }
        setRegister({   
            ...register,         
            [e.target.name] : e.target.value 
        })

        
    }

    // Select data from register number
        const getStatus = (register) => {
            axios.get('/sell_registers/'+register )
            .then(function (response) {
                if(response.data !== "not_exit"){

                    setButton({text: "Close Register"});
                    setRegister({ status: response.data.status,  openning_balance: response.data.openning_balance })

                }else{
                    setButton({text: "Open Register"});
                    setRegister({ register_no: register,  status: "",  openning_balance: "" })
                    
                }

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
        }

    const openData = (e) => {

        axios.post('/sell_registers', register )
            .then(function (response) {

                dispatch(posRegister(response.data.status));
                if(response.data.status == "Open"){
                    localStorage.setItem("posWindowStatus_"+userInof.id, response.data.status)
                    history("/standard_pos");
                }
                

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })

        e.preventDefault()
    }

        return (

            <div className="container-fluid">
                <div className="row">
                    <NavBar />
                    <div className="col-10">
                        <div className="row">
                            <div className="top-action">
                                <div className="tv-tabs">
                                    <label className="tv-tab" htmlFor="tv-tab-1">Open Register</label>
                                    <label className="tv-tab" htmlFor="tv-tab-2">Activities</label>
                                </div>
                                <input className="tv-radio" id="tv-tab-1" name="tv-group" type="radio" defaultChecked />
                                <div className="tv-content">
                                    <h3>POS Dashboard</h3>
                                    <p><i>Fill up. *marks are mandatory field!</i></p>
                                    <div className="entry-form">
                                        <form onSubmit={ openData }>
                                            <div className="row">
                                                <div className="col-2">
                                                    <select name="register_no" id="register" select={ register.register_no } onChange={  getData  }>
                                                        {
                                                            registers.registers.map((item) => (
                                                                <option key={ item.unique_id } value={ item.register }>{ item.name }</option>
                                                            ))
                                                        }
                                                        
                                                    </select>
                                                </div>
                                                <div className="col-2">
                                                    <input type="text" value={ register.status } readOnly  className="form-control" placeholder="Register Status" />
                                                </div>
                                            </div>
                                            <br />
                                            {/* <!-- If register is close then first opening balance then open button --> */}
                                            <div className="row">
                                                <div className="col-3">
                                                    <input type="text" required="required" name='openning_balance' value={ register.openning_balance } onChange={ getData } placeholder="Today Opening Balance" />
                                                </div>
                                            </div>
                                            {/* <!-- If register is open then direct open button --> */}
                                            <br />
                                            <div className="row">
                                                <div className="col-12">
                                                    <button className="save-btn">{ button.text }</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <Loading  load={isLoading} />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        );
    }






export default Dashboard;

if (document.getElementById('dashboard')) {
    ReactDOM.render(<Dashboard />, document.getElementById('dashboard'));
}
