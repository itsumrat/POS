import React, { useEffect, useState } from 'react';
import { useSelector } from 'react-redux';
import Loading from '../Loading';
import Brands from './item_setting/Brands';
import Categories from './item_setting/Categories';
import Colors from './item_setting/Colors';
import Department from './item_setting/Department';
import Sizes from './item_setting/Size';
import Units from './item_setting/Units';


const ItemSettings = () =>  {

    const [isLoading, setIsLoading] = useState(true);

    useEffect(() => {
        setIsLoading(false);
        console.log('hello')
    }, []);


        return (
            <div className='content'>
                <h3>Item Settings</h3>
                <div className="entry-form">
                        <div className="row">
                        {/* <input type="text" onKeyUp={ searchDepartment } value={inputDepartment.departmentValue} onChange={ changeDepartment } name='unit_name' className="form-control" placeholder="Category" />
                                <input type="text" value={ unitValue.unit_no } name='unit_no' onChange={changeUnit} className="form-control" placeholder="Unit No" /> */}
                        <div className="col-2">
                            <Units/>
                        </div>
                        <div className="col-2">
                            <Department/>
                        </div>
                        <div className="col-2">
                            <Categories/>
                        </div>
                        <div className="col-2">
                            <Brands/>
                        </div>
                        
                        <div className="col-2">
                            <Sizes/>
                        </div>

                        <div className="col-2">
                            <Colors/>
                        </div> 
                    </div>
                </div>
                <Loading load={ isLoading }/>
            </div>
        );

}

export default ItemSettings;
