import React from 'react';

const UploadMaster = () => {
    return (
        <React.Fragment>
            <h3>Item Master</h3>
            <p><i>Fill up. *marks are mandatory field!</i></p>
            <div className="entry-form">
                <form action="">
                    <div className="row">
                        <div className="col-3">
                            <input type="file" className="form-control" placeholder="Download Sample CSV File" />
                        </div>
                        <div className="col-3">
                            <a href="">Sample CSV File</a>
                        </div>
                    </div>
                    <br />
                    <div className="row">
                        <div className="col-3">
                            <button className="save-btn">Upload</button>
                        </div>
                        <div className="col-3">
                            <button className="save-btn">Download</button>
                        </div>
                    </div>
                </form>
            </div>
        </React.Fragment>

    );
}

export default UploadMaster;
