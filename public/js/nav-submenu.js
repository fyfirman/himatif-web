function toogleAppsMenu() {
    // Mencegah numpuk
    if(isShow('login-form'))
        toogleAuth(0);
    if(isShow('logout-form'))
        toogleAuth(1);

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

function toogleElement(id){
    let element = document.getElementById(id);
    if (element.style.display == "none" || element.style.display == '') {
        element.style.display = "block";
    } else {
        element.style.display = "none";
    }
}

function isShow(id){
    let element = document.getElementById(id);
    if (element.style.display == "none" || element.style.display == '')
        return false;
    else return true;
}