const initialState = {
    access: [],
};

const allAccess = (state = initialState, action) => {

    switch(action.type){
        case "ALLACCESS" :
            const { access } = action;
          
            return {
                ...state,
              ...state.access, access 
              
            };        
                 
        default: return state;
    }

}

export default allAccess;