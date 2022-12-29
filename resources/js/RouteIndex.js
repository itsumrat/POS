import React, { Component } from 'react';
import { Routes, Route,  NavLink } from 'react-router-dom'
import CostingPricing from './components/CostingPricing';

import CustomerIndex from './components/customer/Index';
import CustomerMaster from './components/customer/CustomerMaster';
import CustomerLedger from './components/customer/CustomerLedger';
import ManageCustomer from './components/customer/ManageCustomer';

import Dashboard from './components/Dashboard';
import InventoryMaster from './components/InventoryMaster';
import Itemmaster from './components/ItemMaster';
import ItemRequisition from './components/ItemRequisition';
import Expense from './components/pos_window/Expense';
import PromoPricing from './components/pos_window/Promo_Pricing';
import Register from './components/pos_window/Register';
import Regular_Pricing from './components/pos_window/Regular_Pricing';
import PosSettings from './components/pos_settings/PosSettings';
import ItemSettings from './components/pos_settings/ItemSettings';
import CompanySettings from './components/pos_settings/CompanySettings';
import HrSettings from './components/pos_settings/HrSettings';
import OthersSettings from './components/pos_settings/OthersSettings';
import Permission from './components/pos_settings/Permission';
import Role from './components/pos_settings/Role';
import Sales from './components/pos_window/Sales';
import PrintBarcode from './components/PrintBarcode';
import Purchasemaster from './components/PurchaseMaster';
import SposSettings from './components/SposSettings';
import Standardpos from './components/StandardPos';
import VendorMaster from './components/VendorMaster';
import ItemMasterChild from './components/item_master/ItemMaster';
import UploadMaster from './components/item_master/UploadMaster';
import Payables from './components/payables/Payables';
import Receivables from './components/receivables/Receivables';
import Accounts from './components/accounts/Accounts';
import Ledger from './components/accounts/Ledger';
import Create from './components/accounts/Create';
import WithSingleInputComponent from './components/HOC/WithSingleInputComponent';
import Logout from './components/Logout';
import { useSelector} from 'react-redux';
import Print from './components/pos_window/Print';


const Routeindex = () => {

    const menuAccess = useSelector((state) => state.accessData.menuPermissions)
    const userInof = useSelector((state) => state.accessData.loginInfo)
    const posWindowStatusStorage = localStorage.getItem('posWindowStatus_'+userInof.id);

        return (
            <React.Fragment>                    
                <Routes>
                    <Route exact path="/" element={<Dashboard/>}></Route>
                    <Route exact path="/logout" element={<Logout/>}></Route>

                    { 
                        (menuAccess[1] == 1 || userInof.role_id == 1) && 

                        <Route exact path="item_master" element={<Itemmaster/>}>
                            <Route exact path="" element={<ItemMasterChild/>}></Route>
                            <Route exact path="upload_csv" element={<UploadMaster/>}></Route>
                        </Route>
                        
                    }
                    

                    {
                        (menuAccess[2] == 2 || userInof.role_id == 1) && 
                        <Route exact path="inventory_master" element={<InventoryMaster/>}></Route>
                    }
                    
                    
                    {
                        (menuAccess[3] == 3 || userInof.role_id == 1) && 
                        <Route exact path="costing_pricing" element={<CostingPricing/>}></Route>
                    }

                    {
                        (menuAccess[4] == 4 || userInof.role_id == 1) && 
                        <Route exact path="print_barcode" element={<PrintBarcode/>}></Route>
                    }
                    

                    {
                        (menuAccess[5] == 5 || userInof.role_id == 1) && 
                        <Route exact path="item_requisition" element={<ItemRequisition/>}></Route>
                    }
                    

                    {
                        (menuAccess[6] == 6 || userInof.role_id == 1) && 
                        <Route exact path="purchase_master" element={<Purchasemaster/>}></Route>
                    }
                    

                    {
                        (menuAccess[7] == 7 || userInof.role_id == 1) && 

                        <Route exact path="customer_master" element={<CustomerIndex/>}>
                            <Route exact path="" element={<CustomerMaster/>}></Route>
                            <Route exact path="customerLedger" element={<CustomerLedger/>}></Route>
                            <Route exact path="customerManage" element={<ManageCustomer/>}></Route>
                        </Route>
                    }
                    

                    {
                        (menuAccess[8]  == 8 || userInof.role_id == 1) && 
                        <Route exact path="vendor_master" element={<VendorMaster/>}></Route>
                    }
                    

                    {
                        (menuAccess[22]  == 22 || userInof.role_id == 1) && 
                        <Route exact path="payables" element={<Payables/>}></Route>
                    }

                    

                    {
                        (menuAccess[23]  == 23 || userInof.role_id == 1) && 
                        <Route exact path="receivables" element={<Receivables/>}></Route>
                    }
                    
                    
                    {
                        (menuAccess[24]  == 24 || userInof.role_id == 1) && 
                        <Route exact path="accounts" element={<Accounts/>}>
                            <Route exact path="" element={<Create/>}></Route>
                            <Route exact path="ledger" element={<Ledger/>}></Route>
                        </Route>
                    }
                   
                    {
                        (menuAccess[9] == 9 || userInof.role_id == 1) && 
                        <Route exact path="spos_settings" element={<SposSettings/>}>
                            <Route exact path="" element={<PosSettings/>}></Route>
                            <Route exact path="itemSettings" element={<ItemSettings/>}></Route>
                            <Route exact path="companySettings" element={<CompanySettings/>}></Route>
                            <Route exact path="hrSettings" element={<HrSettings/>}></Route>
                            <Route exact path="role" element={<Role/>}></Route>
                            <Route exact path="permission" element={<Permission/>}></Route>
                            <Route exact path="otherSettings" element={<OthersSettings/>}></Route>
                        </Route>
                    }
                    
                    {
                        // (menuAccess[10] == 10 && ( posWindowStatusStorage == 'Open' ) || userInof.role_id == 1 && ( posWindowStatusStorage == 'Open' ) ) && 
                            <>
                                <Route exact path="print/:id" element={<Print/>}></Route> 
                                <Route exact path="standard_pos" element={<Standardpos/>}>                   
                                    <Route exact path="" element={<Register/>}></Route>
                                    <Route exact path="sales" element={<Sales/>}></Route>
                                    <Route exact path="expense" element={<Expense/>}></Route>
                                    <Route exact path="regular_price" element={<Regular_Pricing/>}></Route>
                                    <Route exact path="promo_price" element={<PromoPricing/>}></Route>
                                </Route>
                            </>

                        
                    }
                    
                </Routes>
            </React.Fragment>
        );
}

export default Routeindex;
