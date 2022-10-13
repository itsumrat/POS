import React, { useEffect, useState } from 'react';
import Loading from '../Loading';
import { Icon, Pagination } from 'semantic-ui-react'

const ItemList = ( props ) => {

    const { itemLists, ItemEdit} = props;

    const [items, setItems] = useState({ items: [] });
    const [page, setPage] = useState(1);
    const [totalPage, setTotalPage] = useState( 1);

    // Loading 
    const [isLoading, setIsLoading] = useState(true);

    // Url
	const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });

    // useEffect get Currect data
	useEffect(() => {
        itemLists.current = fetchItems;
        fetchItems()

		
	}, []);

    const fetchItems = () => {
        axios.get(url.url+'/item_master?page='+page)
            .then(function (response) {

                setItems({ items:response.data.data });
                setTotalPage( (prevTotalPage) =>  prevTotalPage = response.data.last_page )

                setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    }

    /**
     * 
     * @param Handle Pagination
    */
     const handlePaginationChange = (e, { activePage }) => {        
        axios.get(url.url+'/item_master?page='+activePage)
            .then(function (response) {

                setItems({ items:response.data.data });
                setTotalPage( (prevTotalPage) =>  prevTotalPage = response.data.last_page )
                setPage(activePage);

                setIsLoading(false);

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })
    }

    return (
        <div>
            <Loading key="Category" load={isLoading} />
            <table className="tbl-1 mb-10">
                <thead>
                    <tr key="header">
                        <th width="10%">Id</th>
                        <th width="10%">Barcode</th>
                        <th width="15%">Item Name</th>
                        <th width="10%">Dept</th>
                        <th width="10%">Cat</th>
                        <th width="10%">Brand</th>
                        <th width="10%">UoM</th>
                        <th width="10%">Size</th>
                        <th width="10%">Color</th>
                        <th width="10%">Cost Price</th>
                        <th width="10%">Sale Price</th>
                        <th width="5%">...</th>
                    </tr>
                </thead>
                <tbody>

                    {
                        items.items.map((item) => (
                            <tr key={item.unique_id}>
                                <td>{item.id}</td>
                                <td>{item.barcode}</td>
                                <td>{item.item_name}</td>
                                <td>{item.department.name}</td>
                                <td>{item.category.name}</td>
                                <td>{item.brand.name}</td>
                                <td>{item.unit.name}</td>
                                <td>{item.size.name}</td>
                                <td>{item.color.name}</td>
                                <td>{item.purchase_price}</td>
                                <td>{item.sale_price}</td>
                                <td><i className="fa fa-pencil" onClick={() => ItemEdit(item)}> </i></td>
                            </tr>
                        ))
                    }

                </tbody>

            </table>

            <Pagination
                defaultActivePage={page}
                ellipsisItem={"..."}
                firstItem={"⇤"}
                lastItem={"⇥"}
                size='mini'
                onPageChange={ handlePaginationChange }
                prevItem={'Previous'}
                nextItem={'Next'}
                totalPages={totalPage}
            />
        </div>
    );
}

export default ItemList;
