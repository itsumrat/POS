import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../../Loading';


const Units = () => {

    
    const [units, setUnits] = useState({ units: [] });
    const [inputUnit, setInputUnit] = useState({ name: '', unit_no: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editUnit, setEditUnit] = useState({ editUnit: false });
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {

        unit()
    }, []);

    const unit = () => {        

        axios.get(url.url+'/unit')
            .then(function (response) {

                setUnits({units: response.data});
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



  
    const changeUnit = (e) => {
        const {value, name } = e.target
        if(name == "name"){
            setInputUnit({
                ...inputUnit,
                name: value
            });
        }else{
            setInputUnit({
                ...inputUnit,
                unit_no: value
            });
        }

        console.log(inputUnit);
        
    }

    const submitUnit = (e) => {

        axios.post(url.url+'/unit', inputUnit)
            .then(function (response) {
                unit()
                setInputUnit({ name: '', unit_no: ''  });
                setUnits({ units: [ response.data, ...units.units ]});
            })
            .catch(function (error) {
                console.log(error);
            })
        e.preventDefault();
    }

    const searchUnit = (e) => {

        let data = e.target.value;

        if(data.length > 0 ){
            axios.get(url.url+'/unit/'+e.target.value)
            .then(function (response) {

                setUnits({units: response.data});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        }else{
            unit()
        }
        e.preventDefault();
    }

    const unitEdit = (unit) => {
        console.log(unit);
        setInputUnit({ name: unit.name, unit_no:unit.unit_no});
        setUniqueId({ uniqueId: unit.unique_id });
        setEditUnit({ editUnit: true});
    }

    const updateUnit = (e) => {

        axios.post(url.url+'/unit/'+uniqueId.uniqueId, inputUnit)
            .then(function (response) {
                setInputUnit({ name: '' });
                setInputUnit({ unit_no: '' });
                unit()
                setUniqueId({ uniqueId: '' });
                setEditUnit({ editUnit: false});
                

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <div className='row'>
            { 
                (menuAccess[17] == 2 || userInof.role_id == 1) &&
                
                <div className="col-12">
                    <div className="row">
                        <form onSubmit={ editUnit.editUnit ? updateUnit : submitUnit }>
                            <div className="col-12">
                                <input type="text" onKeyUp={ searchUnit } value={ inputUnit.name } onChange={ changeUnit } name='name' className="form-control" placeholder="Unit" />
                                <input type="text" value={ inputUnit.unit_no } name='unit_no' onChange={changeUnit} className="form-control" placeholder="Unit No" />
                            </div>
                            <div className="col-12">
                                <button className="save-btn">Save Unit</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            }

            <hr/>

        { 
            (menuAccess[17] == 1 || userInof.role_id == 1) &&
                <div className="col-12">
                    <table style={{'width': '100%'}}>
                        <thead>
                            <tr>
                                <td>Sl</td>
                                <td>Name</td>
                                <td>Unit</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody> 
                            {
                                units.units.map((unit, index) => (
                                    <tr key={unit.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ unit.name }</td>
                                        <td>{ unit.unit_no }</td>
                                        {
                                            (menuAccess[11] == 3 || userInof.role_id == 1) &&
                                                <td><i onClick={() => unitEdit(unit) } className="fa fa-pencil"></i></td>
                                            }
                                    </tr>
                                ))
                            }                   
                            
                        </tbody>
                    </table>
                </div>
            }

        <Loading load={ isLoading }/>
        </div>
    )

    
}

export default Units;