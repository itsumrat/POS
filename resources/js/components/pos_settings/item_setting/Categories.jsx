import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../../Loading';


const Categories = () => {

    
    const [categories, setCategories] = useState({ categories: [] });
    const [inputCategory, setInputCategory] = useState({ categoryValue: '' });


    const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)

    // Edit function goes here
    const [uniqueId, setUniqueId] = useState({ uniqueId: '' });
    const [editCategory, setEditCategory] = useState({ editCategory: false });
    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {

        category()
    }, []);

    const category = () => {        

        axios.get(url.url+'/categories')
            .then(function (response) {

                setCategories({categories: response.data});
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



  
    const changeCategory = (e) => {
        const {value, name } = e.target
        setInputCategory({categoryValue: value, name});
    }

    const submitCategory = (e) => {

        axios.post(url.url+'/category', inputCategory)
            .then(function (response) {
                category()
                setInputCategory({ categoryValue: '' });
                setCategories({ categories: [ response.data, ...categories.categories ]});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        e.preventDefault();
    }

    const searchCategory = (e) => {

        let data = e.target.value;

        if(data.length > 0 ){
            axios.get(url.url+'/category/'+e.target.value)
            .then(function (response) {

                setCategories({categories: response.data});
                

            })
            .catch(function (error) {
                console.log(error);
            })
        }else{
            category()
        }
        e.preventDefault();
    }

    const categoryEdit = (category) => {
        console.log(category);
        setInputCategory({ categoryValue: category.name});
        setUniqueId({ uniqueId: category.unique_id });
        setEditCategory({ editCategory: true});
    }

    const updateCategory = (e) => {

        axios.post(url.url+'/category/'+uniqueId.uniqueId, inputCategory)
            .then(function (response) {
                setInputCategory({ categoryValue: '' });
                category()
                setUniqueId({ uniqueId: '' });
                setEditCategory({ editCategory: false});
                

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <div className='row'>
            { 
                (menuAccess[18] == 2 || userInof.role_id == 1) &&
                
                <div className="col-12">
                    <div className="row">
                        <form onSubmit={ editCategory.editCategory ? updateCategory : submitCategory }>
                            <div className="col-12">
                                <input type="text" onKeyUp={ searchCategory } value={inputCategory.categoryValue} onChange={ changeCategory } name='name' className="form-control" placeholder="Category" />
                                {/* <input type="text" value={ unitValue.unit_no } name='unit_no' onChange={changeUnit} className="form-control" placeholder="Unit No" /> */}
                            </div>
                            <div className="col-12">
                                <button className="save-btn">Save Category</button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            }

<hr/>

        { 
            (menuAccess[18] == 1 || userInof.role_id == 1) &&
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
                                categories.categories.map((category, index) => (
                                    <tr key={category.unique_id}>
                                        <td>{ ++index }</td>
                                        <td>{ category.name }</td>
                                        {
                                            (menuAccess[11] == 3 || userInof.role_id == 1) &&
                                                <td><i onClick={() => categoryEdit(category) } className="fa fa-pencil"></i></td>
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

export default Categories;
