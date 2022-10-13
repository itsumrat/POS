import React, { useEffect, useState } from 'react';

const WithSettings = (OrginalComponet) => {

    const NewComponent = () => {

        const [isLoading, setIsLoading] = useState(true);

        const [vats, setVats] = useState({ vats: [] });
        const [registers, setRegisters] = useState({ registers: [] });

        const [inputVat, setInputVat] = useState({ inputValue: '' });
        const [inputRegister, setInputRegister] = useState({ inputValue: '' });
    
        const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
        const [edit, setEdit] = useState(false);
        
    
        const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    
        useEffect(() => {
    
            commonData()
            register()
            
        }, []);
    
    
        const change = (e) => {
            const {value, name } = e.target
            setInputVat({inputValue: value, name});
        }


        const changeRegister = (e) => {
            const {value, name } = e.target
            setInputRegister({inputValue: value, name});
        }
        
    
        const commonData = () => {        
    
            axios.get(url.url+'/vat')
                .then(function (response) {
    
                    setVats({vats: response.data});
                    setIsLoading(false);
    
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                    console.log('done');
                });
        }



        const register = () => {        
    
            axios.get(url.url+'/settingsRegister')
                .then(function (response) {

                    console.log(response);
    
                    setRegisters({registers: response.data});
                    setIsLoading(false);
    
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
                .then(function () {
                    // always executed
                    console.log('done');
                });
        }
    
    
    
        const dataEdit = (vat) => {
    
            setInputVat({ inputValue: vat.name});
            setUniqueId({ uniqueId: vat.unique_id });
            setEdit({ edit: true});
    
        }

        const registerEdit = (register) => {
    
            setInputRegister({ inputValue: register.name});
            setUniqueId({ uniqueId: register.unique_id });
            setEdit({ edit: true});
    
        }
    
        const submitData = (e) => {
    
            axios.post(url.url+'/vat', inputVat)
                .then(function (response) {
                    
                    setInputVat({ inputValue: '' });
                    setVats({ vats: [ response.data, ...vats.vats ]});
                    
    
                })
                .catch(function (error) {
                    console.log(error);
                })
            e.preventDefault();
        }

        const submitRegister = (e) => {
    
            axios.post(url.url+'/settingsRegister', inputRegister)
                .then(function (response) {
                    
                    setInputRegister({ inputValue: '' });
                    setRegisters({ registers: [ response.data, ...registers.registers ]});
                    
    
                })
                .catch(function (error) {
                    console.log(error);
                })
            e.preventDefault();
        }



    
        const updateData = (e) => {
    
            axios.post(url.url+'/vat/'+uniqueId.uniqueId, inputVat)
                .then(function (response) {
                   
                    setVats( {               
                        vats: vats.vats.map((elem) => {
    
                            if(elem.unique_id === uniqueId.uniqueId){
                               return {
                                    ...elem, name : response.data.name
                               }
                                    
                            }
    
                            return elem;
                        })
                    })
    
                    
                    setInputVat({ inputValue: ''});
                    setUniqueId({ uniqueId: '' });
                    setEdit({ edit: false});
                    
    
                })
                .catch(function (error) {
                    console.log(error);
                })
    
    
            e.preventDefault();
        }


        const updateRegister = (e) => {
    
            axios.post(url.url+'/settingsRegister/'+uniqueId.uniqueId, inputRegister)
                .then(function (response) {
                   
                    setRegisters( {               
                        registers: registers.registers.map((elem) => {
    
                            if(elem.unique_id === uniqueId.uniqueId){
                               return {
                                    ...elem, name : response.data.name
                               }
                                    
                            }
    
                            return elem;
                        })
                    })
    
                    
                    setInputRegister({ inputValue: ''});
                    setUniqueId({ uniqueId: '' });
                    setEdit({ edit: false});
                    
    
                })
                .catch(function (error) {
                    console.log(error);
                })
    
    
            e.preventDefault();
        }



        
        return (
            <React.Fragment>
                <OrginalComponet 
                vats={vats} 
                edit={edit} 
                commonData={commonData} 
                inputVat={inputVat} 
                change={change} 
                submitData={submitData} 
                dataEdit={dataEdit} 
                updateData={updateData}

                registers = {registers} 
                registerEdit = {registerEdit} 
                register = {register} 
                changeRegister = {changeRegister}
                inputRegister = {inputRegister} 
                submitRegister = {submitRegister} 
                updateRegister = {updateRegister}
                isLoading={ isLoading } />
            </React.Fragment>
        );
        
    }
    
    return NewComponent;
}

export default WithSettings;
