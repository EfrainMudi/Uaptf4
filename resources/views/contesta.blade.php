<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Formulario</h1>

<h2>{{ $formulario->nombref }}</h2>
<p>{{ $formulario->des }}</p>

<form action="{{ route('responder') }}" method="POST">
    @csrf
    <input type="hidden" name="formulario_id" value="{{ $formulario->id }}">

    @foreach ($formulario->preguntas as $pregunta)
        <h3>{{ $pregunta->pregunta }}</h3>

        @if ($pregunta->tipo === 'Texto')
            <input type="text" name="respuestas[{{ $pregunta->id }}]">
        @elseif ($pregunta->tipo === 'Opción')
            @foreach ($pregunta->respuestas as $respuesta)
                <label>
                    <input type="radio" name="respuestas[{{ $pregunta->id }}]" value="{{ $respuesta->id }}">
                    {{ $respuesta->respuesta }}
                </label>
            @endforeach
        @endif
    @endforeach

    <button type="submit">Enviar respuestas</button>
</form>
</body>
</html>
