function validar() {
    var nombre, apellido, contrasena, email, telefono, direccion, dui;

    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    contrasena = document.getElementById("contrasena").value;
    email = document.getElementById("email").value;
    telefono = document.getElementById("telefono").value;
    direccion = document.getElementById("direccion").value;
    dui = document.getElementById("dui").value;

    expresionTelefono = /^\d{4}-\d{4}$/;
    expresionDui = /^\d{8}-\d{1}$/;
    expresionEmail = /\S+@\S+\.\S+/;
    
    if (nombre === "" || apellido === "" || contrasena === "" || email === "" || telefono === "" || direccion === "" || dui === "") {
        alert("Todos los campos son obligatorios");
        return false;
    } else if (contrasena.length < 8 || !/[A-Z]/.test(contrasena)) {
        alert("La contraseña debe tener una longitud de al menos 8 caracteres y contener una mayúscula");
        return false;
    } else if (!expresionTelefono.test(telefono)) {
        alert("El formato de teléfono es incorrecto. Debe ser 1234-5678");
        return false;
    } else if (!expresionDui.test(dui)) {
        alert("El formato de DUI es incorrecto. Debe ser 12345678-9");
        return false;
    } else if (!expresionEmail.test(email)) {
        alert("El correo electrónico no es válido");
        return false;
    } else {
        // Validar si el correo electrónico ya está registrado en la base de datos
        $.ajax({
            url: "validar-email.php",
            type: "POST",
            data: {email: email},
            success: function(response) {
                if (response == "existe") {
                    alert("El correo electrónico ya está registrado en la base de datos");
                    return false;
                } else {
                    // Si el correo electrónico no está registrado, enviar el formulario
                    $("#formulario").submit();
                }
            }
        });
    }

    return false;
} 
// Agregar guión automáticamente al introducir el cuarto número de teléfono
var telefonoInput = document.getElementById("telefono");
telefonoInput.oninput = function() {
    var telefonoValue = telefonoInput.value.replace(/-/g, '');
    if (telefonoValue.length > 0) {
        telefonoValue = telefonoValue.match(new RegExp('.{1,4}', 'g')).join('-');
    }
    telefonoInput.value = telefonoValue;
};

// Agregar guión automáticamente al introducir el octavo número de DUI
var duiInput = document.getElementById("dui");
duiInput.oninput = function() {
    var duiValue = duiInput.value.replace(/-/g, '');
    if (duiValue.length > 0) {
        duiValue = duiValue.match(new RegExp('.{1,8}', 'g')).join('-');
    }
    duiInput.value = duiValue;
};