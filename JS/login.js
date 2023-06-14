
function validarAcceso(){

	const correo = $('#email');

	//Validación correo
	const patronCorreo =  /^\w+([.-_+]?\w+)*@\w+([.-]?\w+)*(\.\w{2,10})+$/ ;

	if (patronCorreo.test(correo.value)) {
		$('#email').removeClass(' bg-danger-subtle');
	} else {
		$('#email').addClass(' bg-danger-subtle'); 
	}
		
}

