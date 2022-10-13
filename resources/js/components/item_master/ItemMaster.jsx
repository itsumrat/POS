import React, { useEffect, useState, useRef } from 'react';
import Loading from '../Loading';
import { useSelector } from 'react-redux';
import ItemList from './ItemList';


const ItemMaster = () => {

    // Loading 
    const [isLoading, setIsLoading] = useState(true);
    //  Button text
    const [button, setButton] = useState("Save");
    // Call referance form Item list
    const itemLists = useRef(null);
    
    // Url
	const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });
    // Access
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const menuAccess = useSelector((state) => state.accessData.menuPermissions)
    // Data Loop
	const [brands, setBrands] = useState({ brands: [] });
	const [categories, setCategories] = useState({ categories: [] });
	const [colors, setColors] = useState({ colors: [] });
	const [departments, setDepartments] = useState({ departments: [] });
	const [sizes, setSizes] = useState({ sizes: [] });
	const [units, setUnits] = useState({ units: [] });
    const [items, setItems] = useState({ items: [] });
    // Edit
    const [editItem, setEditItem] = useState(false);
    // input field data
    const [inputField, setInputField] = useState({
        barcode: '',
        item_name: '',
        department_id: '',
        category_id: '',
        brand_id: '',
        unit_id: '',
        size_id: '',
        color_id: '',
        purchase_price: '',
        sale_price: '',
        unique_id: ''
    });


    // Input Field Refresh
    const refreshInputField = () => {
        setInputField({
            barcode: '',
            item_name: '',
            department_id: '',
            category_id: '',
            brand_id: '',
            unit_id: '',
            size_id: '',
            color_id: '',
            purchase_price: '',
            sale_price: '',
        });
    }



	useEffect(() => {

        department();
        brand();
        category();
        color();
        size();
        unit();

		setIsLoading(false);

		
	}, []);

    const brand = () => {        

        axios.get(url.url+'/brand')
            .then(function (response) {

                setBrands({brands: response.data});
                

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            
    }

    const category = () => {        

        axios.get(url.url+'/categories')
            .then(function (response) {

                setCategories({categories: response.data});
                // setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            
    }

    const color = () => {        

        axios.get(url.url+'/color')
            .then(function (response) {

                setColors({colors: response.data});
                // setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            
    }

    const department = () => {
    

        axios.get(url.url+'/departments')
            .then(function (response) {

                setDepartments({departments: response.data});
                // setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
            
    }

    const size = () => {        

        axios.get(url.url+'/size')
            .then(function (response) {

                setSizes({sizes: response.data});
                // setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    }

    const unit = () => {        

        axios.get(url.url+'/unit')
            .then(function (response) {

                setUnits({units: response.data});
                // setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    }


    const inputValueChange = (e) => {
        const { value } = e.target;
        setInputField(
            {
                ...inputField,
                [e.target.name]: value
            }
        );

    }

    const ItemEdit = (item) => {
        setInputField({
            barcode: item.barcode,
            item_name: item.item_name,
            department_id: item.department_id,
            category_id: item.category_id,
            brand_id: item.brand_id,
            unit_id: item.unit_id,
            size_id: item.size_id,
            color_id: item.color_id,
            purchase_price: item.purchase_price,
            sale_price: item.sale_price,
            // Only work for update
            unique_id: item.unique_id
        });
        setEditItem(true);
        setButton("Update");
    }

    // Item Submit function goes here
    const itemSubmit = (e) => {

        axios.post(url.url+'/item_master', inputField)
            .then(function (response) {

                setItems({ items: [ response.data, ...items.items ]});
                itemLists.current();
                refreshInputField();

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })

        e.preventDefault();
    }

    const update = (e) => {

        axios.post(url.url+'/item_master/'+inputField.unique_id, inputField)
            .then(function (response) {
                
                itemLists.current()
                refreshInputField()
                setEditItem(false);
                setButton("Save");

            })
            .catch(function (error) {
                console.log(error);
            })


        e.preventDefault();
    }

    return (
        <React.Fragment>
								
            <h3>Item Master</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>
            <div className="entry-form">
                <form onSubmit={ editItem ? update : itemSubmit } style={ { paddingBottom: '15px' } } >
                    <div className="row">
                        <div className="col-5">
                            <input key="Barcode" value={ inputField.barcode } onChange={ inputValueChange } name="barcode" type="text" className="form-control" placeholder="Barcode" />
                        </div>
                        <div className="col-7">
                            <input key="item_name_" value={ inputField.item_name } name="item_name" onChange={ inputValueChange } type="text" className="form-control" placeholder="Item Name" required/>
                        </div>
                        <div className="col-3">
                            <Loading key="department" load={ isLoading }/>
                            <select value={ inputField.department_id } name="department_id" onChange={ inputValueChange } key="department_id" className="form-control" required>
                            <option value="">Select Department</option>
                                {
                                    departments.departments.map(( department ) => (
                                        <option key={department.unique_id} value={department.id}>{ department.name }</option>
                                    ))
                                }
                            </select>
                        </div>
                        <div className="col-3">
                            <Loading key="Category" load={ isLoading }/>
                            <select value={ inputField.category_id } name="category_id" onChange={ inputValueChange } key="category_id" className="form-control" required>
                                <option value="">Select Category</option>
                                {
                                    categories.categories.map(( category ) => (
                                        <option key={category.unique_id} value={category.id}>{ category.name }</option>
                                    ))
                                }
                            </select>
                        </div>
                        <div className="col-3">
                            <Loading key="Brand" load={ isLoading }/>
                            <select name="brand_id" value={ inputField.brand_id } onChange={ inputValueChange } key="brand_id" className="form-control" required>
                                <option value="">Select Brand</option>
                                {
                                    brands.brands.map(( brand ) => (
                                        <option key={brand.unique_id} value={brand.id}>{ brand.name }</option>
                                    ))
                                }
                                 
                            </select>
                        </div>
                        <div className="col-3">
                        <Loading key="UoM" load={ isLoading }/>
                            <select name="unit_id" value={ inputField.unit_id } onChange={ inputValueChange } key="unit_id" className="form-control" required>
                                <option value="">Select UoM</option>
                                {
                                    units.units.map(( unit ) => (
                                        <option key={unit.unique_id} value={unit.id}>{ unit.name }</option>
                                    ))
                                }

                            </select>
                        </div>
                        <div className="col-3">
                        <Loading key="Size" load={ isLoading }/>
                            <select name="size_id" value={ inputField.size_id } onChange={ inputValueChange } key="size_id" className="form-control" required>
                            
                                <option value="">Select Size</option>
                                {
                                    sizes.sizes.map(( size ) => (
                                        <option key={size.unique_id} value={size.id}>{ size.name }</option>
                                    ))
                                }

                            </select>
                        </div>
                        <div className="col-3">
                        <Loading key="Color" load={ isLoading }/>
                            <select name="color_id" value={ inputField.color_id } onChange={ inputValueChange } key="color_id" className="form-control" required>
                                <option value="">Select Color</option>
                                {
                                    colors.colors.map(( color ) => (
                                        <option key={color.unique_id} value={color.id}>{ color.name }</option>
                                    ))
                                }
                            </select>
                        </div>
                        <div className="col-3" key="purchase_price">
                            <input name="purchase_price" value={ inputField.purchase_price } onChange={ inputValueChange } type="text" key="cost" className="form-control" placeholder="Purchase Price" required/>
                        </div>

                        <div className="col-3" key="sale_price">
                            <input name="sale_price" value={ inputField.sale_price } onChange={ inputValueChange } type="text" key="sale" className="form-control" placeholder="Selling Price" required/>
                        </div>
                    </div>
                    <br />
                    <div className="row">
                        <div className="col-12">
                            <button className="save-btn">{ button }</button>
                        </div>
                    </div>
                </form>
            </div>

            {/* item List */}
            <div className="bottom-report" style={{ position: "relative" }}>
                <div className="tbl-action-btn">
                    <div className="float-left col-3">
                        <input key="item_name" className="form-control" placeholder="Search by order#, name..." />
                    </div>
                    <div className="col-6"></div>
                    <div className="float-right col-3">
                        <span>Filters <i className="fa fa-angle-down"></i></span> <i className="fa fa-ellipsis-h"></i>
                    </div>
                </div>

                <ItemList itemLists={ itemLists } ItemEdit={ ItemEdit }/>

            </div>
        </React.Fragment>
    );
}

export default ItemMaster;
