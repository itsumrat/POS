import accessData from './Permission';
import allAccess from './access';
import Logout from './Logout';
import posRegister from './posRegister';
import PosItem from './PosItem';
import { combineReducers } from 'redux'

const rootReducer = combineReducers({
    accessData,
    allAccess,
    Logout,
    posRegister,
    PosItem


});

export default rootReducer;