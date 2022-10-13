const initialState = {
    access: [],
};

const Logout = (state = initialState, action) => {

    switch(action.type){
        case "LOGOUT" :

            return {
                state,
                access: [],
                loginInfo: []
              
            };        
                 
        default: return state;
    }

}

export default Logout;