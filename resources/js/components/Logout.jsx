import React, { useEffect, useState } from 'react';
import { useSelector} from 'react-redux';
import Loading from './Loading';


const Logout = () => {

    const logout = useSelector((state) => state.Logout.access)

        // Url
	const [url, setUrl] = useState({ url: localStorage.getItem('baseUrl') });

    // useEffect get Currect data
	useEffect(() => {

        axios.post(url.url+'/logout')
            .then(function (response) {

                if (response.data == "logout"){
                    return window.location.reload(true);
                }
                

            })
            .catch(function (error) {
                // handle error
                console.log(error);
            })

		
	}, []);

    return (
        <div>
            <Loading key="Category" load={true}> </Loading>
            <div style={{ top: "calc(52% - 4em)",  left: "calc(49% - 4em)", position: "absolute" }}>loging...</div>
        </div>
    )

   
    
   
}

export default Logout;
