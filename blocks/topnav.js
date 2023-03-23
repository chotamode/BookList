function change_theme() {
    if(localStorage.getItem('themevar') != "night"){
        document.body.style.backgroundColor = "#696969";
        document.getElementById("topnav").style.backgroundColor = "#808080";
        elements = document.getElementsByClassName('rightbut');
        for(var i = 0; i < elements.length; i++){
            elements[i].style.backgroundColor = "#808080";
        }
    
        var all = document.getElementsByTagName("*");
    
        for (var i=0, max=all.length; i < max; i++) {
            all[i].style.color = "#DCDCDC";
        }
    
        var loginform = document.getElementById("loginform");
        var registerform = document.getElementById("registerform");
        if(loginform != null){
            loginform.style.backgroundColor = "#808080";
        }
        if(registerform != null){
            registerform.style.backgroundColor = "#808080";
        }
    
        document.getElementById("theme").textContent = "Light theme";
        localStorage.setItem('themevar', 'night');
    }else{
        document.body.style.backgroundColor = "";
        document.getElementById("topnav").style.backgroundColor = "";
        elements = document.getElementsByClassName('rightbut');
        for(var i = 0; i < elements.length; i++){
            elements[i].style.backgroundColor = "";
        }
    
        var all = document.getElementsByTagName("*");
    
        for (var i=0, max=all.length; i < max; i++) {
            all[i].style.color = "";
        }
    
        var loginform = document.getElementById("");
        var registerform = document.getElementById("");
        if(loginform != null){
            loginform.style.backgroundColor = "";
        }
        if(registerform != null){
            registerform.style.backgroundColor = "";
        }
    
        document.getElementById("theme").textContent = "Night theme";
        localStorage.setItem('themevar', 'light');
    }
}

function checkTheme(){
    if(localStorage.getItem('themevar') == "night"){
        document.body.style.backgroundColor = "#696969";
        document.getElementById("topnav").style.backgroundColor = "#808080";
        elements = document.getElementsByClassName('rightbut');
        for(var i = 0; i < elements.length; i++){
            elements[i].style.backgroundColor = "#808080";
        }
    
        var all = document.getElementsByTagName("*");
    
        for (var i=0, max=all.length; i < max; i++) {
            all[i].style.color = "#DCDCDC";
        }
    
        var loginform = document.getElementById("loginform");
        var registerform = document.getElementById("registerform");
        if(loginform != null){
            loginform.style.backgroundColor = "#808080";
        }
        if(registerform != null){
            registerform.style.backgroundColor = "#808080";
        }
    
        document.getElementById("theme").textContent = "Light theme";
        localStorage.setItem('themevar', 'night');
    }
}