var backdrop = document.querySelector('.backdrop');
var buttonLogIn = document.querySelector('.log-in');
var buttonSignIn = document.querySelector('.sign-in');
var modalSignIn = document.querySelector('.modal-connect');
var modalLogIn = document.querySelector('.modal-register');

buttonSignIn.addEventListener("click", function(){
	modalSignIn.style.display = "flex"; //none
	backdrop.style.display = "block";
})

buttonLogIn.addEventListener("click", function(){
	modalLogIn.style.display = "flex"; //none
	backdrop.style.display = "block";
})

backdrop.addEventListener("click", function(){
	backdrop.style.display= "none";
	modalSignIn.style.display = "none"; //none
	modalLogIn.style.display = "none"; //none
})
