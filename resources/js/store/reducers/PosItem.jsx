const initialState = {
    posSeleItems: [],
};

const PosItem = (state = initialState, action) => {

    switch(action.type){
        case "POS" :

            const { payload } = action;
            // barcode: "0001655179442"
            // brand_id: 2
            // category_id: 3
            // color_id: 1
            // created_at: "2022-06-14T04:04:02.000000Z"
            // created_by: 1
            // department_id: 2
            // description: null
            // id: 1
            // item_name: "Chadwick Reese 07"
            // others: null
            // purchase_price: 500
            // sale_price: 600
            // size_id: 2
            // status: 1
            // unique_id: "1655179442"
            // unit_id: 2
            // updated_at: "2022-06-14T12:25:14.000000Z"
            // updated_by: 1

            // let findIndex = state.posSeleItems.findIndex((posSeleItem) => posSeleItem.barcode === payload.barcode);  
            // let dataEffect = state.posSeleItems.find((posSeleItem) => posSeleItem.barcode === payload.barcode);  
            
            // state.posSeleItems[findIndex].qty = dataEffect.qty+=1;
            // state.posSeleItems[findIndex].subTotal = (parseFloat(dataEffect.price) * parseFloat(dataEffect.qty));
          
            
            // if(!empty(state.posSeleItems)){
            //     return {
            //         ...state,  
            //         posSeleItems: [ ...state.posSeleItems] 
            //     }
                             
            // }else{
                return {
                    ...state,  
                    posSeleItems: [ ...state.posSeleItems, payload] 
                }
            // }     
                 
        default: return state;
    }

}

export default PosItem;