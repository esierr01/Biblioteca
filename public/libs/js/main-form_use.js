//* Validación de los input del form de usuarios
document.getElementById('enviarBtn').addEventListener('click', function (event) {
    var name = document.getElementById('name').value;
    var email = document.getElementById('email').value;
    var password = document.getElementById('password').value;

    var errorSpanName = document.getElementById('errorName');
    var errorSpanEmail = document.getElementById('errorEmail');
    var errorSpanPassword = document.getElementById('errorPassword');

    if (name.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanName.textContent = 'El nombre del usuario (ADMIN) es requerido para cargarlo';
        errorSpanName.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanName.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (email.trim() === '') {
        event.preventDefault();
        errorSpanEmail.textContent = 'El correo del usuario (ADMIN) es requerido para cargarlo';
        errorSpanEmail.style.color = 'red';
    } else {
        var regex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if (!regex.test(email)) {
            event.preventDefault();
            errorSpanEmail.textContent = 'El correo electrónico debe tener un formato válido.';
            errorSpanEmail.style.color = 'red';
        } else {
            errorSpanEmail.textContent = '';
        }
    }

    if (password.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanPassword.textContent = 'La clave del usuario (ADMIN) es requerida para cargarlo';
        errorSpanPassword.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        if (password.trim().length < 8) {
            event.preventDefault(); // Evita el envío del formulario
            errorSpanPassword.textContent = 'La clave debe tener al menos 8 caracteres';
            errorSpanPassword.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
        } else {
            errorSpanPassword.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
        }
    }

});

//* Funcion para mostrar / ocultar caracteres del input password
$(document).ready(function() {
    $('#boton-ojo').click(function() {
        var inputType = $('#password').attr('type');
        
        if(inputType === 'password') {
            $('#password').attr('type', 'text');
            $(this).find('.fa-eye').removeClass('fa-eye').addClass('fa-eye-slash'); // Cambia el ícono al presionar
        } else {
            $('#password').attr('type', 'password');
            $(this).find('.fa-eye-slash').removeClass('fa-eye-slash').addClass('fa-eye'); // Cambia el ícono al presionar
        }
    });
});