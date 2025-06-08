//recuperation des elements
const registrationForm = document.getElementById("registrationForm");
const nom = document.getElementById("lastname");
const prenom = document.getElementById("firstname");
const email = document.getElementById("email");
const mot_de_passe = document.getElementById("password");
const mot_de_passe_confirm = document.getElementById("passwordConfirm");

//recuperation des elements d'erreur
const nomError = document.getElementById("erreurNom") ;
const prenomError = document.getElementById("erreurPrenom");
const emailError = document.getElementById("erreurEmail");
const mot_de_passeError = document.getElementById("erreurPassword");
const mot_de_passe_confirmError = document.getElementById("erreurPasswordConfirm");

//regex
const regexNom = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
const regexPrenom = /^[A-Za-zÀ-ÖØ-öø-ÿ\s'-]+$/;
const regexEmail = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
const regexPassword = /^.{8,}$/;

//recuperation des valeurs des champs
const password = mot_de_passe.value.trim();
const passwordConfirm = mot_de_passe_confirm.value.trim();
console.log(password);
console.log(passwordConfirm);

//ajout d'un event listener sur le formulaire
registrationForm.addEventListener("submit", function(event) {
    event.preventDefault();
    let isValid = true;

    //nom 
    if (!regexNom.test(nom.value.trim())) {
      nomError.textContent = 'le nom ne doit pas contenir de chiffre';  
      nom.classList.add("is-invalid");
      isValid = false;
    } else {
      nomError.textContent = '';  
      nom.classList.remove("is-invalid");
    }

    //prenom
    if (!regexPrenom.test(prenom.value.trim())) {
      prenomError.textContent = 'le prenom ne doit pas contenir de chiffre';
      prenom.classList.add("is-invalid");
      isValid = false;
    } else {
      prenomError.textContent = '';  
      prenom.classList.remove("is-invalid");
    }

    //email
    if (!regexEmail.test(email.value.trim())) {
      emailError.textContent = 'email invalide';
      email.classList.add("is-invalid");
      isValid = false;
    } else {
      emailError.textContent = '';  
      email.classList.remove("is-invalid");
    }

    //mot de passe
    if (!regexPassword.test(mot_de_passe.value.trim())) {
      mot_de_passeError.textContent = 'le mot de passe doit contenir au moins 8 caracteres';
      mot_de_passe.classList.add("is-invalid");
      isValid = false;
    } else {
      mot_de_passeError.textContent = '';  
      mot_de_passe.classList.remove("is-invalid");
    }

    //mot de passe confirm
    if (password !== passwordConfirm) {
      mot_de_passe_confirmError.textContent = "les mots de passe ne correspondent pas";
      mot_de_passe_confirm.classList.add("is-invalid");
      isValid = false;
    } else {
      mot_de_passe_confirmError.textContent = '';  
      mot_de_passe_confirm.classList.remove("is-invalid");
    }

    if (isValid) {
      this.submit();
    }
});