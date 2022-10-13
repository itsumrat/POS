import { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import WithSettings from '../HOC/WithSettings';
import Loading from '../Loading';

const PosSettings = (props) => {

    const { edit, inputVat, inputRegister, change, changeRegister, vats, registers,  submitData, submitRegister,  dataEdit, registerEdit, updateData, updateRegister, isLoading } = props;

        return (
            <div className="content">
                <h3>POS Settings</h3>
                <div className="entry-form">
                    <div className="row">
                        <div className="col-2">
                            <form onSubmit={ edit.edit ? updateRegister : submitRegister }>
                                <div className="row">
                                    <div className="col-12">
                                        <input type="text" onChange={ changeRegister } name='name'  value={ inputRegister.inputValue } className="form-control" placeholder="Register No" />
                                    </div>
                                    
                                </div>
                                <div className="row">
                                    <div className="col-12">
                                        <button className="save-btn">Save Register</button>
                                    </div>
                                    
                                </div>
                            </form>
                        </div>
                        <div className="col-2">
                            
                            <form onSubmit={ edit.edit ? updateData : submitData }>
                                <div className="row">
                                    
                                    <div className="col-12">
                                        <input type="text" onChange={ change } name='name'  value={ inputVat.inputValue } className="form-control" placeholder="VAT %" />
                                    </div>
                                </div>
                                <div className="row">
                                    
                                    <div className="col-12">
                                        <button className="save-btn">Save VAT</button>
                                    </div>
                                </div>
                            </form>
                        </div> 
                    </div>
                </div>

                <br/>

                <div className="row">
                    <div className="col-2">
                        <table style={{'width': '100%'}}>
                            <thead>
                                <tr>
                                    <td>Sl</td>
                                    <td>Name</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                            <tbody>
                                {
                                    registers.registers.map((data, index) => (
                                        <tr key={ data.unique_id }>
                                            <td>{ data.id }</td>
                                            <td> { data.name }% </td>
                                            <td>
                                                <i className='fa fa-pencil' onClick={() => registerEdit(data, index) }></i>
                                                | 
                                                <i className='fa fa-trash' onClick={() => registerEdit(data, index) }></i>
                                            </td>
                                        </tr>
                                    ))
                                    
                                }
                            </tbody>
                        </table>
                    </div>
                    <div className="col-2">
                        <table style={{'width': '100%'}}>
                            <thead>
                                <tr>
                                    <td>Sl</td>
                                    <td>Name</td>
                                    <td>...</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                {
                                    vats.vats.map((data, index) => (
                                        <tr key={ data.unique_id }>
                                            <td>{ data.id }</td>
                                            <td> { data.name }% </td>
                                            <td>
                                                <i className='fa fa-pencil' onClick={() => dataEdit(data, index) }></i>
                                                | 
                                                <i className='fa fa-trash' onClick={() => dataEdit(data, index) }></i>
                                            </td>
                                        </tr>
                                    ))
                                    
                                }
                            
                            </tbody>
                        </table>
                    </div> 
                </div>
                <Loading load={ isLoading }/>
            </div>
        );
}

export default WithSettings(PosSettings) ;
