$(document).ready(()=>{

	//on submit login 
	$('.loginSubmit').on('click',function(e){
		//disable reload
		e.preventDefault();

		//ajax
		$.ajax({
			url: 'actions/action.php',
			method: 'POST',
			data: {
				loginUsername: $('[name="loginUsername"]').val(),
				loginPassword: $('[name="loginPassword"]').val(),
				loginAction: $('[name="loginAction"]').val()
			},
			success: function(loginRespo){
				$('#loginError').html(loginRespo);
			}
		});

	});




//on submit register
$('.registerSubmit').on('click',function(e){
	//disable reload
	e.preventDefault();

	//ajax
	$.ajax({
		url: './actions/action.php',
		method: 'POST',
		data: {
			   registerProfileName: $('[name="registerProfileName"]').val(),
			   registerUsername: $('[name="registerUsername"]').val(),
			   registerPassword: $('[name="registerPassword"]').val(),
			   registerSecretKey: $('[name="registerSecretKey"]').val(),
			   registerAction: $('#registerAction').val()
			},
		success: function(registerRespo){
			if(registerRespo == "Successfully Register. Redirecting..."){
				$('.registerError').html(registerRespo);
				setTimeout(function(){
					location.reload();
				},2500)
			}else{
				$('.registerError').html(registerRespo);
			setTimeout(function(){
				$('.registerError').html('')
			},4000)
			}
			
		}
	})

})












//Custom JS
//registration js
let loginShow = document.querySelector('.loginShow'); /* login show form*/
let login = document.querySelector('.login'); /* login form*/
let register = document.querySelector('#register'); /* buttton to show register*/
let registerForm = document.querySelector('.register'); /* register form */
	register.addEventListener('click',()=>{
	/* hide login*/
		login.style.opacity="0";
		setTimeout(()=>{login.style.left="-200%"},1000);

	/* Show register */
		registerForm.style.left="50%";
		setTimeout(()=>{registerForm.style.opacity="1"},1000);
	});
	loginShow.addEventListener('click',()=>{
	/* hide register*/
		registerForm.style.opacity="0";
		setTimeout(()=>{registerForm.style.left="-200%"},1000);

	/* Show login */
		login.style.left="50%";
		setTimeout(()=>{login.style.opacity="1"},1000);
	});







	// Show & Hide Eye for password input
	let eye = document.querySelector('#eye');
	let loginPassword = document.querySelector('[name="loginPassword"]');
	eye.addEventListener('click',()=>{
		if(eye.classList.contains('fa-eye')){
		// remove fa-eye add slash and show password
			eye.classList.remove('fa-eye');
			eye.classList.add('fa-eye-slash');
			loginPassword.type="text";
		}else{
		// add fa-eye remove slash and hide password
			eye.classList.add('fa-eye');
			eye.classList.remove('fa-eye-slash');
			loginPassword.type="password";
		}
	});


})