//* Validación de los input de los form de libros, clientes
document.getElementById('enviarBtn').addEventListener('click', function (event) {
    var nombre = document.getElementById('nombre').value;
    var telefonos = document.getElementById('telefonos').value;
    var correo = document.getElementById('correo').value;

    var errorSpanNombre = document.getElementById('errorNombre');
    var errorSpanTelefonos = document.getElementById('errorTelefonos');
    var errorSpanCorreo = document.getElementById('errorCorreo');

    if (nombre.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanNombre.textContent = 'El nombre del cliente es requerido para cargarlo';
        errorSpanNombre.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanNombre.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (telefonos.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanTelefonos.textContent = 'El teléfono del cliente es requerido para cargarlo';
        errorSpanTelefonos.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanTelefonos.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    // if (correo.trim() === '') {
    //     event.preventDefault(); // Evita el envío del formulario
    //     errorSpanCorreo.textContent = 'El correo del cliente es requerido para cargarlo';
    //     errorSpanCorreo.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    // } else {
    //     errorSpanCorreo.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    // }

    if (correo.trim() === '') {
        event.preventDefault();
        errorSpanCorreo.textContent = 'El correo del cliente es requerido para cargarlo';
        errorSpanCorreo.style.color = 'red';
    } else {
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!regex.test(correo)) {
            event.preventDefault();
            errorSpanCorreo.textContent = 'El correo electrónico debe tener un formato válido.';
            errorSpanCorreo.style.color = 'red';
        } else {
            errorSpanCorreo.textContent = '';
        }
    }

});