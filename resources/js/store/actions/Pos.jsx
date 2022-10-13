export const Pos = (data) => {

    return {
        type: "POS",

        payload: {
            id: data.id,
            title: data.item_name,
            price: data.sale_price,
            color: data.color.name,
            size: data.size.name,
            unit: data.unit.name,
            qty: 1,
            stock: 100,
            subTotal: parseFloat(data.sale_price)
        }
        
    }
}