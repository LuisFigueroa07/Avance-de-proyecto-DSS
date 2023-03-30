function validaradmin() {
	
	var usuario, clave;
	usuario = document.getElementById("usuariolo").value;
	clave = document.getElementById("clavelo").value;

	expresion = /\w+@\w+\.+[a-z]/;
	
	if (usuario === "" || clave === "") {
		alert("Todos los campos son obligatorios");
		return false;
	}
	else if (usuario==="Admin" && clave==="1234") {
		alert("El nombre es muy largo");
        return false;
	}
	

}