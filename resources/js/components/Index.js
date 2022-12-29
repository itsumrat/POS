import React, { useState, useEffect } from 'react';
import ReactDOM from 'react-dom';
import { BrowserRouter } from "react-router-dom";
import Routeindex from '../RouteIndex';
import { Provider } from 'react-redux'
import  store from '../store';
import { permission, userInfo, userAccess } from '../store/actions'
import { useSelector, useDispatch } from 'react-redux';



const Index = () => {

    const loader = document.querySelector('.loader');

    // if you want to show the loader when React loads data again
    const showLoader = () => loader.classList.remove('loader');
    
    const hideLoader = () => loader.classList.add('loader');

    const dispatch = useDispatch();

    const [url, setUrl] = useState({ url: '' });

    useEffect(() => {
        showLoader,
        // localStorage.setItem('baseUrl', url.url);
        fatchUserPermission();
        fatchLoginuser();
        fatcthAccess();
    }, []);

    const fatcthAccess = () => {
        axios.get('/allAccess')
        .then(function (response) {
            console.log(response.data);
            dispatch(userAccess(response.data));

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    }


    const fatchLoginuser = () => {
        axios.get('/user')
        .then(function (response) {
            dispatch(userInfo(response.data));

        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    }


    const fatchUserPermission = () => {
        axios.get('/access')
        .then(function (response) {
            dispatch(permission(response.data));
        })
        .catch(function (error) {
            // handle error
            console.log(error);
        })
    }


   
        return (
                
            <BrowserRouter basename='home'>
                    <Routeindex />
            </BrowserRouter>
                
        );
    }







export default Index;

if (document.getElementById('root')) {
    ReactDOM.render(
        <Provider store={store} >            
            <Index/> 
        </Provider>
        , document.getElementById('root'));
}
