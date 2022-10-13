import React from 'react';

const Loading = (isloading) => {

    return (
        <div className={ isloading.load ? "loader" : ''}></div>
    );
}

export default Loading;
