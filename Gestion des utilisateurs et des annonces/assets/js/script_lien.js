//recuperation des elements
let nav = document.getElementsByClassName("nav-link");
//ajout d'un event listener sur chaque element
nav.addEventListener("click", function(e) {
    //prevenir le comportement par defaut
    e.preventDefault();
    
});