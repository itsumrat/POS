export const permission = (access) => {

    return {
        type: "ACCESS",
        menuPermissions: access
        
    }
}


export const userInfo = (data) => {

    return {
        type: "USERLOGIN",
        loginInfo: data
        
    }
}

export const userAccess = (data) => {
    return {
        type:"ALLACCESS",
        access: data
    }
}


export const logOut = () => {
    return {
        type:"LOGOUT",
        access: []
    }
}

