//* Validación de los input de los form de libros
document.getElementById('enviarBtn').addEventListener('click', function (event) {
    var ejemplares = document.getElementById('ejemplares').value;
    var disponibles = document.getElementById('disponibles').value;
    var titulo = document.getElementById('titulo').value;
    var autor = document.getElementById('autor').value;

    var errorSpanDisponible = document.getElementById('errorDisponible');
    var errorSpanTitulo = document.getElementById('errorTitulo');
    var errorSpanAutor = document.getElementById('errorAutor');

    if (parseInt(disponibles) > parseInt(ejemplares)) {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanDisponible.textContent = 'Los ejemplares disponibles no pueden ser mayores que los existentes';
        errorSpanDisponible.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanDisponible.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (titulo.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanTitulo.textContent = 'El título es requerido para cargar un libro';
        errorSpanTitulo.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanTitulo.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }

    if (autor.trim() === '') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanAutor.textContent = 'El autor es requerido para cargar un libro';
        errorSpanAutor.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanAutor.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }
});