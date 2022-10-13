const initialState = {
    posWindowStatus: '',
};

const posRegister = (state = initialState, action) => {

    switch(action.type){
        case "REGISTER" :

            const { posWindowStatus } = action;
          
            return {
                ...state,
              ...state.posWindowStatus, posWindowStatus 
              
            };     
                 
        default: return state;
    }

}

export default posRegister;