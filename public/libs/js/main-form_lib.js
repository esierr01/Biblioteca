//* Validación de los input del form de libros
document.getElementById('enviarBtn').addEventListener('click', function (event) {
    var titulo = document.getElementById('titulo').value;
    var autor = document.getElementById('autor').value;
    var ejemplares = document.getElementById('ejemplares').value;

    var errorSpanTitulo = document.getElementById('errorTitulo');
    var errorSpanAutor = document.getElementById('errorAutor');
    var errorSpanEjemplares = document.getElementById('errorEjemplares');

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

    if (ejemplares.trim() === '0') {
        event.preventDefault(); // Evita el envío del formulario
        errorSpanEjemplares.textContent = 'Se requiere que indique cantidad de ejemplares a cargar';
        errorSpanEjemplares.style.color = 'red'; // Opcional: Cambia el color del mensaje de error
    } else {
        errorSpanEjemplares.textContent = ''; // Limpia el mensaje de error si la validación es exitosa
    }
});

//* Funcion que al seleccionar un valor en select de ejemplares, carga el mismo valor en disponibles
document.getElementById('ejemplares').addEventListener('change', function() {
    var ejemplaresValue = this.value;
    var disponiblesSelect = document.getElementById('disponibles');

    // Clear the current options
    disponiblesSelect.innerHTML = '';

    // Add the selected value from the first select as an option
    var option = document.createElement('option');
    option.value = ejemplaresValue;
    option.text = ejemplaresValue;
    option.selected = true;
    disponiblesSelect.add(option);

    // Enable the second select
    disponiblesSelect.disabled = false;
});