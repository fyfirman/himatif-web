function isShow(id){
    let element = document.getElementById(id);
    if (element.style.display == "none" || element.style.display == '')
        return false;
    else return true;
}

function toogleElement(id){
    let element = document.getElementById(id);
    if (element.style.display == "none" || element.style.display == '') {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}

function toogleAppsMenu(status_login) {
    // Mencegah numpuk
    if(status_login){
        if(isShow('logout-form'))
            toogleAuth(1);
    }
    else{
        if(isShow('login-form'))
            toogleAuth(0);
    }

    toogleElement('apps-wrapper');
}

function toogleAuth(status_login) {
    if(isShow('apps-wrapper'))
        toogleAppsMenu();
    
    let id = null;
    if( status_login )
        id = 'logout-form';
    else
        id = 'login-form';
    toogleElement(id);
}