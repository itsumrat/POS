const initialState = {
    menuPermissions: [],
    loginInfo: []
  };

 
const accessData = (state = initialState, action) => {

    switch(action.type){
        case "ACCESS" :
            const { menuPermissions } = action;
          
            return {
                ...state,
              ...state.menuPermissions, menuPermissions 
              
            };
        case "USERLOGIN" :
            const { loginInfo } = action;
            
            return {
                ...state,
                ...state.loginInfo, loginInfo 
                
            };
                 
        default: return state;
    }

}

export default accessData;