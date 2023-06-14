
function validarRegistro(){
	const email = $('#email');
	const pass = document.getElementById("password");
	const confirmPassword = document.getElementById("confirm_password");

	//Validación correo
	const emailRegex =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/ ;

	if (emailRegex.test(email.value)) {
		$('#email').removeClass(' bg-danger-subtle');
	} else {
		$('#email').addClass(' bg-danger-subtle'); 
	}

	if (pass.value === confirmPassword.value) {
		$('#confirm_password').removeClass(' bg-danger-subtle');
	} else {
		$('#confirm_password').addClass(' bg-danger-subtle'); 
	}
}
