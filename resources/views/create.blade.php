<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Formulario de preguntas</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        #formulario {
            width: 80%;
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            border-radius: 5px;
            border: none;
            margin-bottom: 10px;
        }

        input[type="hidden"] {
            display: none;
        }

        button[type="button"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            margin-top: 10px;
        }

        button[type="button"]:hover {
            background-color: #0069d9;
        }

        .pregunta {
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
        }

        .pregunta h2 {
            font-size: 18px;
            margin-top: 0;
            margin-bottom: 10px;
        }

        .respuesta {
            margin-bottom: 10px;
        }

        .respuesta label {
            display: block;
            margin-bottom: 5px;
        }

        .respuesta input[type="text"] {
            display: inline-block;
            width: calc(100% - 100px);
            margin-right: 10px;
        }

        .respuesta input[type="text"][disabled] {
            background-color: #f7f7f7;
            color: #333;
            border-color: #ddd;
            cursor: not-allowed;
        }

        .respuesta button[type="button"] {
            background-color: #dc3545;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 5px 10px;
            cursor: pointer;
            margin-top: 5px;
        }

        .respuesta button[type="button"]:hover {
            background-color: #c82333;
        }

        .respuesta ul {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        .respuesta li {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }

        .respuesta li:last-child {
            margin-bottom: 0;
        }

        .respuesta li input[type="text"] {
            width: calc(100% - 100px);
            margin-right: 10px;
        }

        body {
            font-family: Arial, sans-serif;
        }

        #formulario {
            max-width: 800px;
            margin: 0 auto;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
        }

        input[type="text"],
        select {
            display: block;
            width: 100%;
            margin-bottom: 10px;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
        }

        button {
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
            margin-bottom: 10px;
        }

        button:hover {
            background-color: #3e8e41;
        }

        .pregunta {
            margin-bottom: 20px;
            padding: 10px;
            background-color: #f7f7f7;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .respuesta {
            margin-bottom: 10px;
        }

        .eliminarRespuesta {
            color: red;
            margin-left: 10px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <h1>Formulario de preguntas</h1>
    <div id="formulario">
        <form>
            <label for="titulo">Título del formulario:</label>
            <input type="text" id="titulo" name="titulo" required <label for="descripcion">Descripción del
            formulario:</label>
            <input type="text" id="descripcion" name="descripcion">

            <button type="button" id="agregarPregunta">Agregar pregunta</button>

            <div id="preguntas">
            </div>

            <button type="submit">Enviar formulario</button>
        </form>
    </div>

    <script>
        // Función para agregar una nueva pregunta al formulario
    function agregarPregunta() {
    // Creamos el elemento contenedor de la pregunta
    var pregunta = document.createElement("div");
    pregunta.className = "pregunta";

    // Creamos el campo de texto para la pregunta
    var textoPregunta = document.createElement("input");
    textoPregunta.type = "text";
    textoPregunta.name = "pregunta[]";
    textoPregunta.required = true;
    textoPregunta.placeholder = "Escribe aquí la pregunta";
    pregunta.appendChild(textoPregunta);

    // Creamos el campo de selección para el tipo de pregunta
    var tipoPregunta = document.createElement("select");
    tipoPregunta.name = "tipo[]";
    tipoPregunta.required = true;

    // Opción de pregunta de respuesta corta
    var opcionCorta = document.createElement("option");
    opcionCorta.value = "corta";
    opcionCorta.innerHTML = "Respuesta corta";
    tipoPregunta.appendChild(opcionCorta);

    // Opción de pregunta de respuesta larga
    var opcionLarga = document.createElement("option");
    opcionLarga.value = "larga";
    opcionLarga.innerHTML = "Respuesta larga";
    tipoPregunta.appendChild(opcionLarga);

    // Opción de pregunta de opción múltiple
    var opcionMultiple = document.createElement("option");
    opcionMultiple.value = "multiple";
    opcionMultiple.innerHTML = "Opción múltiple";
    tipoPregunta.appendChild(opcionMultiple);

    // Opción de pregunta de casillas de verificación
    var opcionCheckbox = document.createElement("option");
    opcionCheckbox.value = "checkbox";
    opcionCheckbox.innerHTML = "Casillas de verificación";
    tipoPregunta.appendChild(opcionCheckbox);

    // Opción de pregunta de botones de radio
    var opcionRadio = document.createElement("option");
    opcionRadio.value = "radio";
    opcionRadio.innerHTML = "Botones de radio";
    tipoPregunta.appendChild(opcionRadio);

    pregunta.appendChild(tipoPregunta);

    // Div para las respuestas
    var respuestas = document.createElement("div");
    pregunta.appendChild(respuestas);

    // Botón para agregar una nueva respuesta
    var agregarRespuesta = document.createElement("button");
    agregarRespuesta.type = "button";
    agregarRespuesta.innerHTML = "Agregar respuesta";
    agregarRespuesta.addEventListener("click", function () {
        agregarRespuestaMultiple(respuestas);
    });
    pregunta.appendChild(agregarRespuesta);

    // Botón para eliminar la pregunta
    var eliminarPregunta = document.createElement("button");
    eliminarPregunta.type = "button";
    eliminarPregunta.innerHTML = "Eliminar pregunta";
    eliminarPregunta.addEventListener("click", function () {
        if (confirm("¿Estás seguro de que quieres eliminar esta pregunta?")) {
            pregunta.remove();
        }
    });
    pregunta.appendChild(eliminarPregunta);

    // Añadimos la pregunta al contenedor de preguntas
    var preguntas = document.getElementById("preguntas");
    preguntas.insertBefore(pregunta, preguntas.firstChild);
}

// Función para agregar una nueva respuesta a una pregunta de opción múltiple
function agregarRespuesta(){

}
// Función para agregar una nueva respuesta a una pregunta de opción múltiple
function agregarRespuestaMultiple(respuestas) {
    // Creamos el elemento contenedor de la respuesta
    var respuesta = document.createElement("div");
    respuesta.className = "respuesta";

    // Creamos el campo de texto para la respuesta
    var textoRespuesta = document.createElement("input");
    textoRespuesta.type = "text";
    textoRespuesta.name = "respuesta[]";
    textoRespuesta.required = true;
    textoRespuesta.placeholder = "Escribe aquí la respuesta";
    respuesta.appendChild(textoRespuesta);

    // Creamos el botón para eliminar la respuesta
    var eliminarRespuesta = document.createElement("button");
    eliminarRespuesta.type = "button";
    eliminarRespuesta.innerHTML = "Eliminar respuesta";
    eliminarRespuesta.addEventListener("click", function () {
        if (confirm("¿Estás seguro de que quieres eliminar esta respuesta?")) {
            respuesta.remove();
        }
    });
    respuesta.appendChild(eliminarRespuesta);

    // Añadimos la respuesta al contenedor de respuestas
    respuestas.appendChild(respuesta);
}

// Evento para agregar una nueva pregunta al hacer clic en el botón correspondiente
document.getElementById("agregarPregunta").addEventListener("click", function () {
    agregarPregunta();
});
    </script>
</body>

</html>
