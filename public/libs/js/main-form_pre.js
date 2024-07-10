//* Validación de los input del form de prestamos
document.getElementById('enviarBtn').addEventListener('click', function (event) {
    var id_libro = document.getElementById('id_libro').value;
    var id_cliente = document.getElementById('id_cliente').value;

    var errorSpanIdLibro = document.getElementById('errorIdLibro');
    var errorSpanIdCliente = document.getElementById('errorIdCliente');

    if (id_libro.trim() === '0') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanIdLibro.textContent = 'Debe seleccionar un Libro';
        errorSpanIdLibro.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanIdLibro.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (id_cliente.trim() === '0') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanIdCliente.textContent = 'Debe seleccionar un Cliente';
        errorSpanIdCliente.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanIdCliente.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

});