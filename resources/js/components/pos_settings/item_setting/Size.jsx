import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../../Loading';


const Sizes = () => {

    
    const [sizes, setSizes] = useState({ sizes: [] });
    const [inputSize, setInputSize] = useState({ sizeValue: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editSize, setEditSize] = useState({ editSize: false });
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {

        size()
    }, []);

    const size = () => {        

        axios.get(url.url+'/size')
            .then(function (response) {

                setSizes({sizes: response.data});
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



  
    const changeSize = (e) => {
        const {value, name } = e.target
        setInputSize({sizeValue: value, name});
    }

    const submitSize = (e) => {

        axios.post(url.url+'/size', inputSize)
            .then(function (response) {
                size()
                setInputSize({ sizeValue: '' });
                setSizes({ sizes: [ response.data, ...sizes.sizes ]});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        e.preventDefault();
    }

    const searchSize = (e) => {

        let data = e.target.value;

        if(data.length > 0 ){
            axios.get(url.url+'/size/'+e.target.value)
            .then(function (response) {

                setSizes({sizes: response.data});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        }else{
            size()
        }
        e.preventDefault();
    }

    const sizeEdit = (size) => {
        console.log(size);
        setInputSize({ sizeValue: size.name});
        setUniqueId({ uniqueId: size.unique_id });
        setEditSize({ editSize: true});
    }

    const updateSize = (e) => {

        axios.post(url.url+'/size/'+uniqueId.uniqueId, inputSize)
            .then(function (response) {
                setInputSize({ sizeValue: '' });
                size()
                setUniqueId({ uniqueId: '' });
                setEditSize({ editSize: false});
                

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <div className='row'>
            { 
                (menuAccess[20] == 2 || userInof.role_id == 1) &&
                
                <div className="col-12">
                    <div className="row">
                        <form onSubmit={ editSize.editSize ? updateSize : submitSize }>
                            <div className="col-12">
                                <input type="text" onKeyUp={ searchSize } value={inputSize.sizeValue} onChange={ changeSize } name='name' className="form-control" placeholder="Size" />
                                {/* <input type="text" value={ unitValue.unit_no } name='unit_no' onChange={changeUnit} className="form-control" placeholder="Unit No" /> */}
                            </div>
                            <div className="col-12">
                                <button className="save-btn">Save Size</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            }

            <hr/>

        { 
            (menuAccess[20] == 1 || userInof.role_id == 1) &&
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
                                sizes.sizes.map((size, index) => (
                                    <tr key={size.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ size.name }</td>
                                        {
                                            (menuAccess[11] == 3 || userInof.role_id == 1) &&
                                                <td><i onClick={() => sizeEdit(size) } className="fa fa-pencil"></i></td>
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

export default Sizes;
