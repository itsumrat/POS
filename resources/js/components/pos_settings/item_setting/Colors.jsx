import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../../Loading';


const Colors = () => {

    
    const [colors, setColors] = useState({ colors: [] });
    const [inputColor, setInputColor] = useState({ colorValue: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editColor, setEditColor] = useState({ editColor: false });
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {

        color()
    }, []);

    const color = () => {        

        axios.get(url.url+'/color')
            .then(function (response) {

                setColors({colors: response.data});
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



  
    const changeColor = (e) => {
        const {value, name } = e.target
        setInputColor({colorValue: value, name});
    }

    const submitColor = (e) => {

        axios.post(url.url+'/color', inputColor)
            .then(function (response) {
                color()
                setInputColor({ colorValue: '' });
                setColors({ colors: [ response.data, ...colors.colors ]});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        e.preventDefault();
    }

    const searchColor = (e) => {

        let data = e.target.value;

        if(data.length > 0 ){
            axios.get(url.url+'/color/'+e.target.value)
            .then(function (response) {

                setColors({colors: response.data});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        }else{
            color()
        }
        e.preventDefault();
    }

    const colorEdit = (color) => {
        console.log(color);
        setInputColor({ colorValue: color.name});
        setUniqueId({ uniqueId: color.unique_id });
        setEditColor({ editColor: true});
    }

    const updateColor = (e) => {

        axios.post(url.url+'/color/'+uniqueId.uniqueId, inputColor)
            .then(function (response) {
                setInputColor({ colorValue: '' });
                color()
                setUniqueId({ uniqueId: '' });
                setEditColor({ editColor: false});
                

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <div className='row'>
            { 
                (menuAccess[21] == 2 || userInof.role_id == 1) &&
                
                <div className="col-12">
                    <div className="row">
                        <form onSubmit={ editColor.editColor ? updateColor : submitColor }>
                            <div className="col-12">
                                <input type="text" onKeyUp={ searchColor } value={inputColor.colorValue} onChange={ changeColor } name='name' className="form-control" placeholder="Color" />
                                {/* <input type="text" value={ unitValue.unit_no } name='unit_no' onChange={changeUnit} className="form-control" placeholder="Unit No" /> */}
                            </div>
                            <div className="col-12">
                                <button className="save-btn">Save Color</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            }

<hr/>

        { 
            (menuAccess[21] == 1 || userInof.role_id == 1) &&
                <div className="col-12">
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
                                colors.colors.map((color, index) => (
                                    <tr key={color.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ color.name }</td>
                                        {
                                            (menuAccess[11] == 3 || userInof.role_id == 1) &&
                                                <td><i onClick={() => colorEdit(color) } className="fa fa-pencil"></i></td>
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

export default Colors;