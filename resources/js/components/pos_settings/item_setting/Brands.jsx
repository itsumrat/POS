import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../../Loading';


const Brands = (props) => {

    
    const [brands, setBrands] = useState({ brands: [] });
    const [inputBrand, setInputBrand] = useState({ brandValue: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editBrand, setEditBrand] = useState({ editBrand: false });

    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {

        brand()
        
    }, []);

const brand = () => {        

        axios.get(url.url+'/brand')
            .then(function (response) {

                setBrands({brands: response.data});
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



  
    const changeBrand = (e) => {
        const {value, name } = e.target
        setInputBrand({brandValue: value, name});
    }

    const submitBrand = (e) => {

        axios.post(url.url+'/brand', inputBrand)
            .then(function (response) {
                brand()
                setInputBrand({ brandValue: '' });
                setBrands({ brands: [ response.data, ...brands.brands ]});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        e.preventDefault();
    }

    const searchBrand = (e) => {

        let data = e.target.value;

        if(data.length > 0 ){
            axios.get(url.url+'/brand/'+e.target.value)
            .then(function (response) {

                setBrands({brands: response.data});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        }else{
            brand()
        }
        e.preventDefault();
    }

    const brandEdit = (brand) => {
        console.log(brand);
        setInputBrand({ brandValue: brand.name});
        setUniqueId({ uniqueId: brand.unique_id });
        setEditBrand({ editBrand: true});
    }

    const updateBrand = (e) => {

        axios.post(url.url+'/brand/'+uniqueId.uniqueId, inputBrand)
            .then(function (response) {
                setInputBrand({ brandValue: '' });
                brand()
                setUniqueId({ uniqueId: '' });
                setEditBrand({ editBrand: false});
                

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <div className='row'>
            { 
                (menuAccess[19] == 2 || userInof.role_id == 1) &&
                
                <div className="col-12">
                    <div className="row">
                        <form onSubmit={ editBrand.editBrand ? updateBrand : submitBrand }>
                            <div className="col-12">
                                <input type="text" onKeyUp={ searchBrand } value={inputBrand.brandValue} onChange={ changeBrand } name='name' className="form-control" placeholder="Brand" />
                                {/* <input type="text" value={ unitValue.unit_no } name='unit_no' onChange={changeUnit} className="form-control" placeholder="Unit No" /> */}
                            </div>
                            <div className="col-12">
                                <button className="save-btn">Save Brand</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            }

<hr/>

        { 
            (menuAccess[19] == 1 || userInof.role_id == 1) &&
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
                                brands.brands.map((brand, index) => (
                                    <tr key={brand.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ brand.name }</td>
                                        {
                                            (menuAccess[11] == 3 || userInof.role_id == 1) &&
                                                <td><i onClick={() => brandEdit(brand) } className="fa fa-pencil"></i></td>
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

export default Brands;
