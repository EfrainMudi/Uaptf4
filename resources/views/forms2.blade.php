<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Formulario de preguntas</title>
    <style>
      body {
        font-family: Arial, sans-serif;
        background-color: #60866d;
      }

      h1 {
        text-align: center;
        margin-top: 20px;
        color: #fff;
      }

      #formulario {
        width: 80%;
        max-width: 800px;
        margin: 0 auto;
        background-color: white;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
      }
      @keyframes slideIn {
        from {
          opacity: 0;
          transform: translateX(-100px);
        }
        to {
          opacity: 1;
          transform: translateX(0);
        }
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
      background-color: #f7f7f7;
    }

    input[type="hidden"] {
      display: none;
    }

    button[type="button"] {
        background-color: #1C3D14;
        color: #fff;
        border: none;
        border-radius: 20px;
        padding: 10px 20px;
        cursor: pointer;
        margin-top: 10px;
        margin-bottom: 20px;
      }

    button[type="button"]:hover {
      background-color: #13390d;
    }

    .pregunta {
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      padding: 20px;
      box-shadow: 0 0 5px rgba(0, 0, 0, 0.3);
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
  </style>
</head>
<body>
    <h1>Formulario de preguntas</h1>

    <div id="formulario">
    <form method= "POST" action="{{ route('guardaform') }}">
        @csrf
        <label for="titulo">Título del formulario:</label>
        <input type="text" id="titulo" name="titulo" required for="descripcion">Descripción del formulario:</label>
        <input type="text" id="descripcion" name="descripcion">

        <button type="button" id="agregarPregunta">Agregar pregunta</button>

        <div id="preguntas">

        </div>

      </select>
        <button type="submit">Enviar formulario</button>
    </form>
    </div>

    <script>

       function agregarPregunta() {

        var pregunta = document.createElement("div");
        pregunta.className = "pregunta";


        var textoPregunta = document.createElement("input");
        textoPregunta.type = "text";
        textoPregunta.name = "pregunta[]";
        textoPregunta.required = true;
        textoPregunta.placeholder = "Escribe aquí la pregunta";
        pregunta.appendChild(textoPregunta);


        var tipoPregunta = document.createElement("select");
        tipoPregunta.name = "tipo[]";
        tipoPregunta.required = true;


        var opcionCorta = document.createElement("option");
        opcionCorta.value = "corta";
        opcionCorta.innerHTML = "Respuesta corta";
        tipoPregunta.appendChild(opcionCorta);


        var opcionLarga = document.createElement("option");
        opcionLarga.value = "larga";
        opcionLarga.innerHTML = "Respuesta larga";
        tipoPregunta.appendChild(opcionLarga);


        pregunta.appendChild(tipoPregunta);


        var respuestas = document.createElement("div");
        pregunta.appendChild(respuestas);




        var eliminarPregunta = document.createElement("button");
        eliminarPregunta.type = "button";
        eliminarPregunta.innerHTML = "Eliminar pregunta";
        eliminarPregunta.addEventListener("click", function () {
          if (confirm("¿Estás seguro de que quieres eliminar esta pregunta?")) {
            pregunta.remove();
          }
        });
        pregunta.appendChild(eliminarPregunta);


        var preguntas = document.getElementById("preguntas");
        preguntas.insertBefore(pregunta, preguntas.firstChild);
      }





      document.getElementById("agregarPregunta").addEventListener("click", function () {
        agregarPregunta();
      });
    </script>

  </body>

  </html>
